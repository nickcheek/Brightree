<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class CustomField
{
	protected $custom;
	protected $custom_options;
	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->custom = $config->service['custom'];
		$this->custom_options = array('login' => $config->user['name'],'password' => $config->user['pass'],'uri' => $this->custom,'location' => $this->custom,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->custom .'?singleWsdl', $this->custom_options);
        $response 	= $client->$call($query);
        return $response;
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