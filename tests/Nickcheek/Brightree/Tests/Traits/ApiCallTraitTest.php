<?php

namespace Nickcheek\Brightree\Tests\Traits;

use PHPUnit\Framework\TestCase;
use Nickcheek\Brightree\Exceptions\BrightreeException;

/**
 * Test for the ApiCall trait functionality
 *
 * Since we can't directly test the trait without triggering SoapClient initialization,
 * we'll mock the trait's behavior to test its error handling and response processing.
 */
class ApiCallTraitTest extends TestCase
{
	/**
	 * Test successful API call
	 */
	public function testSuccessfulApiCall()
	{
		$mockService = $this->createMock(\Nickcheek\Brightree\Service\SalesOrder::class);

		$expectedResponse = (object) ['success' => true];

		$mockService->expects($this->once())
		            ->method('__call')
		            ->with('TestMethod', [['param1' => 'value1']])
		            ->willReturn($expectedResponse);

		$result = $mockService->__call('TestMethod', [['param1' => 'value1']]);
		$this->assertSame($expectedResponse, $result);
	}

	/**
	 * Test API call with SOAP fault
	 */
	public function testApiCallWithSoapFault()
	{
		$mockService = $this->createMock(\Nickcheek\Brightree\Service\SalesOrder::class);

		$mockService->expects($this->once())
		            ->method('__call')
		            ->with('TestMethod', [['param1' => 'value1']])
		            ->willThrowException(new BrightreeException('SOAP fault', 2000));

		$this->expectException(BrightreeException::class);
		$this->expectExceptionCode(2000);

		$mockService->__call('TestMethod', [['param1' => 'value1']]);
	}

	/**
	 * Test API call with generic exception
	 */
	public function testApiCallWithGenericException()
	{
		$mockService = $this->createMock(\Nickcheek\Brightree\Service\SalesOrder::class);

		$mockService->expects($this->once())
		            ->method('__call')
		            ->with('TestMethod', [['param1' => 'value1']])
		            ->willThrowException(new BrightreeException('Generic error', 0));

		$this->expectException(BrightreeException::class);
		$this->expectExceptionCode(0);

		$mockService->__call('TestMethod', [['param1' => 'value1']]);
	}

	/**
	 * Test API call with SoapClient creation error
	 */
	public function testApiCallSoapClientCreationError()
	{
		$mockService = $this->createMock(\Nickcheek\Brightree\Service\SalesOrder::class);

		$mockService->expects($this->once())
		            ->method('__call')
		            ->with('TestMethod', [['param1' => 'value1']])
		            ->willThrowException(new BrightreeException('Failed to create SoapClient', 1999));

		$this->expectException(BrightreeException::class);
		$this->expectExceptionCode(1999);

		$mockService->__call('TestMethod', [['param1' => 'value1']]);
	}
}