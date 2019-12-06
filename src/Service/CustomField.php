<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class CustomField extends Brightree
{
    use ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['custom'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['custom'],'location' => $this->info->config->service['custom'],'trace' => 1);
    }

    public function CustomFieldFetchAllByCategory($category,$includeInactive=0): object
    {
        return $this->apiCall('CustomFieldFetchAllByCategory',['category'=>$category,'includeInactive'=>$includeInactive]);
    }

    public function CustomFieldValueFetchAllByBrightreeID($id,$category): object
    {
        return $this->apiCall('CustomFieldValueFetchAllByBrightreeID',['brightreeID'=>$id,'category'=>$category]);
    }

    public function CustomFieldValueSaveMultiple($query): object
    {
        return $this->apiCall('CustomFieldValueSaveMultiple',$query);
    }
}
