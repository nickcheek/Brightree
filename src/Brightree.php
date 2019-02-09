<?php

namespace Nickcheek\Brightree;

use SoapClient;

class Brightree
{
	private $wsdl;
	private $connection;
	protected $patient_options;
	protected $document_options;
	
	public function __construct()
	{
		$this->patient_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
		$this->document_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.document'),'location' => config('brightree.document'),'trace' => 1);
	}
	
	public function apiCall($call,$query,$wsdl,$options)
    {
        $client     = new SoapClient( $wsdl .'?singleWsdl', $options);
        $response 	= $client->call($query);
        return $response;
    }
    
	//Patient Calls
	
	public function PatientCreate($query)
    {
    	return $this->apiCall('PatientCreate',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientSearch($query)
    {
    	return $this->apiCall('PatientSearch',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientUpdate($query)
    {
    	return $this->apiCall('PatientUpdate',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientFetchByExternalID($id=null)
    {
    	return $this->apiCall('PatientFetchByExternalID',array('ExternalID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientFetchByPatientID($id=null)
    {
    	return $this->apiCall('PatientFetchByPatientID',array('PatientID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientNoteCreate($query)
    {
    	return $this->apiCall('PatientNoteCreate',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientNoteFetchByKey($id=null)
    {
    	return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientNoteFetchByPatient($id=null)
    {
    	return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientNoteSearch($query)
    {
    	return $this->apiCall('PatientNoteSearch',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientNoteUpdate($query)
    {
    	return $this->apiCall('PatientNoteUpdate',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPayorAdd($query)
    {
    	return $this->apiCall('PatientPayorAdd',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPayorFetch($query)
    {
    	return $this->apiCall('PatientPayorFetch',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPayorFetchAll($key ='12345')
    {
    	return $this->apiCall('PatientPayorFetchAll',array("PatientKey" => $key),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPayorRemove($id=null)
    {
    	return $this->apiCall('PatientPayorRemove',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPayorUpdate($query)
    {
    	return $this->apiCall('PatientPayorUpdate',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientPhoneNumberSearch($query)
    {
    	return $this->apiCall('PatientPhoneNumberSearch',$query,config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientRemoveMarketingReferral($id=null)
    {
    	return $this->apiCall('PatientRemoveMarketingReferral',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
	public function FacilityMasterInfoFetchAll()
    {
    	return $this->apiCall('FacilityMasterInfoFetchAll','',config('brightree.patient'),$this->patient_options);
    }
	
	public function FacilityResidentCreate($query)
    {
    	return $this->apiCall('FacilityResidentCreate',$query,config('brightree.patient'),$this->patient_options);
    }
	
	public function PatientAddMarketingReferral($btid=null,$refid=null)
    {
    	return $this->apiCall('FacilityResidentCreate',array('BrightreeID'=>$btid,'BrightreeReferralID'=>$refid),config('brightree.patient'),$this->patient_options);
    }
	
   public function GetNoteByKey($id='141508')
    {
    	return $this->apiCall('PatientNoteFetchByKey',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function GetNotesByPatient($id='12345') 
    {
    	return $this->apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
    public function PatientFetchByBrightreeID($id='12345')
    {
    	return $this->apiCall('PatientFetchByBrightreeID',array('brightreeID' => $id),config('brightree.patient'),$this->patient_options);
    }
    
     
    
    
    //Document Management Calls
    public function DocumentTypesFetchAll()
    {
    	return $this->apiCall('DocumentTypesFetchAll',[],config('brightree.document'),$this->document_options);
    }
    
    public function DocumentBatchCreate($query)
    {
    	return $this->apiCall('DocumentBatchCreate',$query,config('brightree.document'),$this->document_options);
    }
    
    public function DocumentBatchSearch($query)
    {
    	return $this->apiCall('DocumentBatchSearch',$query,config('brightree.document'),$this->document_options);
    }
    
    public function DocumentSearch($query)
    {
    	return $this->apiCall('DocumentSearch',$query,config('brightree.document'),$this->document_options);
    }
    
    public function FetchDocumentContent($key='12345')
    {
    	return $this->apiCall('FetchDocumentContent',array('documentKey' => $key),config('brightree.document'),$this->document_options);
    }
    
    public function GenerateDocumentID($query)
    {
    	return $this->apiCall('GenerateDocumentID',$query,config('brightree.document'),$this->document_options);
    }
    
    public function StoreDocument($query)
    {
    	return $this->apiCall('StoreDocument',$query,config('brightree.document'),$this->document_options);
    }
    
}
