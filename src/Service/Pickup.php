<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;

class Pickup extends Brightree
{
    use ApiCall;
    protected $options;
    protected $wsdl;
	
	public function __construct()
	{
		parent::__construct();
		$this->wsdl = $this->config->service['pickup'] .'?singleWsdl';
		$this->options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['pickup'],'location' => $this->config->service['pickup'],'trace' => 1);
	}
    
	public function PickupExchangeAddAllRentalItems($query)
    {
    	return $this->apiCall('PickupExchangeAddAllRentalItems',$query);
    }

    public function PickupExchangeAddDeliveryException($query)
    {
        return $this->apiCall('PickupExchangeAddDeliveryException',$query);
    }

    public function PickupExchangeAddPickupItem($query)
    {
        return $this->apiCall('PickupExchangeAddPickupItem',$query);
    }

    public function PickupExchangeCancelPOD($query)
    {
        return $this->apiCall('PickupExchangeCancelPOD',$query);
    }

    public function PickupExchangeConfirm($query)
    {
        return $this->apiCall('PickupExchangeConfirm',$query);
    }
    
    public function PickupExchangeCreate($query)
    {
        return $this->apiCall('PickupExchangeCreate',$query);
    }

    public function PickupExchangeDelete($query)
    {
        return $this->apiCall('PickupExchangeDelete',$query);
    }

    public function PickupExchangeFetchByBrightreeID($query)
    {
        return $this->apiCall('PickupExchangeFetchByBrightreeID',$query);
    }

    public function PickupExchangeFetchByExternalID($query)
    {
        return $this->apiCall('PickupExchangeFetchByExternalID',$query);
    }

    public function PickupExchangeItemAddDeliveryException($query)
    {
        return $this->apiCall('PickupExchangeItemAddDeliveryException',$query);
    }

    public function PickupExchangeItemSpecifyExchangeItem($query)
    {
        return $this->apiCall('PickupExchangeItemSpecifyExchangeItem',$query);
    }
    
    public function PickupExchangeMessagesFetchByBrightreeID($query)
    {
        return $this->apiCall('PickupExchangeMessagesFetchByBrightreeID',$query);
    }

    public function PickupExchangePayorSearch($query)
    {
        return $this->apiCall('PickupExchangePayorSearch',$query);
    }

    public function PickupExchangeRemoveItem($query)
    {
        return $this->apiCall('PickupExchangeRemoveItem',$query);
    }

    public function PickupExchangeSearch($query)
    {
        return $this->apiCall('PickupExchangeSearch',$query);
    }

    public function PickupExchangeSendPOD($query)
    {
        return $this->apiCall('PickupExchangeSendPOD',$query);
    }

    public function PickupExchangeUpdate($query)
    {
        return $this->apiCall('PickupExchangeUpdate',$query);
    }

    public function PickupExchangeUpdateItem($query)
    {
        return $this->apiCall('PickupExchangeUpdateItem',$query);
    }

    public function PickupExchangeUpdatePODStatus($query)
    {
        return $this->apiCall('PickupExchangeUpdatePODStatus',$query);
    }
}