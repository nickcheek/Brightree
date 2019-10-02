<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use SoapClient;

class Insurance extends Brightree
{
	protected $insurance_options;
	
	public function __construct()
	{
		parent::__construct();
		$this->insurance_options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['insurance'],'location' => $this->config->service['insurance'],'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client = new SoapClient( $this->config->service['insurance'] .'?singleWsdl', $this->insurance_options);
        return $client->$call($query);
    }
		
	public function InsuranceFetchByBrightreeID($id)
    {
    	return $this->apiCall('InsuranceFetchByBrightreeID',['BrightreeID'=>$id]);
    }
	
	public function InsuranceFetchByExternalID($id)
    {
    	return $this->apiCall('InsuranceFetchByExternalID',['ExternalID'=>$id]);
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