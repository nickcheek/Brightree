<?php

namespace Tests\Unit\Service;

use Nickcheek\Brightree\Service\Doctor;
use Nickcheek\Brightree\Exceptions\BrightreeException;
use PHPUnit\Framework\TestCase;
use stdClass;

class DoctorTest extends TestCase
{
	private $mockInfo;
	private $mockConfig;
	private $mockResponse;

	protected function setUp(): void
	{
		$this->mockConfig = new stdClass();
		$this->mockConfig->service = [
			'doctor' => 'https://example.com/doctor'
		];

		$this->mockInfo = new stdClass();
		$this->mockInfo->username = 'testuser';
		$this->mockInfo->password = 'testpass';
		$this->mockInfo->config = $this->mockConfig;

		$this->mockResponse = new stdClass();
		$this->mockResponse->status = 'success';
	}

	public function testConstructorWithValidConfig()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$this->assertInstanceOf(Doctor::class, $doctor);
	}

    public function testConstructorWithMissingCredentials()
	{
		$this->mockInfo->username = '';
		$this->mockInfo->password = '';

		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Authentication credentials not provided');

		new Doctor($this->mockInfo);
	}

	public function testDoctorCreate()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$query = ['name' => 'Dr. Smith', 'specialty' => 'Cardiology'];

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('DoctorCreate', $query)
		       ->willReturn($this->mockResponse);

		$result = $doctor->DoctorCreate($query);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testDoctorCreateWithNonIterableParameter()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		try {
			$doctor->DoctorCreate('not-iterable');
			$this->fail('Expected exception not thrown');
		} catch (\TypeError $e) {
			$this->assertStringContainsString('must be of type Traversable|array', $e->getMessage());
		}
	}

	public function testDoctorFetchByBrightreeID()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$brightreeId = 12345;

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('DoctorFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		       ->willReturn($this->mockResponse);

		$result = $doctor->DoctorFetchByBrightreeID($brightreeId);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testAddDoctorReferralContact()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$docId = 12345;
		$refId = 67890;

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('AddDoctorReferralContact', [
			       'DoctorBrightreeID' => $docId,
			       'ReferralContactBrightreeID' => $refId
		       ])
		       ->willReturn($this->mockResponse);

		$result = $doctor->AddDoctorReferralContact($docId, $refId);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testRemoveDoctorReferralContact()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$docId = 12345;
		$refId = 67890;

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('RemoveDoctorReferralContact', [
			       'DoctorBrightreeID' => $docId,
			       'ReferralContactBrightreeID' => $refId
		       ])
		       ->willReturn($this->mockResponse);

		$result = $doctor->RemoveDoctorReferralContact($docId, $refId);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testDoctorSearch()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$query = ['lastName' => 'Smith'];

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('DoctorSearch', $query)
		       ->willReturn($this->mockResponse);

		$result = $doctor->DoctorSearch($query);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testDoctorSearchWithNonIterableParameter()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Method DoctorSearch requires an iterable parameter');

		$doctor->DoctorSearch('not-iterable');
	}

	public function testMagicCallWithSpecialMethod()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$brightreeId = 12345;

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('DoctorFetchByExternalID', ['ExternalID' => $brightreeId])
		       ->willReturn($this->mockResponse);

		$result = $doctor->DoctorFetchByExternalID($brightreeId);
		$this->assertSame($this->mockResponse, $result);
	}

	public function testMagicCallWithSpecialMethodMissingParameter()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$this->expectException(BrightreeException::class);

		$doctor->DoctorFetchByExternalID();
	}

	public function testMagicCallWithNonExistentMethod()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		try {
			$doctor->NonExistentMethod();
			$this->fail('Expected exception not thrown');
		} catch (BrightreeException $e) {
			$this->assertStringContainsString('Method NonExistentMethod does not exist', $e->getMessage());
		}
	}

	public function testMagicCallWithEmptyListMethod()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->with('FacilityFetchAll', [])
		       ->willReturn($this->mockResponse);

		$result = $doctor->FacilityFetchAll();
		$this->assertSame($this->mockResponse, $result);
	}

	public function testApiCallWithSoapFault()
	{
		$doctor = $this->getMockBuilder(Doctor::class)
		               ->setConstructorArgs([$this->mockInfo])
		               ->onlyMethods(['apiCall'])
		               ->getMock();

		$doctor->expects($this->once())
		       ->method('apiCall')
		       ->willThrowException(new \SoapFault('Server', 'SOAP Error'));

		$this->expectException(BrightreeException::class);

		$doctor->DoctorSearch(['lastName' => 'Smith']);
	}
}