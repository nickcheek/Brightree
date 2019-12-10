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
     * @param array $query
     * @return object
     */
	public function PickupExchangeAddAllRentalItems(array $query): object
    {
    	return $this->apiCall('PickupExchangeAddAllRentalItems',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeAddDeliveryException(array $query): object
    {
        return $this->apiCall('PickupExchangeAddDeliveryException',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeAddPickupItem(array $query): object
    {
        return $this->apiCall('PickupExchangeAddPickupItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeCancelPOD(array $query): object
    {
        return $this->apiCall('PickupExchangeCancelPOD',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeConfirm(array $query): object
    {
        return $this->apiCall('PickupExchangeConfirm',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeCreate(array $query): object
    {
        return $this->apiCall('PickupExchangeCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeDelete(array $query): object
    {
        return $this->apiCall('PickupExchangeDelete',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('PickupExchangeFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeFetchByExternalID(array $query): object
    {
        return $this->apiCall('PickupExchangeFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeItemAddDeliveryException(array $query): object
    {
        return $this->apiCall('PickupExchangeItemAddDeliveryException',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeItemSpecifyExchangeItem(array $query): object
    {
        return $this->apiCall('PickupExchangeItemSpecifyExchangeItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeMessagesFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('PickupExchangeMessagesFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangePayorSearch(array $query): object
    {
        return $this->apiCall('PickupExchangePayorSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeRemoveItem(array $query): object
    {
        return $this->apiCall('PickupExchangeRemoveItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeSearch(array $query): object
    {
        return $this->apiCall('PickupExchangeSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeSendPOD(array $query): object
    {
        return $this->apiCall('PickupExchangeSendPOD',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeUpdate(array $query): object
    {
        return $this->apiCall('PickupExchangeUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeUpdateItem(array $query): object
    {
        return $this->apiCall('PickupExchangeUpdateItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function PickupExchangeUpdatePODStatus(array $query): object
    {
        return $this->apiCall('PickupExchangeUpdatePODStatus',$query);
    }
}