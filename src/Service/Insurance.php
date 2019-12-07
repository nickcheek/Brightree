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
		$this->wsdl = $this->info->config->service['insurance'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['insurance'],'location' => $this->info->config->service['insurance'],'trace' => 1);
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