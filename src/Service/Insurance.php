<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Insurance extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
	
	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['insurance'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['insurance'],'location' => $this->info->config->service['insurance'],'trace' => 1);
	}

    /**
     * Get insurance by brightree id
     *
     * @param int $id
     * @return object
     */
	public function InsuranceFetchByBrightreeID(int $id): object
    {
    	return $this->apiCall('InsuranceFetchByBrightreeID',['BrightreeID'=>$id]);
    }

    /**
     * Get insurance by external id
     *
     * @param int $id
     * @return object
     */
	public function InsuranceFetchByExternalID(int $id): object
    {
    	return $this->apiCall('InsuranceFetchByExternalID',['ExternalID'=>$id]);
    }

    /**
     * Search for an insurance carrier
     *
     * @param array $query
     * @return object
     */
    public function InsuranceSearch(array $query): object
    {
    	return $this->apiCall('InsuranceSearch',$query);
    }

    /**
     * Update Insurance
     *
     * @param array $query
     * @return object
     */
    public function InsuranceUpdate(array $query): object
    {
    	return $this->apiCall('InsuranceUpdate',$query);
    }
}