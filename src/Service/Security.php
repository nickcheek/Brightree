<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use SoapClient;

class Security extends Brightree
{
    protected $security_options;

    public function __construct()
    {
        parent::__construct();
        $this->security_options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['security'],'location' => $this->config->service['security'],'trace' => 1);
    }

    public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->config->service['security'] .'?singleWsdl', $this->security_options);
        return $client->$call($query);
    }

    public function UserSearch($query)
    {
        return $this->apiCall('UserSearch',$query);
    }

    public function UserFetchByBrightreeID($query)
    {
        return $this->apiCall('UserFetchByBrightreeID',$query);
    }

    public function UserUpdate($query)
    {
        return $this->apiCall('UserUpdate',$query);
    }
}