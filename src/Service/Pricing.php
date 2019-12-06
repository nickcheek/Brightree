<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Pricing extends Brightree
{
    use ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['pricing'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['pricing'],'location' => $this->info->config->service['pricing'],'trace' => 1);
    }

    public function CMNFormFetchAll($query): object
    {
        return $this->apiCall('CMNFormFetchAll',$query);
    }

    public function NonTaxReasonFetchAll($query): object
    {
        return $this->apiCall('NonTaxReasonFetchAll',$query);
    }

    public function PriceCreateItem($query): object
    {
        return $this->apiCall('PriceCreateItem', $query);
    }

    public function PriceCreateStandard($query): object
    {
        return $this->apiCall('PriceCreateStandard', $query);
    }

    public function PriceDetailCreate($query): object
    {
        return $this->apiCall('PriceDetailCreate', $query);
    }

    public function PriceDetailFetchByBrightreeDetailID($query): object
    {
        return $this->apiCall('PriceDetailFetchByBrightreeDetailID', $query);
    }

    public function PriceDetailUpdate($query): object
    {
        return $this->apiCall('PriceDetailUpdate', $query);
    }

    public function PriceFetch($query): object
    {
        return $this->apiCall('PriceFetch', $query);
    }

    public function PriceOptionLetterTypeFetchAll($query): object
    {
        return $this->apiCall('PriceOptionLetterTypeFetchAll', $query);
    }

    public function PriceTableFetchAll($query): object
    {
        return $this->apiCall('PriceTableFetchAll', $query);
    }

}