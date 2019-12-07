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
    
	public function AddDoctorReferralContact($docid,$refid): object
    {
    	return $this->apiCall('AddDoctorReferralContact',['DoctorBrightreeID'=>$docid,'ReferralContactBrightreeID'=>$refid]);
    }
    
    public function DoctorCreate($query): object
    {
    	return $this->apiCall('DoctorCreate',$query);
    }
    
    public function DoctorFetchByBrightreeID($id): object
    {
    	return $this->apiCall('DoctorFetchByBrightreeID',['BrightreeID'=>$id]);
    }
    
    public function DoctorFetchByExternalID($id): object
    {
    	return $this->apiCall('DoctorFetchByExternalID',['ExternalID'=>$id]);
    }
    
    public function DoctorGroupFetchAll(): object
    {
    	return $this->apiCall('DoctorGroupFetchAll',[]);
    }
    
    public function DoctorReferralContactsFetchByDoctorKey($key): object
    {
    	return $this->apiCall('DoctorReferralContactsFetchByDoctorKey',['DoctorBrightreeID'=>$key]);
    }
    
    public function DoctorSearch($query): object
    {
    	return $this->apiCall('DoctorSearch',$query);
    }

    public function DoctorUpdate($query): object
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

    public function RemoveDoctorReferralContact($docid,$refid): object
    {
    	return $this->apiCall('RemoveDoctorReferralContact',['DoctorBrightreeID'=>$docid,'ReferralContactBrightreeID'=>$refid]);
    }
}