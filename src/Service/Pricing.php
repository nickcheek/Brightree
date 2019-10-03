<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Pricing extends Brightree
{
    use ApiCall;
    protected $options;
    protected $wsdl;

    public function __construct()
    {
        parent::__construct();
        $this->wsdl = $this->config->service['pricing'] .'?singleWsdl';
        $this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['pricing'],'location' => $this->config->service['pricing'],'trace' => 1);
    }

    public function CMNFormFetchAll($query)
    {
        return $this->apiCall('CMNFormFetchAll',$query);
    }

    public function NonTaxReasonFetchAll($query)
    {
        return $this->apiCall('NonTaxReasonFetchAll',$query);
    }

    public function PriceCreateItem($query)
    {
        return $this->apiCall('PriceCreateItem', $query);
    }

    public function PriceCreateStandard($query)
    {
        return $this->apiCall('PriceCreateStandard', $query);
    }

    public function PriceDetailCreate($query)
    {
        return $this->apiCall('PriceDetailCreate', $query);
    }

    public function PriceDetailFetchByBrightreeDetailID($query)
    {
        return $this->apiCall('PriceDetailFetchByBrightreeDetailID', $query);
    }

    public function PriceDetailUpdate($query)
    {
        return $this->apiCall('PriceDetailUpdate', $query);
    }

    public function PriceFetch($query)
    {
        return $this->apiCall('PriceFetch', $query);
    }

    public function PriceOptionLetterTypeFetchAll($query)
    {
        return $this->apiCall('PriceOptionLetterTypeFetchAll', $query);
    }

    public function PriceTableFetchAll($query)
    {
        return $this->apiCall('PriceTableFetchAll', $query);
    }

}