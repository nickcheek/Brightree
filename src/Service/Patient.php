<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Patient extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'FacilityMasterInfoFetchAll' => [],
		'FacilityResidentCreate' => true,
		'PatientCreate' => true,
		'PatientSearch' => true,
		'PatientUpdate' => true,
		'PatientNoteCreate' => true,
		'PatientNoteSearch' => true,
		'PatientNoteUpdate' => true,
		'PatientPayorAdd' => true,
		'PatientPayorFetch' => true,
		'PatientPayorUpdate' => true,
		'PatientPhoneNumberSearch' => true,
		'PatientUpdateSleepTherapyPatientID' => true,
		'PharmacyPatientClinicalInfoFetchByBrightreeID' => true,
		'FetchPatientOptInStatus' => true,
		'UpdatePatientOptInStatus' => true
	];

	protected array $specialMethods = [
		'PatientAddMarketingReferral' => ['BrightreeID', 'BrightreeReferralID'],
		'PatientFetchByExternalID' => ['ExternalID'],
		'PatientFetchByPatientID' => ['PatientID'],
		'PatientFetchByBrightreeID' => ['BrightreeID'],
		'PatientNoteFetchByKey' => ['brightreeID'],
		'PatientNoteFetchByPatient' => ['brightreeID'],
		'PatientPayorFetchAll' => ['PatientKey'],
		'PatientPayorRemove' => ['brightreeID'],
		'PatientRemoveMarketingReferral' => ['brightreeID'],
		'PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID' => ['BrightreeID', 'PatientBrightreeID'],
		'PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID' => ['BrightreeID', 'PatientBrightreeID'],
		'PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID' => ['brightreeID']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['patient'])) {
				throw BrightreeException::configError('Patient service URL not configured');
			}

			$this->wsdl = $this->info->config->service['patient'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['patient'],
				'location' => $this->info->config->service['patient'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Patient service: ' . $e->getMessage(), 0, $e);
		}
	}

	public function __call(string $name, array $arguments): object
	{
		try {
			if (isset($this->methods[$name])) {
				$params = $this->methods[$name] === true ? ($arguments[0] ?? []) : [];

				if ($this->methods[$name] === true && !is_iterable($params)) {
					throw new BrightreeException(sprintf("Method %s requires an iterable parameter", $name), 1002);
				}

				return $this->apiCall($name, $params);
			}

			if (isset($this->specialMethods[$name])) {
				$params = [];
				foreach ($this->specialMethods[$name] as $index => $paramName) {
					if (!isset($arguments[$index])) {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index];
				}
				return $this->apiCall($name, $params);
			}

			throw new \BadMethodCallException("Method $name does not exist");
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => $name, 'params' => $params ?? $arguments]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error calling $name: " . $e->getMessage(), 0, $e);
		}
	}

	public function PatientFetchByBrightreeID(int $id = 12345): object
	{
		try {
			if ($id <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $id", 1003);
			}
			return $this->apiCall('PatientFetchByBrightreeID', ['BrightreeID' => $id]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PatientFetchByBrightreeID', 'BrightreeID' => $id]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching patient by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function PatientAddMarketingReferral(?int $btid = null, ?int $refid = null): object
	{
		try {
			if ($btid === null) {
				throw new BrightreeException("BrightreeID is required for PatientAddMarketingReferral", 1003);
			}
			if ($refid === null) {
				throw new BrightreeException("BrightreeReferralID is required for PatientAddMarketingReferral", 1003);
			}
			return $this->apiCall('PatientAddMarketingReferral', [
				'BrightreeID' => $btid,
				'BrightreeReferralID' => $refid
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'PatientAddMarketingReferral',
				'BrightreeID' => $btid,
				'BrightreeReferralID' => $refid
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error adding marketing referral: " . $e->getMessage(), 0, $e);
		}
	}

	public function PatientPayorFetchAll(int $key = 000000): object
	{
		try {
			if ($key <= 0) {
				throw new BrightreeException("Invalid PatientKey: $key", 1003);
			}
			return $this->apiCall('PatientPayorFetchAll', ['PatientKey' => $key]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PatientPayorFetchAll', 'PatientKey' => $key]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching patient payors: " . $e->getMessage(), 0, $e);
		}
	}

	public function PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID(?int $patientid = null, ?int $brightreeid = null): object
	{
		try {
			if ($patientid === null) {
				throw new BrightreeException("PatientBrightreeID is required", 1003);
			}
			if ($brightreeid === null) {
				throw new BrightreeException("BrightreeID is required", 1003);
			}
			return $this->apiCall('PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID', [
				'BrightreeID' => $brightreeid,
				'PatientBrightreeID' => $patientid
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID',
				'BrightreeID' => $brightreeid,
				'PatientBrightreeID' => $patientid
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching pharmacy patient lab results: " . $e->getMessage(), 0, $e);
		}
	}
}