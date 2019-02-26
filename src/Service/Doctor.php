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
		$this->doctor = $config->doctor;
		$this->doctor_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => $this->doctor,'location' => $this->doctor,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->doctor .'?singleWsdl', $this->doctor_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	public function AddDoctorReferralContact($query)
    {
    	return $this->apiCall('AddDoctorReferralContact',$query);
    }
    
    public function DoctorCreate($query)
    {
    	return $this->apiCall('DoctorCreate',$query);
    }
    
    public function DoctorFetchByBrightreeID($query)
    {
    	return $this->apiCall('DoctorFetchByBrightreeID',$query);
    }
    
    public function DoctorFetchByExternalID($query)
    {
    	return $this->apiCall('DoctorFetchByExternalID',$query);
    }
    
    public function DoctorGroupFetchAll($query)
    {
    	return $this->apiCall('DoctorGroupFetchAll',$query);
    }
    
    public function DoctorReferralContactsFetchByDoctorKey($query)
    {
    	return $this->apiCall('DoctorReferralContactsFetchByDoctorKey',$query);
    }
    
    public function DoctorSearch($query)
    {
    	return $this->apiCall('DoctorSearch',$query);
    }

    public function DoctorUpdate($query)
    {
    	return $this->apiCall('DoctorUpdate',$query);
    }

    public function FacilityFetchAll($query)
    {
    	return $this->apiCall('FacilityFetchAll',$query);
    }

    public function FacilityGroupFetchAll($query)
    {
    	return $this->apiCall('FacilityGroupFetchAll',$query);
    }

    public function MarketingRepFetchAll($query)
    {
    	return $this->apiCall('MarketingRepFetchAll',$query);
    }

    public function RemoveDoctorReferralContact($query)
    {
    	return $this->apiCall('RemoveDoctorReferralContact',$query);
    }
}