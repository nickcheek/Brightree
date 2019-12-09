<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Doctor extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

	public function __construct($info)
	{
	    $this->info = $info;
		$this->wsdl = $this->info->config->service['doctor'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['doctor'],'location' => $this->info->config->service['doctor'],'trace' => 1);
	}
    
	public function AddDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
    {
    	return $this->apiCall('AddDoctorReferralContact',['DoctorBrightreeID'=>$DocBrightreeID,'ReferralContactBrightreeID'=>$ReferralBrightreeID]);
    }
    
    public function DoctorCreate(array $query): object
    {
    	return $this->apiCall('DoctorCreate',$query);
    }
    
    public function DoctorFetchByBrightreeID(int $BrightreeID): object
    {
    	return $this->apiCall('DoctorFetchByBrightreeID',['BrightreeID'=>$BrightreeID]);
    }
    
    public function DoctorFetchByExternalID(int $ExternalID): object
    {
    	return $this->apiCall('DoctorFetchByExternalID',['ExternalID'=>$ExternalID]);
    }
    
    public function DoctorGroupFetchAll(): object
    {
    	return $this->apiCall('DoctorGroupFetchAll',[]);
    }
    
    public function DoctorReferralContactsFetchByDoctorKey(int $DocBrightreeID): object
    {
    	return $this->apiCall('DoctorReferralContactsFetchByDoctorKey',['DoctorBrightreeID'=>$DocBrightreeID]);
    }
    
    public function DoctorSearch(array $query): object
    {
    	return $this->apiCall('DoctorSearch',$query);
    }

    public function DoctorUpdate(array $query): object
    {
    	return $this->apiCall('DoctorUpdate',$query);
    }

    public function FacilityFetchAll(): object
    {
    	return $this->apiCall('FacilityFetchAll',[]);
    }

    public function FacilityGroupFetchAll(): object
    {
    	return $this->apiCall('FacilityGroupFetchAll',[]);
    }

    public function MarketingRepFetchAll(): object
    {
    	return $this->apiCall('MarketingRepFetchAll',[]);
    }

    public function RemoveDoctorReferralContact(int $DocBrightreeID,int $ReferralBrightreeID): object
    {
    	return $this->apiCall('RemoveDoctorReferralContact',['DoctorBrightreeID'=>$DocBrightreeID,'ReferralContactBrightreeID'=>$ReferralBrightreeID]);
    }
}