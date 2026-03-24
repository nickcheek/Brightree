<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Search\DocumentBatchSearchBuilder;
use Nickcheek\Brightree\Search\DocumentSearchBuilder;

class Document extends BaseService
{
	protected array $methods = [
		'DocumentTypesFetchAll' => [],
		'DocumentBatchCreate' => true,
		'DocumentBatchSearch' => true,
		'DocumentPropertyUpdate' => true,
		'DocumentReviewUpdate' => true,
		'DocumentSearch' => true,
		'GenerateDocumentID' => true,
		'StoreDocumentAndReturnInfo' => true,
		'StoreDocument' => true
	];

	protected array $specialMethods = [
		'FetchDocumentContent' => ['documentKey']
	];

	public function documentQuery(): DocumentSearchBuilder
	{
		return new DocumentSearchBuilder($this);
	}

	public function documentBatchQuery(): DocumentBatchSearchBuilder
	{
		return new DocumentBatchSearchBuilder($this);
	}

	public function FetchDocumentContent(int $key = 12345): object
	{
		try {
			if ($key <= 0) {
				throw new BrightreeException("Invalid document key: $key", 1003);
			}
			return $this->apiCall('FetchDocumentContent', ['documentKey' => $key]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'FetchDocumentContent', 'key' => $key]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching document content: " . $e->getMessage(), 0, $e);
		}
	}
}
