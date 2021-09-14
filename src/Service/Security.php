<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Security extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['security'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['security'],'location' => $this->info->config->service['security'],'trace' => 1);
    }

     /**
     * Create User
     * @param iterable $query
     * @return object
     */
    public function UserCreate(iterable $query): object
    {
        return $this->apiCall('UserCreate',$query);
    }

    /**
     * Search for a user
     * @param iterable $query
     * @return object
     */
    public function UserSearch(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function UserUpdate(iterable $query): object
    {
        return $this->apiCall('UserUpdate',$query);
    }

     /**
     * User Group Create
     * @param iterable $query
     * @return object
     */
    public function UserGroupCreate(iterable $query): object
    {
        return $this->apiCall('UserGroupCreate',$query);
    }

         /**
     * User Group Create
     * @param iterable $query
     * @return object
     */
    public function UserGroupUpdate(iterable $query): object
    {
        return $this->apiCall('UserGroupUpdate',$query);
    }

         /**
     * User Group Create
     * @param iterable $query
     * @return object
     */
    public function UserGroupFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('UserGroupFetchByBrightreeID',$query);
    }

         /**
     * User Group Create
     * @param iterable $query
     * @return object
     */
    public function UserGroupFetchAll(iterable $query): object
    {
        return $this->apiCall('UserGroupFetchAll',$query);
    }
}