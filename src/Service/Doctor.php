<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Doctor extends BaseService
{
	protected array $methods = [
		'DoctorCreate' => true,
		'DoctorNoteCreate' => true,
		'DoctorNoteUpdate' => true,
		'DoctorSearch' => true,
		'DoctorUpdate' => true,
		'DoctorGroupFetchAll' => [],
		'FacilityFetchAll' => [],
		'FacilityGroupFetchAll' => [],
		'MarketingRepFetchAll' => []
	];

	protected array $specialMethods = [
		'AddDoctorReferralContact' => ['DoctorBrightreeID', 'ReferralContactBrightreeID'],
		'DoctorFetchByBrightreeID' => ['BrightreeID'],
		'DoctorFetchByExternalID' => ['ExternalID'],
		'DoctorNoteFetchByKey' => ['brightreeID'],
		'DoctorNoteFetchByDoctor' => ['brightreeID'],
		'DoctorReferralContactsFetchByDoctorKey' => ['DoctorBrightreeID'],
		'RemoveDoctorReferralContact' => ['DoctorBrightreeID', 'ReferralContactBrightreeID']
	];

	public function AddDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
	{
		try {
			return $this->apiCall('AddDoctorReferralContact', [
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'AddDoctorReferralContact',
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error adding doctor referral contact: " . $e->getMessage(), 0, $e);
		}
	}

	public function DoctorCreate(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("DoctorCreate requires an iterable parameter", 1002);
			}
			return $this->apiCall('DoctorCreate', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'DoctorCreate', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating doctor: " . $e->getMessage(), 0, $e);
		}
	}

	public function DoctorFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			return $this->apiCall('DoctorFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'DoctorFetchByBrightreeID', 'BrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching doctor by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function RemoveDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
	{
		try {
			return $this->apiCall('RemoveDoctorReferralContact', [
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'RemoveDoctorReferralContact',
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error removing doctor referral contact: " . $e->getMessage(), 0, $e);
		}
	}
}