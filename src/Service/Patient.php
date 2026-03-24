<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Search\PatientNoteSearchBuilder;
use Nickcheek\Brightree\Search\PatientPhoneSearchBuilder;
use Nickcheek\Brightree\Search\PatientSearchBuilder;

class Patient extends BaseService
{
	protected array $methods = [
		'AdditionalPatientContactCreate' => true,
		'FinancialNoteCreate' => true,
		'FinancialNoteFetchByPatient' => true,
		'FinancialNoteSearch' => true,
		'FinancialNoteUpdate' => true,
		'FacilityMasterInfoFetchAll' => [],
		'JustificationNoteCreate' => true,
		'JustificationNoteFetchByPatient' => true,
		'JustificationNoteSearch' => true,
		'JustificationNoteUpdate' => true,
		'FacilityResidentCreate' => true,
		'PatientCreate' => true,
		'PatientSearch' => true,
		'PatientUpdate' => true,
		'PatientNoteCommentCreate' => true,
		'PatientNoteCommentsFetch' => true,
		'PatientNoteCommentUpdate' => true,
		'PatientNoteCreate' => true,
		'PatientNoteSearch' => true,
		'PatientNoteReasonTemplateFetch' => true,
		'PatientNoteUpdate' => true,
		'PatientPayorAdd' => true,
		'PatientPayorFetch' => true,
		'PatientPayorUpdate' => true,
		'PatientPhoneNumberSearch' => true,
		'PractitionerNoteCreate' => true,
		'PractitionerNoteFetchByPatient' => true,
		'PractitionerNoteSearch' => true,
		'PractitionerNoteUpdate' => true,
		'ProgressNoteCreate' => true,
		'ProgressNoteFetchByPatient' => true,
		'ProgressNoteSearch' => true,
		'ProgressNoteUpdate' => true,
		'PatientUpdateSleepTherapyPatientID' => true,
		'PharmacyPatientClinicalInfoFetchByBrightreeID' => true,
		'UpdatePatientOptInStatus' => true
	];

