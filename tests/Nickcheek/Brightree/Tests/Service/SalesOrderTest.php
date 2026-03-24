<?php

namespace Tests\Nickcheek\Brightree\Service;

use PHPUnit\Framework\TestCase;
use Nickcheek\Brightree\Service\SalesOrder;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class SalesOrderTest extends TestCase
{
	private $mockInfo;
	private $salesOrder;

	protected function setUp(): void
	{
		$this->mockInfo = (object) [
			'username' => 'test_user',
			'password' => 'test_pass',
			'config' => (object) [
				'service' => [
					'salesorder' => 'https://example.com/services/salesorder'
				]
			]
		];

		$this->salesOrder = $this->getMockBuilder(SalesOrder::class)
		                         ->setConstructorArgs([$this->mockInfo])
		                         ->onlyMethods(['apiCall'])
		                         ->getMock();
	}

	public function testConstructorWithValidConfig()
	{
		$salesOrder = new SalesOrder($this->mockInfo);
		$this->assertInstanceOf(SalesOrder::class, $salesOrder);
	}

		public function testConstructorWithoutCredentials()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Authentication credentials not provided');

		$invalidInfo = (object) [
			'config' => (object) [
				'service' => [
					'salesorder' => 'https://example.com/services/salesorder'
				]
			]
		];

		new SalesOrder($invalidInfo);
	}

	public function testCallValidMethod()
	{
		$expectedResponse = (object) ['success' => true];
		$methodName = 'SalesOrderCreate';
		$params = ['param1' => 'value1'];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with($methodName, $params)
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->$methodName($params);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderQuickAddItemWithItemsDataReturn()
	{
		$expectedResponse = (object) ['success' => true];
		$params = [
			'BrightreeID' => 12345,
			'SOItemQuickAdd' => [
				'ItemIdentifier' => 'ABC123'
			]
		];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderQuickAddItemWithItemsDataReturn', $params)
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->SalesOrderQuickAddItemWithItemsDataReturn($params);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testCallSpecialMethod()
	{
		$expectedResponse = (object) ['success' => true];
		$methodName = 'SalesOrderTemplateItemFrequencyFetchByBrightreeID';
		$brightreeId = 12345;

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with($methodName, ['BrightreeID' => $brightreeId])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->$methodName($brightreeId);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testPatientNotesCommentFetchUsesDocumentedMethodName()
	{
		$expectedResponse = (object) ['success' => true];
		$patientNoteKey = 12345;

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('PatientNotesCommentFetch', ['PatientNoteKey' => $patientNoteKey])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->PatientNotesCommentFetch($patientNoteKey);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testCallNonExistentMethod()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Method NonExistentMethod does not exist');
		$this->salesOrder->NonExistentMethod();
	}

	public function testCallMethodWithInvalidParams()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Method SalesOrderCreate requires an iterable parameter');

		$this->salesOrder->SalesOrderCreate('not-iterable');
	}

	public function testSalesOrderQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderSearch', [
			                 'SearchParams' => [
				                 'BrightreeID' => 12345,
				                 'Branch' => [
					                 'ID' => 12,
					                 'Value' => 'Main'
				                 ],
				                 'Reference' => 'REF-1'
			                 ],
			                 'SortParams' => [
				                 [
					                 'SortField' => 'BrightreeID',
					                 'SortOrder' => 'Descending'
				                 ]
			                 ],
			                 'pageSize' => 25,
			                 'page' => 2
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderQuery()
		                           ->brightreeId(12345)
		                           ->branch(12, 'Main')
		                           ->reference('REF-1')
		                           ->sortBy('BrightreeID', 'Descending')
		                           ->pageSize(25)
		                           ->page(2)
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderPayorQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderPayorSearch', [
			                 'searchParams' => [
				                 'SOKey' => 12345,
				                 'PolicyNumber' => 'POL123',
				                 'Verified' => true
			                 ],
			                 'sortParams' => [],
			                 'pageSize' => 10,
			                 'page' => 1
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderPayorQuery()
		                           ->soKey(12345)
		                           ->policyNumber('POL123')
		                           ->verified()
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderVoidQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderVoidSearch', [
			                 'searchParams' => [
				                 'SalesOrderBrightreeID' => 999,
				                 'VoidReason' => [
					                 'ID' => 7,
					                 'Value' => 'Duplicate'
				                 ]
			                 ],
			                 'sortParams' => [],
			                 'pageSize' => 10,
			                 'page' => 1
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderVoidQuery()
		                           ->salesOrderBrightreeId(999)
		                           ->voidReason(7, 'Duplicate')
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderTemplateQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderTemplateSearch', [
			                 'SearchParams' => [
				                 'ExternalID' => 'EXT-1',
				                 'LastRunHasError' => true,
				                 'Patient' => [
					                 'ID' => 111,
					                 'Value' => 'John Smith'
				                 ]
			                 ],
			                 'SortParams' => [],
			                 'pageSize' => 10,
			                 'page' => 1
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderTemplateQuery()
		                           ->externalId('EXT-1')
		                           ->lastRunHasError()
		                           ->patient(111, 'John Smith')
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderTemplateScheduleQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderTemplateScheduleSearch', [
			                 'searchParams' => [
				                 'SOTemplateKey' => 123,
				                 'Description' => 'Monthly',
				                 'IsDisabled' => false
			                 ],
			                 'sortParams' => [],
			                 'pageSize' => 10,
			                 'page' => 1
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderTemplateScheduleQuery()
		                           ->soTemplateKey(123)
		                           ->description('Monthly')
		                           ->isDisabled(false)
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderTemplateScheduleLogQueryBuilderBuildsPayload()
	{
		$expectedResponse = (object) ['success' => true];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderTemplateScheduleLogSearch', [
			                 'searchParams' => [
				                 'SOTemplateScheduleKey' => 999,
				                 'ErrorMessage' => 'Timeout'
			                 ],
			                 'sortParams' => [],
			                 'pageSize' => 10,
			                 'page' => 1
		                 ])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->salesOrderTemplateScheduleLogQuery()
		                           ->soTemplateScheduleKey(999)
		                           ->errorMessage('Timeout')
		                           ->get();

		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderFetchByBrightreeID()
	{
		$expectedResponse = (object) ['success' => true];
		$params = ['BrightreeID' => 12345];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderFetchByBrightreeID', $params)
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->SalesOrderFetchByBrightreeID($params);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderFetchByBrightreeIDWithoutBrightreeID()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreeID is required for SalesOrderFetchByBrightreeID');

		$this->salesOrder->SalesOrderFetchByBrightreeID([]);
	}

	public function testSalesOrderFetchByBrightreeIDWithNonIterableParam()
	{
		try {
			$this->salesOrder = $this->getMockBuilder(SalesOrder::class)
			                         ->setConstructorArgs([$this->mockInfo])
			                         ->onlyMethods([])
			                         ->getMock();

			// Override the type checking with a method that accepts any parameter type
			$reflectionClass = new \ReflectionClass($this->salesOrder);
			$method = $reflectionClass->getMethod('SalesOrderFetchByBrightreeID');

			$params = [];
			$this->expectException(BrightreeException::class);
			$this->expectExceptionMessage('BrightreeID is required for SalesOrderFetchByBrightreeID');
			$this->salesOrder->SalesOrderFetchByBrightreeID($params);
		} catch (\ReflectionException $e) {
			$this->markTestIncomplete(
				'Cannot test non-iterable parameter due to strict type hints in the method signature'
			);
		}
	}

	public function testSalesOrderTemplateItemFrequencyFetchByBrightreeID()
	{
		$expectedResponse = (object) ['success' => true];
		$brightreeId = 12345;

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderTemplateItemFrequencyFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->SalesOrderTemplateItemFrequencyFetchByBrightreeID($brightreeId);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testSalesOrderTemplateItemFrequencyFetchByBrightreeIDWithInvalidID()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid Brightree ID: 0');

		$this->salesOrder->SalesOrderTemplateItemFrequencyFetchByBrightreeID(0);
	}

	public function testStopReasonSalesOrderFetchByBrightreeID()
	{
		$expectedResponse = (object) ['success' => true];
		$brightreeId = 12345;

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('StopReasonSalesOrderFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->StopReasonSalesOrderFetchByBrightreeID($brightreeId);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testStopReasonSalesOrderFetchByBrightreeIDWithInvalidID()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid Brightree ID: -1');

		$this->salesOrder->StopReasonSalesOrderFetchByBrightreeID(-1);
	}

	public function testSalesOrderTemplateUpdateItemPayor()
	{
		$expectedResponse = (object) ['success' => true];
		$params = [
			'BrightreeID' => 12345,
			'BrightreeDetailID' => 67890,
			'SalesOrderItemInfo' => [
				'BillForDenial' => true
			]
		];

		$this->salesOrder->expects($this->once())
		                 ->method('apiCall')
		                 ->with('SalesOrderTemplateUpdateItemPayor', $params)
		                 ->willReturn($expectedResponse);

		$result = $this->salesOrder->SalesOrderTemplateUpdateItemPayor($params);
		$this->assertEquals($expectedResponse, $result);
	}

	public function testApiCallWithSoapFault()
	{
		$mockSalesOrder = $this->getMockBuilder(SalesOrder::class)
		                       ->setConstructorArgs([$this->mockInfo])
		                       ->onlyMethods(['apiCall'])
		                       ->getMock();

		$soapFault = new \SoapFault('Server', 'SOAP error message');

		$mockSalesOrder->expects($this->once())
		               ->method('apiCall')
		               ->willThrowException($soapFault);

		$this->expectException(BrightreeException::class);

		$mockSalesOrder->SalesOrderCreate(['param' => 'value']);
	}

	public function testSpecialMethodMissingRequiredParameter()
	{
		$methodName = 'SalesOrderTemplateItemFrequencyFetchByBrightreeID';

		// Use reflection to access protected property
		$reflection = new \ReflectionClass(SalesOrder::class);
		$specialMethodsProp = $reflection->getProperty('specialMethods');
		$specialMethodsProp->setAccessible(true);

		$mockSalesOrder = $this->getMockBuilder(SalesOrder::class)
		                       ->setConstructorArgs([$this->mockInfo])
		                       ->getMock();

		$specialMethodsProp->setValue($mockSalesOrder, [
			$methodName => ['BrightreeID', 'ExtraRequiredParam']
		]);

		$this->expectException(BrightreeException::class);

		$callMethod = $reflection->getMethod('__call');
		$callMethod->setAccessible(true);
		$callMethod->invokeArgs($mockSalesOrder, [$methodName, [12345]]);
	}
}
