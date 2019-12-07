<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Patient extends Brightree
{
    use ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['patient'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['patient'],'location' => $this->info->config->service['patient'],'trace' => 1);
    }

    public function PatientCreate($query): object
    {
        return $this->apiCall('PatientCreate',$query);
    }

    public function PatientSearch($query): object
    {
        return $this->apiCall('PatientSearch',$query);
    }

    public function PatientUpdate($query): object
    {
        return $this->apiCall('PatientUpdate',$query);
    }

    public function PatientFetchByExternalID(int $id=null): object
    {
        return $this->apiCall('PatientFetchByExternalID',array('ExternalID' => $id));
    }

    public function PatientFetchByPatientID(int $id=null): object
    {
        return $this->apiCall('PatientFetchByPatientID',array('PatientID' => $id));
    }

    public function PatientNoteCreate($query): object
    {
        return $this->apiCall('PatientNoteCreate',$query);
    }

    public function PatientNoteFetchByKey(int $id=null): object
    {
        return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }

    public function PatientNoteFetchByPatient(int $id=null): object
    {
        return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }

    public function PatientNoteSearch($query): object
    {
        return $this->apiCall('PatientNoteSearch',$query);
    }

    public function PatientNoteUpdate($query): object
    {
        return $this->apiCall('PatientNoteUpdate',$query);
    }

    public function PatientPayorAdd($query): object
    {
        return $this->apiCall('PatientPayorAdd',$query);
    }

    public function PatientPayorFetch($query): object
    {
        return $this->apiCall('PatientPayorFetch',$query);
    }

    public function PatientPayorFetchAll(int $key =12345): object
    {
        return $this->apiCall('PatientPayorFetchAll',array("PatientKey" => $key));
    }

    public function PatientPayorRemove(int $id=null): object
    {
        return $this->apiCall('PatientPayorRemove',array('brightreeID' => $id));
    }

    public function PatientPayorUpdate($query): object
    {
        return $this->apiCall('PatientPayorUpdate',$query);
    }

    public function PatientPhoneNumberSearch($query): object
    {
        return $this->apiCall('PatientPhoneNumberSearch',$query);
    }

    public function PatientRemoveMarketingReferral(int $id=null): object
    {
        return $this->apiCall('PatientRemoveMarketingReferral',array('brightreeID' => $id));
    }

    public function FacilityMasterInfoFetchAll(): object
    {
        return $this->apiCall('FacilityMasterInfoFetchAll','');
    }

    public function FacilityResidentCreate($query): object
    {
        return $this->apiCall('FacilityResidentCreate',$query);
    }

    public function PatientAddMarketingReferral(int $btid=null, int $refid=null): object
    {
        return $this->apiCall('FacilityResidentCreate',array('BrightreeID'=>$btid,'BrightreeReferralID'=>$refid));
    }

    public function GetNoteByKey(int $id=141508): object
    {
        return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }

    public function GetNotesByPatient(int $id=12345): object
    {
        return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }

    public function PatientFetchByBrightreeID(int $id=12345): object
    {
        return $this->apiCall('PatientFetchByBrightreeID',array('brightreeID' => $id));
    }
}
