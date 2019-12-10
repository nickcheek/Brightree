<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Pricing extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['pricing'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['pricing'],'location' => $this->info->config->service['pricing'],'trace' => 1);
    }

    /**
     * @param array $query
     * @return object
     */
    public function CMNFormFetchAll(array $query): object
    {
        return $this->apiCall('CMNFormFetchAll',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function NonTaxReasonFetchAll(array $query): object
    {
        return $this->apiCall('NonTaxReasonFetchAll',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceCreateItem(array $query): object
    {
        return $this->apiCall('PriceCreateItem', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceCreateStandard(array $query): object
    {
        return $this->apiCall('PriceCreateStandard', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceDetailCreate(array $query): object
    {
        return $this->apiCall('PriceDetailCreate', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceDetailFetchByBrightreeDetailID(array $query): object
    {
        return $this->apiCall('PriceDetailFetchByBrightreeDetailID', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceDetailUpdate(array $query): object
    {
        return $this->apiCall('PriceDetailUpdate', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceFetch(array $query): object
    {
        return $this->apiCall('PriceFetch', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceOptionLetterTypeFetchAll(array $query): object
    {
        return $this->apiCall('PriceOptionLetterTypeFetchAll', $query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PriceTableFetchAll(array $query): object
    {
        return $this->apiCall('PriceTableFetchAll', $query);
    }

    /**
     * @return object
     */
    public function Ping(): object
    {
        return $this->apiCall('Ping', array('Ping'=>[]));
    }

}