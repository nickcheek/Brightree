<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Pickup extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
	
	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['pickup'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['pickup'],'location' => $this->info->config->service['pickup'],'trace' => 1);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PickupExchangeAddAllRentalItems(iterable $query): object
    {
    	return $this->apiCall('PickupExchangeAddAllRentalItems',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeAddDeliveryException(iterable $query): object
    {
        return $this->apiCall('PickupExchangeAddDeliveryException',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeAddPickupItem(iterable $query): object
    {
        return $this->apiCall('PickupExchangeAddPickupItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeCancelPOD(iterable $query): object
    {
        return $this->apiCall('PickupExchangeCancelPOD',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeConfirm(iterable $query): object
    {
        return $this->apiCall('PickupExchangeConfirm',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeCreate(iterable $query): object
    {
        return $this->apiCall('PickupExchangeCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeDelete(iterable $query): object
    {
        return $this->apiCall('PickupExchangeDelete',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('PickupExchangeFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('PickupExchangeFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeItemAddDeliveryException(iterable $query): object
    {
        return $this->apiCall('PickupExchangeItemAddDeliveryException',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeItemSpecifyExchangeItem(iterable $query): object
    {
        return $this->apiCall('PickupExchangeItemSpecifyExchangeItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeMessagesFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('PickupExchangeMessagesFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangePayorSearch(iterable $query): object
    {
        return $this->apiCall('PickupExchangePayorSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeRemoveItem(iterable $query): object
    {
        return $this->apiCall('PickupExchangeRemoveItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeSearch(iterable $query): object
    {
        return $this->apiCall('PickupExchangeSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeSendPOD(iterable $query): object
    {
        return $this->apiCall('PickupExchangeSendPOD',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeUpdate(iterable $query): object
    {
        return $this->apiCall('PickupExchangeUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeUpdateItem(iterable $query): object
    {
        return $this->apiCall('PickupExchangeUpdateItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PickupExchangeUpdatePODStatus(iterable $query): object
    {
        return $this->apiCall('PickupExchangeUpdatePODStatus',$query);
    }
}