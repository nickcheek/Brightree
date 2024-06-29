<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;

class Patient extends Brightree
{
    use ApiCall;
    use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

    public function __construct(object $info)
    {
		$this->info = $info;
		$this->wsdl = $this->info->config->service['patient'] . '?singleWsdl';
		$this->options = array('login' => $this->info->username, 'password' => $this->info->password, 'uri' => $this->info->config->service['patient'], 'location' => $this->info->config->service['patient'], 'trace' => 1);
    }

    /**
     * @return object
     */
    public function FacilityMasterInfoFetchAll(): object
    {
        return $this->apiCall('FacilityMasterInfoFetchAll', '');
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FacilityResidentCreate(iterable $query): object
    {
        return $this->apiCall('FacilityResidentCreate', $query);
    }

    /**
     * @param int|null $btid
     * @param int|null $refid
     * @return object
     */
    public function PatientAddMarketingReferral(?int $btid = null, ?int $refid = null): object
    {
        return $this->apiCall('FacilityResidentCreate', array('BrightreeID' => $btid, 'BrightreeReferralID' => $refid));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientCreate(iterable $query): object
    {
        return $this->apiCall('PatientCreate', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientSearch(iterable $query): object
    {
        return $this->apiCall('PatientSearch', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientUpdate(iterable $query): object
    {
        return $this->apiCall('PatientUpdate', $query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientFetchByExternalID(?int $id = null): object
    {
        return $this->apiCall('PatientFetchByExternalID', array('ExternalID' => $id));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientFetchByPatientID(?int $id = null): object
    {
        return $this->apiCall('PatientFetchByPatientID', array('PatientID' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    public function PatientFetchByBrightreeID(int $id = 12345): object
    {
        return $this->apiCall('PatientFetchByBrightreeID', array('BrightreeID' => $id));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientNoteCreate(iterable $query): object
    {
        return $this->apiCall('PatientNoteCreate', $query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientNoteFetchByKey(?int $id = null): object
    {
        return $this->apiCall('PatientNoteFetchByKey', array('brightreeID' => $id));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientNoteFetchByPatient(?int $id = null): object
    {
        return $this->apiCall('PatientNoteFetchByPatient', array('brightreeID' => $id));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientNoteSearch(iterable $query): object
    {
        return $this->apiCall('PatientNoteSearch', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientNoteUpdate(iterable $query): object
    {
        return $this->apiCall('PatientNoteUpdate', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientPayorAdd(iterable $query): object
    {
        return $this->apiCall('PatientPayorAdd', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientPayorFetch(iterable $query): object
    {
        return $this->apiCall('PatientPayorFetch', $query);
    }

    /**
     * @param int $key
     * @return object
     */
    public function PatientPayorFetchAll(int $key = 000000): object
    {
        return $this->apiCall('PatientPayorFetchAll', array("PatientKey" => $key));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientPayorRemove(?int $id = null): object
    {
        return $this->apiCall('PatientPayorRemove', array('brightreeID' => $id));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientPayorUpdate(iterable $query): object
    {
        return $this->apiCall('PatientPayorUpdate', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientPhoneNumberSearch(iterable $query): object
    {
        return $this->apiCall('PatientPhoneNumberSearch', $query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientRemoveMarketingReferral(?int $id = null): object
    {
        return $this->apiCall('PatientRemoveMarketingReferral', array('brightreeID' => $id));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PatientUpdateSleepTherapyPatientID(iterable $query): object
    {
        return $this->apiCall('PatientUpdateSleepTherapyPatientID', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PharmacyPatientClinicalInfoFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('PharmacyPatientClinicalInfoFetchByBrightreeID', $query);
    }

    /**
     * @param  int|null  $patientid  , int|null $brightreeid
     * @param  int|null  $brightreeid
     * @return object
     */
    public function PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID(?int $patientid = null, ?int $brightreeid = null): object
    {
        return $this->apiCall('PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID', array('BrightreeID' => $brightreeid, 'PatientBrightreeID' => $patientid));
    }

    /**
     * @param  int|null  $patientid  , int|null $brightreeid
     * @param  int|null  $brightreeid
     * @return object
     */
    public function PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID(?int $patientid = null, ?int $brightreeid = null): object
    {
        return $this->apiCall('PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID', array('BrightreeID' => $brightreeid, 'PatientBrightreeID' => $patientid));
    }

    /**
     * @param int|null $patientid
     * @return object
     */
    public function PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID(?int $patientid = null): object
    {
        return $this->apiCall('PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID', array('brightreeID' => $patientid));
    }
}
