<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Patient extends BaseService
{
	protected array $methods = [
		'AdditionalPatientContactCreate' => true,
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
		'UpdatePatientOptInStatus' => true
	];

	protected array $specialMethods = [
		'AdditionalPatientContactFetchByBrightreeID' => ['PatientBrightreeID'],
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
