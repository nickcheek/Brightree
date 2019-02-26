<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Patient
{
	protected $patient;
	protected $patient_options;

	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->patient = $config->patient;
		$this->patient_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => $this->patient,'location' => $this->patient,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( config('brightree.patient') .'?singleWsdl', $this->patient_options);
        $response 	= $client->$call($query);
        return $response;
    }
	
	public function PatientCreate($query)
    {
    	return $this->apiCall('PatientCreate',$query);
    }
    
    public function PatientSearch($query)
    {
    	return $this->apiCall('PatientSearch',$query);
    }
    
    public function PatientUpdate($query)
    {
    	return $this->apiCall('PatientUpdate',$query);
    }
    
    public function PatientFetchByExternalID($id=null)
    {
    	return $this->apiCall('PatientFetchByExternalID',array('ExternalID' => $id));
    }
    
    public function PatientFetchByPatientID($id=null)
    {
    	return $this->apiCall('PatientFetchByPatientID',array('PatientID' => $id));
    }
    
    public function PatientNoteCreate($query)
    {
    	return $this->apiCall('PatientNoteCreate',$query);
    }
    
    public function PatientNoteFetchByKey($id=null)
    {
    	return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }
    
    public function PatientNoteFetchByPatient($id=null)
    {
    	return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }
    
    public function PatientNoteSearch($query)
    {
    	return $this->apiCall('PatientNoteSearch',$query);
    }
    
    public function PatientNoteUpdate($query)
    {
    	return $this->apiCall('PatientNoteUpdate',$query);
    }
    
    public function PatientPayorAdd($query)
    {
    	return $this->apiCall('PatientPayorAdd',$query);
    }
    
    public function PatientPayorFetch($query)
    {
    	return $this->apiCall('PatientPayorFetch',$query);
    }
    
    public function PatientPayorFetchAll($key ='12345')
    {
    	return $this->apiCall('PatientPayorFetchAll',array("PatientKey" => $key));
    }
    
    public function PatientPayorRemove($id=null)
    {
    	return $this->apiCall('PatientPayorRemove',array('brightreeID' => $id));
    }
    
    public function PatientPayorUpdate($query)
    {
    	return $this->apiCall('PatientPayorUpdate',$query);
    }
    
    public function PatientPhoneNumberSearch($query)
    {
    	return $this->apiCall('PatientPhoneNumberSearch',$query);
    }
    
    public function PatientRemoveMarketingReferral($id=null)
    {
    	return $this->apiCall('PatientRemoveMarketingReferral',array('brightreeID' => $id));
    }
    
	public function FacilityMasterInfoFetchAll()
    {
    	return $this->apiCall('FacilityMasterInfoFetchAll','');
    }
	
	public function FacilityResidentCreate($query)
    {
    	return $this->apiCall('FacilityResidentCreate',$query);
    }
	
	public function PatientAddMarketingReferral($btid=null,$refid=null)
    {
    	return $this->apiCall('FacilityResidentCreate',array('BrightreeID'=>$btid,'BrightreeReferralID'=>$refid));
    }
	
   public function GetNoteByKey($id='141508')
    {
    	return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id));
    }
    
    public function GetNotesByPatient($id='12345') 
    {
    	return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id));
    }
    
    public function PatientFetchByBrightreeID($id='12345')
    {
    	return $this->apiCall('PatientFetchByBrightreeID',array('brightreeID' => $id));
    }
}