	protected array $specialMethods = [
		'AdditionalPatientContactFetchByBrightreeID' => ['PatientBrightreeID'],
		'AdditionalPatientContactFetchByPatientID' => ['PatientID'],
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

	public function patientQuery(): PatientSearchBuilder
	{
		return new PatientSearchBuilder($this);
	}

	public function patientPhoneQuery(): PatientPhoneSearchBuilder
	{
		return new PatientPhoneSearchBuilder($this);
	}

	public function patientNoteQuery(): PatientNoteSearchBuilder
	{
		return new PatientNoteSearchBuilder($this);
	}

	public function find($identifier): object
	{
		if (is_int($identifier) || ctype_digit((string) $identifier)) {
			return $this->PatientFetchByBrightreeID((int) $identifier);
		}

		$identifier = trim((string) $identifier);
		if ($identifier === '') {
			throw new BrightreeException('Patient identifier is required', 1003);
		}

		return $this->PatientFetchByPatientID($identifier);
	}

	public function findByExternalId(string $externalId): object
	{
		try {
			$externalId = trim($externalId);
			if ($externalId === '') {
				throw new BrightreeException('ExternalID is required', 1003);
			}

			return $this->PatientFetchByExternalID($externalId);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException("Error finding patient by external ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function findByName(string $lastName, ?string $firstName = null, int $pageSize = 10, int $page = 1): object
	{
		$builder = $this->patientQuery()
			->lastName($lastName)
			->pageSize($pageSize)
			->page($page);

		if ($firstName !== null && trim($firstName) !== '') {
			$builder->firstName($firstName);
		}

		return $builder->get();
	}

	public function findByPhone(string $phoneNumber, int $pageSize = 10, int $page = 1): object
	{
		return $this->patientPhoneQuery()
			->phoneNumber($phoneNumber)
			->pageSize($pageSize)
			->page($page)
			->get();
	}

	public function findAdditionalContacts($identifier): object
	{
		if (is_int($identifier) || ctype_digit((string) $identifier)) {
			return $this->AdditionalPatientContactFetchByBrightreeID((string) $identifier);
		}

		$identifier = trim((string) $identifier);
		if ($identifier === '') {
			throw new BrightreeException('Patient identifier is required', 1003);
		}

		return $this->AdditionalPatientContactFetchByPatientID($identifier);
	}

	public function PatientFetchByBrightreeID(int $id): object
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

	public function AdditionalPatientContactCreate($additionalPatientContact): object
	{
		try {
			if (!is_array($additionalPatientContact) && !is_object($additionalPatientContact)) {
				throw new BrightreeException('AdditionalPatientContact must be provided as an array or object', 1002);
			}

			return $this->apiCall('AdditionalPatientContactCreate', [
				'AdditionalPatientContact' => $additionalPatientContact
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'AdditionalPatientContactCreate',
				'AdditionalPatientContact' => $additionalPatientContact
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating additional patient contact: " . $e->getMessage(), 0, $e);
		}
	}

	public function AdditionalPatientContactFetchByBrightreeID($patientBrightreeID): object
	{
		try {
			if ($patientBrightreeID === null || trim((string) $patientBrightreeID) === '') {
				throw new BrightreeException('PatientBrightreeID is required for AdditionalPatientContactFetchByBrightreeID', 1003);
			}

			return $this->apiCall('AdditionalPatientContactFetchByBrightreeID', [
				'PatientBrightreeID' => (string) $patientBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'AdditionalPatientContactFetchByBrightreeID',
				'PatientBrightreeID' => $patientBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching additional patient contacts: " . $e->getMessage(), 0, $e);
		}
	}

	public function AdditionalPatientContactUpdate($brightreePatientContactKey, $additionalPatientContact): object
	{
		try {
			if ($brightreePatientContactKey === null || (int) $brightreePatientContactKey <= 0) {
				throw new BrightreeException('BrightreePatientContactKey is required for AdditionalPatientContactUpdate', 1003);
			}
			if (!is_array($additionalPatientContact) && !is_object($additionalPatientContact)) {
				throw new BrightreeException('AdditionalPatientContact must be provided as an array or object', 1002);
			}

			return $this->apiCall('AdditionalPatientContactUpdate', [
				'BrightreePatientContactKey' => (int) $brightreePatientContactKey,
				'AdditionalPatientContact' => $additionalPatientContact
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'AdditionalPatientContactUpdate',
				'BrightreePatientContactKey' => $brightreePatientContactKey,
				'AdditionalPatientContact' => $additionalPatientContact
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error updating additional patient contact: " . $e->getMessage(), 0, $e);
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

	public function PatientPayorFetchAll(int $key): object
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

	public function FetchPatientOptInStatus(?int $brightreeId = null, ?string $patientPhone = null): object
	{
		try {
			if ($brightreeId === null || $brightreeId <= 0) {
				throw new BrightreeException("BrightreeID is required for FetchPatientOptInStatus", 1003);
			}
			if ($patientPhone === null || trim($patientPhone) === '') {
				throw new BrightreeException("PatientPhone is required for FetchPatientOptInStatus", 1003);
			}

			return $this->apiCall('FetchPatientOptInStatus', [
				'brightreeId' => $brightreeId,
				'patientPhone' => $patientPhone
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'FetchPatientOptInStatus',
				'brightreeId' => $brightreeId,
				'patientPhone' => $patientPhone
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching patient opt-in status: " . $e->getMessage(), 0, $e);
		}
	}

	public function UpdatePatientOptInStatus($patientOptInStatus): object
	{
		try {
			if (!is_array($patientOptInStatus) && !is_object($patientOptInStatus)) {
				throw new BrightreeException('PatientOptInStatus must be provided as an array or object', 1002);
			}

			return $this->apiCall('UpdatePatientOptInStatus', [
				'patientOptInStatus' => $patientOptInStatus
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'UpdatePatientOptInStatus',
				'patientOptInStatus' => $patientOptInStatus
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error updating patient opt-in status: " . $e->getMessage(), 0, $e);
		}
	}
}
