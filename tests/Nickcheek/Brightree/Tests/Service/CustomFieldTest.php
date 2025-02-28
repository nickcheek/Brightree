<?php

namespace Nickcheek\Brightree\Tests\Service;

use PHPUnit\Framework\TestCase;
use Nickcheek\Brightree\Service\CustomField;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class CustomFieldTest extends TestCase
{
	private object $config;
	private object $info;
	private CustomField $customField;

	protected function setUp(): void
	{
		$this->config = (object) [
			'service' => [
				'custom' => 'https://example.com/api/customfield'
			]
		];

		$this->info = (object) [
			'username' => 'testuser',
			'password' => 'testpass',
			'config' => $this->config
		];

		$this->customField = $this->getMockBuilder(CustomField::class)
		                          ->setConstructorArgs([$this->info])
		                          ->onlyMethods(['apiCall'])
		                          ->getMock();
	}

	public function testConstructorThrowsExceptionWhenCredentialsMissing()
	{
		$info = (object) [
			'config' => (object) ['service' => ['custom' => 'https://example.com/api/customfield']]
		];

		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Authentication credentials not provided');

		new CustomField($info);
	}

	public function testCustomFieldFetchAllByCategory()
	{
		$expectedResult = (object) ['status' => 'success'];
		$category = 'Patient';
		$includeInactive = 1;

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with(
			                  'CustomFieldFetchAllByCategory',
			                  [
				                  'category' => $category,
				                  'includeInactive' => $includeInactive
			                  ]
		                  )
		                  ->willReturn($expectedResult);

		$result = $this->customField->CustomFieldFetchAllByCategory($category, $includeInactive);
		$this->assertSame($expectedResult, $result);
	}

	public function testCustomFieldFetchAllByCategoryDefaultInactiveValue()
	{
		$expectedResult = (object) ['status' => 'success'];
		$category = 'Patient';

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with(
			                  'CustomFieldFetchAllByCategory',
			                  [
				                  'category' => $category,
				                  'includeInactive' => 0
			                  ]
		                  )
		                  ->willReturn($expectedResult);

		$result = $this->customField->CustomFieldFetchAllByCategory($category);
		$this->assertSame($expectedResult, $result);
	}

	public function testCustomFieldValueFetchAllByBrightreeID()
	{
		$expectedResult = (object) ['status' => 'success'];
		$id = 12345;
		$category = 'Patient';

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with(
			                  'CustomFieldValueFetchAllByBrightreeID',
			                  [
				                  'brightreeID' => $id,
				                  'category' => $category
			                  ]
		                  )
		                  ->willReturn($expectedResult);

		$result = $this->customField->CustomFieldValueFetchAllByBrightreeID($id, $category);
		$this->assertSame($expectedResult, $result);
	}

	public function testCustomFieldValueSaveMultiple()
	{
		$expectedResult = (object) ['status' => 'success'];
		$query = [
			'BrightreeID' => 12345,
			'Category' => 'Patient',
			'CustomFields' => [
				[
					'CustomFieldID' => 5,
					'Value' => 'Test Value'
				]
			]
		];

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with('CustomFieldValueSaveMultiple', $query)
		                  ->willReturn($expectedResult);

		$result = $this->customField->CustomFieldValueSaveMultiple($query);
		$this->assertSame($expectedResult, $result);
	}

	public function testCustomFieldValueSaveMultipleThrowsExceptionWithNonIterableParam()
	{
		$this->expectException(\TypeError::class);
		$this->expectExceptionMessage('must be of type Traversable|array');

		$nonIterable = 'string';
		$this->customField->CustomFieldValueSaveMultiple($nonIterable);
	}

	public function testMagicCallMethodWithValidMethodFromMethodsArray()
	{
		$expectedResult = (object) ['status' => 'success'];
		$query = [
			'BrightreeID' => 12345,
			'Category' => 'Patient',
			'CustomFields' => [
				[
					'CustomFieldID' => 5,
					'Value' => 'Test Value'
				]
			]
		];

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with('CustomFieldValueSaveMultiple', $query)
		                  ->willReturn($expectedResult);

		$result = $this->customField->__call('CustomFieldValueSaveMultiple', [$query]);
		$this->assertSame($expectedResult, $result);
	}

	public function testMagicCallMethodWithValidMethodFromSpecialMethodsArray()
	{
		$expectedResult = (object) ['status' => 'success'];
		$category = 'Patient';
		$includeInactive = 0;

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->with(
			                  'CustomFieldFetchAllByCategory',
			                  [
				                  'category' => $category,
				                  'includeInactive' => $includeInactive
			                  ]
		                  )
		                  ->willReturn($expectedResult);

		$result = $this->customField->__call('CustomFieldFetchAllByCategory', [$category, $includeInactive]);
		$this->assertSame($expectedResult, $result);
	}

	public function testMagicCallMethodWithInvalidMethod()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Error calling NonExistentMethod: Method NonExistentMethod does not exist');

		$this->customField->__call('NonExistentMethod', []);
	}

	public function testMagicCallMethodWithMissingParameterForSpecialMethod()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage("Parameter Error: Required parameter 'category' missing for method 'CustomFieldFetchAllByCategory'");

		$this->customField->__call('CustomFieldFetchAllByCategory', []);
	}

	public function testMagicCallMethodWithSoapFaultException()
	{
		$soapFault = new \SoapFault('Server', 'SOAP error');

		$this->customField = $this->getMockBuilder(CustomField::class)
		                          ->setConstructorArgs([$this->info])
		                          ->onlyMethods(['apiCall'])
		                          ->getMock();

		$this->customField->expects($this->once())
		                  ->method('apiCall')
		                  ->willThrowException($soapFault);

		$this->expectException(BrightreeException::class);

		$this->customField->CustomFieldFetchAllByCategory('Patient');
	}
}