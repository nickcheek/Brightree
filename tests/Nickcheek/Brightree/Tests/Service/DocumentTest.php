<?php

namespace Nickcheek\Brightree\Tests\Service;

use Nickcheek\Brightree\Service\Document;
use PHPUnit\Framework\TestCase;
use stdClass;

class DocumentTest extends TestCase
{
	private object $info;
	private object $response;
	private Document $document;

	protected function setUp(): void
	{
		$this->info = (object) [
			'username' => 'test_user',
			'password' => 'test_pass',
			'config' => (object) [
				'service' => [
					'document' => 'https://example.com/document'
				]
			]
		];

		$this->response = new stdClass();
		$this->response->success = true;

		$this->document = $this->getMockBuilder(Document::class)
		                       ->setConstructorArgs([$this->info])
		                       ->onlyMethods(['apiCall'])
		                       ->getMock();
	}

	public function testDocumentQueryBuilderBuildsPayload()
	{
		$this->document->expects($this->once())
		               ->method('apiCall')
		               ->with('DocumentSearch', [
			               'searchRequest' => [
				               'PatientKey' => 12345,
				               'ExternalDocumentID' => 'DOC-1',
				               'ScannedDateFrom' => '2026-01-01T00:00:00',
				               'ScannedDateTo' => '2026-01-31T23:59:59'
			               ],
			               'sortRequest' => [],
			               'pageSize' => 10,
			               'page' => 1
		               ])
		               ->willReturn($this->response);

		$result = $this->document->documentQuery()
		                         ->patientKey(12345)
		                         ->externalDocumentId('DOC-1')
		                         ->scannedDateBetween('2026-01-01T00:00:00', '2026-01-31T23:59:59')
		                         ->get();

		$this->assertSame($this->response, $result);
	}

	public function testDocumentBatchQueryBuilderBuildsPayload()
	{
		$this->document->expects($this->once())
		               ->method('apiCall')
		               ->with('DocumentBatchSearch', [
			               'searchRequest' => [
				               'BatchName' => 'Import Batch',
				               'Closed' => true,
				               'BatchOwnerBrightreeID' => 555
			               ],
			               'sortRequest' => [],
			               'pageSize' => 10,
			               'page' => 1
		               ])
		               ->willReturn($this->response);

		$result = $this->document->documentBatchQuery()
		                         ->batchName('Import Batch')
		                         ->closed()
		                         ->batchOwnerBrightreeId(555)
		                         ->get();

		$this->assertSame($this->response, $result);
	}
}
