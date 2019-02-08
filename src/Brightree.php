<?php

namespace Nickcheek\Brightree;

use SoapClient;

class Brightree
{
	private static $wsdl;
	private static $connection;
	protected static $patient_options;
	protected static $document_options;
	
	public function __construct()
	{
		self::$patient_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
		self::$document_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.document'),'location' => config('brightree.document'),'trace' => 1);
	}
	
	public static function apiCall($call,$query,$wsdl,$options)
    {
        $client     = new SoapClient( $wsdl .'?singleWsdl', $options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	//Patient Calls
	
	public static function PatientCreate($query)
    {
    	return self::apiCall('PatientCreate',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientSearch($query)
    {
    	return self::apiCall('PatientSearch',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientUpdate($query)
    {
    	return self::apiCall('PatientUpdate',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientFetchByExternalID($id=null)
    {
    	return self::apiCall('PatientFetchByExternalID',array('ExternalID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientFetchByPatientID($id=null)
    {
    	return self::apiCall('PatientFetchByPatientID',array('PatientID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientNoteCreate($query)
    {
    	return self::apiCall('PatientNoteCreate',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientNoteFetchByKey($id=null)
    {
    	return self::apiCall('PatientNoteFetchByKey',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientNoteFetchByPatient($id=null)
    {
    	return self::apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientNoteSearch($query)
    {
    	return self::apiCall('PatientNoteSearch',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientNoteUpdate($query)
    {
    	return self::apiCall('PatientNoteUpdate',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPayorAdd($query)
    {
    	return self::apiCall('PatientPayorAdd',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPayorFetch($query)
    {
    	return self::apiCall('PatientPayorFetch',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPayorFetchAll($key ='12345')
    {
    	return self::apiCall('PatientPayorFetchAll',array("PatientKey" => $key),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPayorRemove($id=null)
    {
    	return self::apiCall('PatientPayorRemove',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPayorUpdate($query)
    {
    	return self::apiCall('PatientPayorUpdate',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientPhoneNumberSearch($query)
    {
    	return self::apiCall('PatientPhoneNumberSearch',$query,config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientRemoveMarketingReferral($id=null)
    {
    	return self::apiCall('PatientRemoveMarketingReferral',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
	public static function FacilityMasterInfoFetchAll()
    {
    	return self::apiCall('FacilityMasterInfoFetchAll','',config('brightree.patient'),self::$patient_options);
    }
	
	public static function FacilityResidentCreate($query)
    {
    	return self::apiCall('FacilityResidentCreate',$query,config('brightree.patient'),self::$patient_options);
    }
	
	public static function PatientAddMarketingReferral($btid=null,$refid=null)
    {
    	return self::apiCall('FacilityResidentCreate',array('BrightreeID'=>$btid,'BrightreeReferralID'=>$refid),config('brightree.patient'),self::$patient_options);
    }
	
   public static function GetNoteByKey($id='141508')
    {
    	return self::apiCall('PatientNoteFetchByKey',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function GetNotesByPatient($id='12345') 
    {
    	return self::apiCall('PatientNoteFetchByPatient',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
    public static function PatientFetchByBrightreeID($id='12345')
    {
    	return self::apiCall('PatientFetchByBrightreeID',array('brightreeID' => $id),config('brightree.patient'),self::$patient_options);
    }
    
     
    
    
    //Document Management Calls
    public static function DocumentTypesFetchAll()
    {
    	return self::apiCall('DocumentTypesFetchAll',,config('brightree.document'),self::$document_options);
    }
    
    public static function DocumentBatchCreate($query)
    {
    	return self::apiCall('DocumentBatchCreate',$query,config('brightree.document'),self::$document_options);
    }
    
    public static function DocumentBatchSearch($query)
    {
    	return self::apiCall('DocumentBatchSearch',$query,config('brightree.document'),self::$document_options);
    }
    
    public static function DocumentSearch($query)
    {
    	return self::apiCall('DocumentSearch',$query,config('brightree.document'),self::$document_options);
    }
    
    public static function FetchDocumentContent($key='12345')
    {
    	return self::apiCall('FetchDocumentContent',array('documentKey' => $key),config('brightree.document'),self::$document_options);
    }
    
    public static function GenerateDocumentID($query)
    {
    	return self::apiCall('GenerateDocumentID',$query,config('brightree.document'),self::$document_options);
    }
    
    public static function StoreDocument($query)
    {
    	return self::apiCall('StoreDocument',$query,config('brightree.document'),self::$document_options);
    }
    
}
