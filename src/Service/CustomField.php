<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class CustomField extends Brightree
{
    use ApiCall;
	protected $options;
	protected $wsdl;
	
	public function __construct()
	{
		parent::__construct();
		$this->wsdl = $this->config->service['custom'] .'?singleWsdl';
		$this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['custom'],'location' => $this->config->service['custom'],'trace' => 1);
	}

	public function CustomFieldFetchAllByCategory($category,$includeInactive=0)
    {
    	return $this->apiCall('CustomFieldFetchAllByCategory',['category'=>$category,'includeInactive'=>$includeInactive]);
    }
	
	public function CustomFieldValueFetchAllByBrightreeID($id,$category)
    {
    	return $this->apiCall('CustomFieldValueFetchAllByBrightreeID',['brightreeID'=>$id,'category'=>$category]);
    }
    
    public function CustomFieldValueSaveMultiple($query)
    {
    	return $this->apiCall('CustomFieldValueSaveMultiple',$query);
    }
}