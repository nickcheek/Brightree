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

    /**
     * Search for a user
     * @param array $query
     * @return object
     */
    public function UserSearch(array $query): object
    {
        return $this->apiCall('UserSearch',$query);
    }

    /**
     * Fetch user by Brightree ID
     * @param int $BrightreeID
     * @return object
     */
    public function UserFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('UserFetchByBrightreeID',array('BrightreeID'=>$BrightreeID));
    }

    /**
     * Update User
     * @param array $query
     * @return object
     */
    public function UserUpdate(array $query): object
    {
        return $this->apiCall('UserUpdate',$query);
    }
}