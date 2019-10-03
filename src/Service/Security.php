<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Security extends Brightree
{
    use ApiCall;
    protected $options;
    protected $wsdl;

    public function __construct()
    {
        parent::__construct();
        $this->wsdl = $this->config->service['security'] .'?singleWsdl';
        $this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['security'],'location' => $this->config->service['security'],'trace' => 1);
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