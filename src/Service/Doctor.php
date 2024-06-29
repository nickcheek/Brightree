<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;

class Doctor extends Brightree
{
    use ApiCall;
    use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

    public function __construct($info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['doctor'] . '?singleWsdl';
        $this->options = array('login' => $this->info->username, 'password' => $this->info->password, 'uri' => $this->info->config->service['doctor'], 'location' => $this->info->config->service['doctor'], 'trace' => 1);
    }

    /**
     * Add referral contact for a doctor
     *
     * @param int $DocBrightreeID
     * @param int $ReferralBrightreeID
     * @return object
     */
    public function AddDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
    {
        return $this->apiCall('AddDoctorReferralContact', ['DoctorBrightreeID' => $DocBrightreeID, 'ReferralContactBrightreeID' => $ReferralBrightreeID]);
    }

    /**
     * Create a new Doctor
     *
     * @param iterable $query
     * @return object
     */
    public function DoctorCreate(iterable $query): object
    {
        return $this->apiCall('DoctorCreate', $query);
    }

    /**
     * Get Doctor by brightree ID
     *
     * @param int $BrightreeID
     * @return object
     */
    public function DoctorFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('DoctorFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
    }

    /**
     * Get doctor by external id
     *
     * @param int $ExternalID
     * @return object
     */
    public function DoctorFetchByExternalID(int $ExternalID): object
    {
        return $this->apiCall('DoctorFetchByExternalID', ['ExternalID' => $ExternalID]);
    }

    /**
     * Get all doctor groups
     *
     * @return object
     */
    public function DoctorGroupFetchAll(): object
    {
        return $this->apiCall('DoctorGroupFetchAll', []);
    }

    /**
     * Doctor note create
     *
     * @param iterable $query
     * @return object
     */
    public function DoctorNoteCreate(iterable $query): object
    {
        return $this->apiCall('DoctorNoteCreate', $query);
    }

    /**
     * Doctor note update
     *
     * @param iterable $query
     * @return object
     */
    public function DoctorNoteUpdate(iterable $query): object
    {
        return $this->apiCall('DoctorNoteUpdate', $query);
    }

    /**
     * Fetch doc note by doctor note key
     *
     * @param int $brightreeID
     * @return object
     */
    public function DoctorNoteFetchByKey(int $brightreeID): object
    {
        return $this->apiCall('DoctorNoteFetchByKey', ['brightreeID' => $brightreeID]);
    }

    /**
     * Fetch doc note by doctor
     *
     * @param int $brightreeID
     * @return object
     */
    public function DoctorNoteFetchByDoctor(int $brightreeID): object
    {
        return $this->apiCall('DoctorNoteFetchByDoctor', ['brightreeID' => $brightreeID]);
    }

    /**
     * Get referral contacts by doctor key
     *
     * @param int $DocBrightreeID
     * @return object
     */
    public function DoctorReferralContactsFetchByDoctorKey(int $DocBrightreeID): object
    {
        return $this->apiCall('DoctorReferralContactsFetchByDoctorKey', ['DoctorBrightreeID' => $DocBrightreeID]);
    }

    /**
     * Search for doctor
     *
     * @param iterable $query
     * @return object
     */
    public function DoctorSearch(iterable $query): object
    {
        return $this->apiCall('DoctorSearch', $query);
    }

    /**
     * Update doctor
     *
     * @param iterable $query
     * @return object
     */
    public function DoctorUpdate(iterable $query): object
    {
        return $this->apiCall('DoctorUpdate', $query);
    }

    /**
     * Fetch all facilities
     *
     * @return object
     */
    public function FacilityFetchAll(): object
    {
        return $this->apiCall('FacilityFetchAll', []);
    }

    /**
     * Fetch all facility groups
     *
     * @return object
     */
    public function FacilityGroupFetchAll(): object
    {
        return $this->apiCall('FacilityGroupFetchAll', []);
    }

    /**
     * Get all market reps
     *
     * @return object
     */
    public function MarketingRepFetchAll(): object
    {
        return $this->apiCall('MarketingRepFetchAll', []);
    }


    /**
     * Remove a referral from a doctor
     *
     * @param int $DocBrightreeID
     * @param int $ReferralBrightreeID
     * @return object
     */
    public function RemoveDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
    {
        return $this->apiCall('RemoveDoctorReferralContact', ['DoctorBrightreeID' => $DocBrightreeID, 'ReferralContactBrightreeID' => $ReferralBrightreeID]);
    }
}
