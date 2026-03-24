<?php

namespace Nickcheek\Brightree\Tests\Service;

use Nickcheek\Brightree\Service\Insurance;
use PHPUnit\Framework\TestCase;
use stdClass;

class InsuranceTest extends TestCase
{
	private object $info;
	private object $response;
	private Insurance $insurance;

	protected function setUp(): void
	{
		$this->info = (object) [
			'username' => 'test_user',
			'password' => 'test_pass',
			'config' => (object) [
				'service' => [
					'insurance' => 'https://example.com/insurance'
				]
			]
		];

		$this->response = new stdClass();
		$this->response->success = true;

		$this->insurance = $this->getMockBuilder(Insurance::class)
		                         ->setConstructorArgs([$this->info])
		                         ->onlyMethods(['apiCall'])
		                         ->getMock();
	}

	public function testInsuranceQueryBuilderBuildsPayload()
	{
		$this->insurance->expects($this->once())
		                ->method('apiCall')
		                ->with('InsuranceSearch', [
			                'searchRequest' => [
				                'InsuranceName' => 'Acme Health',
				                'Company' => [
					                'ID' => 1,
					                'Value' => 'Acme'
				                ],
				                'Inactive' => false
			                ],
			                'sortRequest' => [],
			                'pageSize' => 10,
			                'page' => 1
		                ])
		                ->willReturn($this->response);

		$result = $this->insurance->insuranceQuery()
		                          ->insuranceName('Acme Health')
		                          ->company(1, 'Acme')
		                          ->inactive(false)
		                          ->get();

		$this->assertSame($this->response, $result);
	}

	public function testCommercialEligibilityPayerQueryBuilderBuildsPayload()
	{
		$this->insurance->expects($this->once())
		                ->method('apiCall')
		                ->with('CommercialEligibilityPayerSearch', [
			                'searchRequest' => [
				                'PayerMnemonic' => 'ABC',
				                'PayerName' => 'Acme Payer'
			                ],
			                'sortRequest' => [],
			                'pageSize' => 10,
			                'page' => 1
		                ])
		                ->willReturn($this->response);

		$result = $this->insurance->commercialEligibilityPayerQuery()
		                          ->payerMnemonic('ABC')
		                          ->payerName('Acme Payer')
		                          ->get();

		$this->assertSame($this->response, $result);
	}

	public function testCommercialPayerQueryBuilderBuildsPayload()
	{
		$this->insurance->expects($this->once())
		                ->method('apiCall')
		                ->with('CommercialPayerSearch', [
			                'searchRequest' => [
				                'PayerID' => '12345',
				                'PayerName' => 'Acme Commercial'
			                ],
			                'sortRequest' => [],
			                'pageSize' => 10,
			                'page' => 1
		                ])
		                ->willReturn($this->response);

		$result = $this->insurance->commercialPayerQuery()
		                          ->payerId('12345')
		                          ->payerName('Acme Commercial')
		                          ->get();

		$this->assertSame($this->response, $result);
	}

	public function testPriceTableQueryBuilderBuildsPayload()
	{
		$this->insurance->expects($this->once())
		                ->method('apiCall')
		                ->with('PriceTableSearch', [
			                'searchRequest' => [
				                'PriceTableType' => 'Retail',
				                'State' => 'GA'
			                ],
			                'sortRequest' => [],
			                'pageSize' => 10,
			                'page' => 1
		                ])
		                ->willReturn($this->response);

		$result = $this->insurance->priceTableQuery()
		                          ->priceTableType('Retail')
		                          ->state('GA')
		                          ->get();

		$this->assertSame($this->response, $result);
	}
}
