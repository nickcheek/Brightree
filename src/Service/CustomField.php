<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class CustomField extends Brightree
{

    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['custom'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['custom'],'location' => $this->info->config->service['custom'],'trace' => 1);
    }

    /**
     * Grabs all Custom Fields by category
     *
     * @param string $category
     * @param int $includeInactive
     * @return object
     */
    public function CustomFieldFetchAllByCategory(string $category,int $includeInactive=0): object
    {
        return $this->apiCall('CustomFieldFetchAllByCategory',['category'=>$category,'includeInactive'=>$includeInactive]);
    }

    /**
     * Grabs all custom fields by Brightree ID
     *
     * @param int $id
     * @param string $category
     * @return object
     */
    public function CustomFieldValueFetchAllByBrightreeID(int $id, string $category): object
    {
        return $this->apiCall('CustomFieldValueFetchAllByBrightreeID',['brightreeID'=>$id,'category'=>$category]);
    }

    /**
     * Save one or multiple custom field values
     *
     * @param iterable $query
     * @return object
     */
    public function CustomFieldValueSaveMultiple(iterable $query): object
    {
        return $this->apiCall('CustomFieldValueSaveMultiple',$query);
    }
}
