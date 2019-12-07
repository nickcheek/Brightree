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
    
	public function PickupExchangeAddAllRentalItems($query): object
    {
    	return $this->apiCall('PickupExchangeAddAllRentalItems',$query);
    }

    public function PickupExchangeAddDeliveryException($query): object
    {
        return $this->apiCall('PickupExchangeAddDeliveryException',$query);
    }

    public function PickupExchangeAddPickupItem($query): object
    {
        return $this->apiCall('PickupExchangeAddPickupItem',$query);
    }

    public function PickupExchangeCancelPOD($query): object
    {
        return $this->apiCall('PickupExchangeCancelPOD',$query);
    }

    public function PickupExchangeConfirm($query): object
    {
        return $this->apiCall('PickupExchangeConfirm',$query);
    }
    
    public function PickupExchangeCreate($query): object
    {
        return $this->apiCall('PickupExchangeCreate',$query);
    }

    public function PickupExchangeDelete($query): object
    {
        return $this->apiCall('PickupExchangeDelete',$query);
    }

    public function PickupExchangeFetchByBrightreeID($query): object
    {
        return $this->apiCall('PickupExchangeFetchByBrightreeID',$query);
    }

    public function PickupExchangeFetchByExternalID($query): object
    {
        return $this->apiCall('PickupExchangeFetchByExternalID',$query);
    }

    public function PickupExchangeItemAddDeliveryException($query): object
    {
        return $this->apiCall('PickupExchangeItemAddDeliveryException',$query);
    }

    public function PickupExchangeItemSpecifyExchangeItem($query): object
    {
        return $this->apiCall('PickupExchangeItemSpecifyExchangeItem',$query);
    }
    
    public function PickupExchangeMessagesFetchByBrightreeID($query): object
    {
        return $this->apiCall('PickupExchangeMessagesFetchByBrightreeID',$query);
    }

    public function PickupExchangePayorSearch($query): object
    {
        return $this->apiCall('PickupExchangePayorSearch',$query);
    }

    public function PickupExchangeRemoveItem($query): object
    {
        return $this->apiCall('PickupExchangeRemoveItem',$query);
    }

    public function PickupExchangeSearch($query): object
    {
        return $this->apiCall('PickupExchangeSearch',$query);
    }

    public function PickupExchangeSendPOD($query): object
    {
        return $this->apiCall('PickupExchangeSendPOD',$query);
    }

    public function PickupExchangeUpdate($query): object
    {
        return $this->apiCall('PickupExchangeUpdate',$query);
    }

    public function PickupExchangeUpdateItem($query): object
    {
        return $this->apiCall('PickupExchangeUpdateItem',$query);
    }

    public function PickupExchangeUpdatePODStatus($query): object
    {
        return $this->apiCall('PickupExchangeUpdatePODStatus',$query);
    }
}