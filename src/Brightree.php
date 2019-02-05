<?php

namespace Nickcheek\Brightree;

use SoapClient;

class Brightree
{
	private $wsdl;
	private $connection;
	protected static $patient_options;
	protected static $document_options;
	
	public function __construct()
	{
		self::$patient_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
		self::$document_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.document'),'location' => config('brightree.document'),'trace' => 1);

	}
	
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient($this->wsdl, $this->connection);
        $response 	= $client->$call($query);
        return $response;
    }
    
	//Patient Calls
   public static function GetNoteByKey($id='141508')
    {
        $client   = new SoapClient(config('brightree.patient').'?singleWsdl',self::$patient_options);
        $response   = $client->PatientNoteFetchByKey(array('brightreeID' => $id));
        return $response;
    }
    
    public static function GetNotesByPatient($id='12345') 
    {
	    $client   = new SoapClient(config('brightree.patient').'?singleWsdl',self::$patient_options);
        $response   = $client->PatientNoteFetchByPatient(array('brightreeID' => $id));
        return $response;
    }
    
    public static function PatientFetchByBrightreeID($id='12345')
    {
    	
        $client     = new SoapClient(config('brightree.patient').'?singleWsdl', self::$patient_options);
        $response 	= $client->PatientFetchByBrightreeID(array("BrightreeID" => $id));
        return $response;
    }
    
    public static function PatientPayorFetchAll($key ='12345')
    {
        $client     = new SoapClient(config('brightree.patient').'?singleWsdl', self::$patient_options);
		$response = $client->PatientPayorFetchAll(array("PatientKey" => $key));
        return $response;
    } 
    
    
    //Document Calls
    public static function DocumentTypesFetchAll()
    {
    	 
        $client   = new SoapClient(config('brightree.document').'?singleWsdl',self::$document_options);
        $response   = $client->DocumentTypesFetchAll();
        return $response;
    }
    
}
