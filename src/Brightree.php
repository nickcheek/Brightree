<?php

namespace Nickcheek\Brightree;

use SoapClient;
use Nickcheek\Brightree\Service\Patient;


class Brightree
{
	private $wsdl;
	private $connection;
	protected $patient_options;
	protected $document_options;
	protected $documentation_options;
	
	public function __construct()
	{
		$this->patient_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.patient'),'location' => config('brightree.patient'),'trace' => 1);
		$this->document_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.document'),'location' => config('brightree.document'),'trace' => 1);
		$this->documentation_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => config('brightree.documentation'),'location' => config('brightree.documentation'),'trace' => 1);
		
	}
	
	public function apiCall($call,$query,$wsdl,$options)
    {
        $client     = new SoapClient( $wsdl .'?singleWsdl', $options);
        $response 	= $client->call($query);
        return $response;
    }
    
	
	
	public function Patient()
    {
    	return new Patient();
    }
	
	public function Document()
    {
    	return new Document();
    }
    
	public function Documentation()
    {
    	return new Documentation();
    }
    
        
}
