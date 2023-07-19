<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Pricing extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['pricing'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['pricing'],'location' => $this->info->config->service['pricing'],'trace' => 1);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function CMNFormFetchAll(iterable $query): object
    {
        return $this->apiCall('CMNFormFetchAll',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function NonTaxReasonFetchAll(iterable $query): object
    {
        return $this->apiCall('NonTaxReasonFetchAll',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceCreateItem(iterable $query): object
    {
        return $this->apiCall('PriceCreateItem', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceCreateStandard(iterable $query): object
    {
        return $this->apiCall('PriceCreateStandard', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceDetailCreate(iterable $query): object
    {
        return $this->apiCall('PriceDetailCreate', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceDetailFetchByBrightreeDetailID(iterable $query): object
    {
        return $this->apiCall('PriceDetailFetchByBrightreeDetailID', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceDetailUpdate(iterable $query): object
    {
        return $this->apiCall('PriceDetailUpdate', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceFetch(iterable $query): object
    {
        return $this->apiCall('PriceFetch', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceOptionLetterTypeFetchAll(iterable $query): object
    {
        return $this->apiCall('PriceOptionLetterTypeFetchAll', $query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceTableFetchAll(iterable $query): object
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