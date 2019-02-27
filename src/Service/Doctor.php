<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Doctor
{
	protected $doctor;
	protected $doctor_options;

	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->doctor = $config->service['doctor'];
		$this->doctor_options = array('login' => $config->user['name'],'password' => $config->user['pass'],'uri' => $this->doctor,'location' => $this->doctor,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->doctor .'?singleWsdl', $this->doctor_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	public function AddDoctorReferralContact($docid,$refid)
    {
    	return $this->apiCall('AddDoctorReferralContact',['DoctorBrightreeID'=>$docid,'ReferralContactBrightreeID'=>$refid]);
    }
    
    public function DoctorCreate($query)
    {
    	return $this->apiCall('DoctorCreate',$query);
    }
    
    public function DoctorFetchByBrightreeID($id)
    {
    	return $this->apiCall('DoctorFetchByBrightreeID',['BrightreeID'=>$id]);
    }
    
    public function DoctorFetchByExternalID($id)
    {
    	return $this->apiCall('DoctorFetchByExternalID',['ExternalID'=>$id]);
    }
    
    public function DoctorGroupFetchAll()
    {
    	return $this->apiCall('DoctorGroupFetchAll',[]);
    }
    
    public function DoctorReferralContactsFetchByDoctorKey($key)
    {
    	return $this->apiCall('DoctorReferralContactsFetchByDoctorKey',['DoctorBrightreeID'=>$key]);
    }
    
    public function DoctorSearch($query)
    {
    	return $this->apiCall('DoctorSearch',$query);
    }

    public function DoctorUpdate($query)
    {
    	return $this->apiCall('DoctorUpdate',$query);
    }

    public function FacilityFetchAll()
    {
    	return $this->apiCall('FacilityFetchAll',[]);
    }

    public function FacilityGroupFetchAll()
    {
    	return $this->apiCall('FacilityGroupFetchAll',[]);
    }

    public function MarketingRepFetchAll()
    {
    	return $this->apiCall('MarketingRepFetchAll',[]);
    }

    public function RemoveDoctorReferralContact($docid,$refid)
    {
    	return $this->apiCall('RemoveDoctorReferralContact',['DoctorBrightreeID'=>$docid,'ReferralContactBrightreeID'=>$refid]);
    }
}