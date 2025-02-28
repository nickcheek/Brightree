<?php

namespace Nickcheek\Brightree\Tests\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Patient;
use PHPUnit\Framework\TestCase;
use stdClass;

class PatientTest extends TestCase
{
	private $mockInfo;
	private $patient;
	private $mockApiResponse;

	protected function setUp(): void
	{
		$this->mockInfo = new stdClass();
		$this->mockInfo->username = 'test_username';
		$this->mockInfo->password = 'test_password';
		$this->mockInfo->config = new stdClass();
		$this->mockInfo->config->service = [
			'patient' => 'https://example.com/patient-api'
		];

		$this->mockApiResponse = $this->createMock(stdClass::class);

		$this->patient = $this->getMockBuilder(Patient::class)
		                      ->setConstructorArgs([$this->mockInfo])
		                      ->onlyMethods(['apiCall'])
		                      ->getMock();
	}

	public function testConstructorWithValidConfig()
	{
		$patient = new Patient($this->mockInfo);
		$this->assertInstanceOf(Patient::class, $patient);
	}

	public function testCallWithValidStandardMethod()
	{
		$searchParams = ['FirstName' => 'John', 'LastName' => 'Doe'];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientSearch', $searchParams)
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->PatientSearch($searchParams);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testCallWithInvalidStandardMethodParam()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Method PatientSearch requires an iterable parameter');

		$this->patient->PatientSearch('not_an_array');
	}

	public function testCallWithValidSpecialMethod()
	{
		$brightreeId = 12345;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->__call('PatientFetchByBrightreeID', [$brightreeId]);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testCallWithMissingSpecialMethodParam()
	{
		$this->expectException(BrightreeException::class);

		$this->patient->__call('PatientFetchByExternalID', []);
	}

	public function testCallWithNonExistentMethod()
	{
		try {
			$this->patient->NonExistentMethod();
			$this->fail('Expected exception was not thrown');
		} catch (BrightreeException $e) {
			$this->assertStringContainsString('Method NonExistentMethod does not exist', $e->getMessage());
		}
	}

	public function testPatientFetchByBrightreeIDWithValidId()
	{
		$brightreeId = 12345;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->PatientFetchByBrightreeID($brightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientFetchByBrightreeIDWithInvalidId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid Brightree ID: 0');

		$this->patient->PatientFetchByBrightreeID(0);
	}

	public function testPatientAddMarketingReferralWithValidParams()
	{
		$brightreeId = 12345;
		$referralId = 67890;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientAddMarketingReferral', [
			              'BrightreeID' => $brightreeId,
			              'BrightreeReferralID' => $referralId
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->PatientAddMarketingReferral($brightreeId, $referralId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientAddMarketingReferralWithMissingBrightreeId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreeID is required for PatientAddMarketingReferral');

		$this->patient->PatientAddMarketingReferral(null, 67890);
	}

	public function testPatientAddMarketingReferralWithMissingReferralId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreeReferralID is required for PatientAddMarketingReferral');

		$this->patient->PatientAddMarketingReferral(12345, null);
	}

	public function testPatientPayorFetchAllWithValidKey()
	{
		$patientKey = 12345;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientPayorFetchAll', ['PatientKey' => $patientKey])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->PatientPayorFetchAll($patientKey);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientPayorFetchAllWithInvalidKey()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid PatientKey: 0');

		$this->patient->PatientPayorFetchAll(0);
	}

	public function testPharmacyPatientLabResultsFetchWithValidParams()
	{
		$patientId = 12345;
		$brightreeId = 67890;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID', [
			              'BrightreeID' => $brightreeId,
			              'PatientBrightreeID' => $patientId
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID($patientId, $brightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPharmacyPatientLabResultsFetchWithMissingPatientId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PatientBrightreeID is required');

		$this->patient->PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID(null, 67890);
	}

	public function testPharmacyPatientLabResultsFetchWithMissingBrightreeId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreeID is required');

		$this->patient->PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID(12345, null);
	}

	public function testApiCallThrowsSoapFault()
	{
		$brightreeId = 12345;
		$soapFault = new \SoapFault('Server', 'SOAP Error');

		$patientMock = $this->getMockBuilder(Patient::class)
		                    ->setConstructorArgs([$this->mockInfo])
		                    ->onlyMethods(['apiCall'])
		                    ->getMock();

		$patientMock->expects($this->once())
		            ->method('apiCall')
		            ->with('PatientFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		            ->will($this->throwException($soapFault));

		$this->expectException(BrightreeException::class);
		$patientMock->PatientFetchByBrightreeID($brightreeId);
	}
}