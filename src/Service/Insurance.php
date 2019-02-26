<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Insurance
{
	protected $insurance;
	protected $insurance_options;
	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->insurance = $config->service['insurance'];
		$this->insurance_options = array('login' => $config->user['name'],'password' => $config->user['pass'],'uri' => $this->insurance,'location' => $this->insurance,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->insurance .'?singleWsdl', $this->insurance_options);
        $response 	= $client->$call($query);
        return $response;
    }
		
	public function InsuranceFetchByBrightreeID($query)
    {
    	return $this->apiCall('InsuranceFetchByBrightreeID',$query);
    }
	
	public function InsuranceFetchByExternalID($query)
    {
    	return $this->apiCall('InsuranceFetchByExternalID',$query);
    }
    
    public function InsuranceSearch($query)
    {
    	return $this->apiCall('InsuranceSearch',$query);
    }
    
    public function InsuranceUpdate($query)
    {
    	return $this->apiCall('InsuranceUpdate',$query);
    }
}