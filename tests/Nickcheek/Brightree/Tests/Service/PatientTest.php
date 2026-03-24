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

	public function testFindUsesBrightreeIdForNumericIdentifier()
	{
		$brightreeId = 12345;

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->find($brightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindUsesPatientIdForStringIdentifier()
	{
		$patientId = 'PAT-12345';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientFetchByPatientID', ['PatientID' => $patientId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->find($patientId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindRejectsEmptyIdentifier()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Patient identifier is required');

		$this->patient->find('   ');
	}

	public function testFindByExternalIdUsesPatientFetchByExternalId()
	{
		$externalId = 'EXT-12345';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientFetchByExternalID', ['ExternalID' => $externalId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->findByExternalId($externalId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientSearchBuilderBuildsPayloadFromFluentMethods()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientSearch', [
			              'searchRequest' => [
				              'LastName' => 'Doe',
				              'FirstName' => 'Jane',
				              'Branch' => [
					              'ID' => 12,
					              'Value' => 'Main'
				              ]
			              ],
			              'sortRequest' => [
				              [
					              'SortField' => 'LastName',
					              'SortOrder' => 'Ascending'
				              ]
			              ],
			              'pageSize' => 25,
			              'page' => 2
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->patientQuery()
		                        ->lastName('Doe')
		                        ->firstName('Jane')
		                        ->branch(12, 'Main')
		                        ->sortBy('LastName')
		                        ->pageSize(25)
		                        ->page(2)
		                        ->get();

		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientSearchBuilderSupportsWhereManyAndInvoke()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientSearch', [
			              'searchRequest' => [
				              'FirstName' => 'John',
				              'LastName' => 'Smith'
			              ],
			              'sortRequest' => [],
			              'pageSize' => 10,
			              'page' => 1
		              ])
		              ->willReturn($this->mockApiResponse);

		$builder = $this->patient->patientQuery()->whereMany([
			'firstname' => 'John',
			'lastname' => 'Smith'
		]);

		$result = $builder();
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientSearchBuilderSupportsCustomField()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientSearch', [
			              'searchRequest' => [
				              'CustomFieldSearchParams' => [
					              [
						              'FieldStorageNumber' => 200,
						              'Value' => 'ABC123'
					              ]
				              ]
			              ],
			              'sortRequest' => [],
			              'pageSize' => 10,
			              'page' => 1
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->patientQuery()
		                        ->customField(200, 'ABC123')
		                        ->get();

		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientPhoneSearchBuilderBuildsPayload()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientPhoneNumberSearch', [
			              'searchRequest' => [
				              'FullName' => 'Jane Doe',
				              'PhoneNumber' => '5551234567'
			              ],
			              'sortRequest' => [
				              [
					              'SortField' => 'FullName',
					              'SortOrder' => 'Descending'
				              ]
			              ],
			              'pageSize' => 5,
			              'page' => 3
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->patientPhoneQuery()
		                        ->fullName('Jane Doe')
		                        ->phoneNumber('(555) 123-4567')
		                        ->sortBy('FullName', 'Descending')
		                        ->pageSize(5)
		                        ->page(3)
		                        ->get();

		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testPatientNoteSearchBuilderBuildsPayload()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientNoteSearch', [
			              'searchRequest' => [
				              'Patient' => 12345,
				              'Status' => 2,
				              'CreateDateTimeStart' => '2026-01-01T00:00:00',
				              'CreateDateTimeEnd' => '2026-01-31T23:59:59'
			              ],
			              'sortRequest' => [
				              [
					              'SortField' => 'CreateDate',
					              'SortOrder' => 'Descending'
				              ]
			              ],
			              'pageSize' => 10,
			              'page' => 1
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->patientNoteQuery()
		                        ->patient(12345)
		                        ->status(2)
		                        ->createdBetween('2026-01-01T00:00:00', '2026-01-31T23:59:59')
		                        ->sortBy('CreateDate', 'Descending')
		                        ->get();

		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindByNameBuildsSimpleSearchPayload()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientSearch', [
			              'searchRequest' => [
				              'LastName' => 'Doe',
				              'FirstName' => 'Jane'
			              ],
			              'sortRequest' => [],
			              'pageSize' => 25,
			              'page' => 2
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->findByName('Doe', 'Jane', 25, 2);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindByNameRejectsMissingLastName()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('LastName is required');

		$this->patient->findByName('   ');
	}

	public function testFindByPhoneBuildsSimpleSearchPayload()
	{
		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('PatientPhoneNumberSearch', [
			              'searchRequest' => [
				              'PhoneNumber' => '5551234567'
			              ],
			              'sortRequest' => [],
			              'pageSize' => 10,
			              'page' => 1
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->findByPhone('(555) 123-4567');
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindByPhoneRejectsMissingPhoneNumber()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PhoneNumber is required');

		$this->patient->findByPhone('---');
	}

	public function testPatientSearchBuilderRejectsInvalidPageSize()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PageSize must be greater than 0');

		$this->patient->patientQuery()->pageSize(0);
	}

	public function testFindAdditionalContactsUsesBrightreeIdForNumericIdentifier()
	{
		$brightreeId = '12345';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactFetchByBrightreeID', ['PatientBrightreeID' => $brightreeId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->findAdditionalContacts($brightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFindAdditionalContactsUsesPatientIdForStringIdentifier()
	{
		$patientId = 'PAT-12345';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactFetchByPatientID', ['PatientID' => $patientId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->findAdditionalContacts($patientId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactCreateWithArrayPayload()
	{
		$payload = [
			'FirstName' => 'John',
			'LastName' => 'Doe'
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactCreate', [
			              'AdditionalPatientContact' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->AdditionalPatientContactCreate($payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactCreateWithObjectPayload()
	{
		$payload = (object) [
			'FirstName' => 'John',
			'LastName' => 'Doe'
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactCreate', [
			              'AdditionalPatientContact' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->AdditionalPatientContactCreate($payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactCreateWithInvalidPayload()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('AdditionalPatientContact must be provided as an array or object');

		$this->patient->AdditionalPatientContactCreate('invalid');
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

	public function testAdditionalPatientContactFetchByBrightreeIDWithValidId()
	{
		$patientBrightreeId = '12345';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactFetchByBrightreeID', ['PatientBrightreeID' => $patientBrightreeId])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->AdditionalPatientContactFetchByBrightreeID($patientBrightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactFetchByBrightreeIDWithMissingId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PatientBrightreeID is required for AdditionalPatientContactFetchByBrightreeID');

		$this->patient->AdditionalPatientContactFetchByBrightreeID('');
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

	public function testAdditionalPatientContactUpdateWithArrayPayload()
	{
		$contactKey = 67890;
		$payload = [
			'FirstName' => 'John',
			'LastName' => 'Doe'
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactUpdate', [
			              'BrightreePatientContactKey' => $contactKey,
			              'AdditionalPatientContact' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->AdditionalPatientContactUpdate($contactKey, $payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactUpdateWithObjectPayload()
	{
		$contactKey = 67890;
		$payload = (object) [
			'FirstName' => 'John',
			'LastName' => 'Doe'
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('AdditionalPatientContactUpdate', [
			              'BrightreePatientContactKey' => $contactKey,
			              'AdditionalPatientContact' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->AdditionalPatientContactUpdate($contactKey, $payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testAdditionalPatientContactUpdateWithInvalidContactKey()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreePatientContactKey is required for AdditionalPatientContactUpdate');

		$this->patient->AdditionalPatientContactUpdate(0, []);
	}

	public function testAdditionalPatientContactUpdateWithInvalidPayload()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('AdditionalPatientContact must be provided as an array or object');

		$this->patient->AdditionalPatientContactUpdate(12345, 'invalid');
	}

	public function testFetchPatientOptInStatusWithValidParams()
	{
		$brightreeId = 12345;
		$patientPhone = '5551234567';

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('FetchPatientOptInStatus', [
			              'brightreeId' => $brightreeId,
			              'patientPhone' => $patientPhone
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->FetchPatientOptInStatus($brightreeId, $patientPhone);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testFetchPatientOptInStatusWithMissingBrightreeId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('BrightreeID is required for FetchPatientOptInStatus');

		$this->patient->FetchPatientOptInStatus(null, '5551234567');
	}

	public function testFetchPatientOptInStatusWithMissingPatientPhone()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PatientPhone is required for FetchPatientOptInStatus');

		$this->patient->FetchPatientOptInStatus(12345, '');
	}

	public function testUpdatePatientOptInStatusWithArrayPayload()
	{
		$payload = [
			'BrightreeID' => 12345,
			'PatientPhone' => '5551234567',
			'PatientOptInStatus' => [
				[
					'ProgramType' => 1,
					'OptStatus' => 2
				]
			]
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('UpdatePatientOptInStatus', [
			              'patientOptInStatus' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->UpdatePatientOptInStatus($payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUpdatePatientOptInStatusWithObjectPayload()
	{
		$payload = new stdClass();
		$payload->BrightreeID = 12345;
		$payload->PatientPhone = '5551234567';
		$payload->PatientOptInStatus = [
			(object) [
				'ProgramType' => 1,
				'OptStatus' => 2
			]
		];

		$this->patient->expects($this->once())
		              ->method('apiCall')
		              ->with('UpdatePatientOptInStatus', [
			              'patientOptInStatus' => $payload
		              ])
		              ->willReturn($this->mockApiResponse);

		$result = $this->patient->UpdatePatientOptInStatus($payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUpdatePatientOptInStatusWithInvalidPayload()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('PatientOptInStatus must be provided as an array or object');

		$this->patient->UpdatePatientOptInStatus('invalid');
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
