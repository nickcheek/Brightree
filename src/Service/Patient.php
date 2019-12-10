<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Patient extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['patient'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['patient'],'location' => $this->info->config->service['patient'],'trace' => 1);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientCreate(array $query): object
    {
        return $this->apiCall('PatientCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientSearch(array $query): object
    {
        return $this->apiCall('PatientSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientUpdate(array $query): object
    {
        return $this->apiCall('PatientUpdate',$query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientFetchByExternalID(int $id=null): object
    {
        return $this->apiCall('PatientFetchByExternalID',array('ExternalID' => $id));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientFetchByPatientID(int $id=null): object
    {
        return $this->apiCall('PatientFetchByPatientID',array('PatientID' => $id));
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientNoteCreate(array $query): object
    {
        return $this->apiCall('PatientNoteCreate',$query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientNoteFetchByKey(int $id=null): object
    {
        return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientNoteFetchByPatient(int $id=null): object
    {
        return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientNoteSearch(array $query): object
    {
        return $this->apiCall('PatientNoteSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientNoteUpdate(array $query): object
    {
        return $this->apiCall('PatientNoteUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientPayorAdd(array $query): object
    {
        return $this->apiCall('PatientPayorAdd',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientPayorFetch(array $query): object
    {
        return $this->apiCall('PatientPayorFetch',$query);
    }

    /**
     * @param int $key
     * @return object
     */
    public function PatientPayorFetchAll(int $key =12345): object
    {
        return $this->apiCall('PatientPayorFetchAll',array("PatientKey" => $key));
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientPayorRemove(int $id=null): object
    {
        return $this->apiCall('PatientPayorRemove',array('brightreeID' => $id));
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientPayorUpdate(array $query): object
    {
        return $this->apiCall('PatientPayorUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PatientPhoneNumberSearch(array $query): object
    {
        return $this->apiCall('PatientPhoneNumberSearch',$query);
    }

    /**
     * @param int|null $id
     * @return object
     */
    public function PatientRemoveMarketingReferral(int $id=null): object
    {
        return $this->apiCall('PatientRemoveMarketingReferral',array('brightreeID' => $id));
    }

    /**
     * @return object
     */
    public function FacilityMasterInfoFetchAll(): object
    {
        return $this->apiCall('FacilityMasterInfoFetchAll','');
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityResidentCreate(array $query): object
    {
        return $this->apiCall('FacilityResidentCreate',$query);
    }

    /**
     * @param int|null $btid
     * @param int|null $refid
     * @return object
     */
    public function PatientAddMarketingReferral(?int $btid=null, ?int $refid=null): object
    {
        return $this->apiCall('FacilityResidentCreate',array('BrightreeID'=>$btid,'BrightreeReferralID'=>$refid));
    }

    /**
     * @param int $id
     * @return object
     */
    public function GetNoteByKey(int $id=141508): object
    {
        return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    public function GetNotesByPatient(int $id=12345): object
    {
        return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }

    /**
     * @param int $id
     * @return object
     */
    public function PatientFetchByBrightreeID(int $id=12345): object
    {
        return $this->apiCall('PatientFetchByBrightreeID',array('brightreeID' => $id));
    }
}
