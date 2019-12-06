<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Insurance extends Brightree
{
    use ApiCall;
	
	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->config->service['insurance'] .'?singleWsdl';
		$this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['insurance'],'location' => $this->config->service['insurance'],'trace' => 1);
	}
		
	public function InsuranceFetchByBrightreeID($id): object
    {
    	return $this->apiCall('InsuranceFetchByBrightreeID',['BrightreeID'=>$id]);
    }
	
	public function InsuranceFetchByExternalID($id): object
    {
    	return $this->apiCall('InsuranceFetchByExternalID',['ExternalID'=>$id]);
    }
    
    public function InsuranceSearch($query): object
    {
    	return $this->apiCall('InsuranceSearch',$query);
    }
    
    public function InsuranceUpdate($query): object
    {
    	return $this->apiCall('InsuranceUpdate',$query);
    }
}