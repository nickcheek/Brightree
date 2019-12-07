<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Security extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['security'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['security'],'location' => $this->info->config->service['security'],'trace' => 1);
    }

    public function UserSearch($query): object
    {
        return $this->apiCall('UserSearch',$query);
    }

    public function UserFetchByBrightreeID($query): object
    {
        return $this->apiCall('UserFetchByBrightreeID',$query);
    }

    public function UserUpdate($query): object
    {
        return $this->apiCall('UserUpdate',$query);
    }
}