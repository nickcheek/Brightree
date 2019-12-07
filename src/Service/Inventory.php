<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Inventory extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['inventory'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['inventory'],'location' => $this->info->config->service['inventory'],'trace' => 1);
	}
    
	public function CoverageTypeFetchAll(): object
    {
    	return $this->apiCall('CoverageTypeFetchAll',[]);
    }

    public function ClaimNoteTypeFetchAll(): object
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    public function FetchItemLocations($query): object
    {
        return $this->apiCall('FetchItemLocations',$query);
    }

    public function FetchItemQuantitiesAtLocation($query): object
    {
        return $this->apiCall('FetchItemQuantitiesAtLocation',$query);
    }
   
    public function InventoryItemAddLots($query): object
    {
        return $this->apiCall('InventoryItemAddLots',$query);
    }

    public function InventoryItemAddSerialNumbers($query): object
    {
        return $this->apiCall('InventoryItemAddSerialNumbers',$query);
    }

    public function InventoryItemAdjustment($query): object
    {
        return $this->apiCall('InventoryItemAdjustment',$query);
    }

    public function InventoryItemTransfer($query): object
    {
        return $this->apiCall('InventoryItemTransfer',$query);
    }

    public function ItemAddToLocation($query): object
    {
        return $this->apiCall('ItemAddToLocation',$query);
    }

    public function ItemAddToLocations($query): object
    {
        return $this->apiCall('ItemAddToLocations',$query);
    }

    public function ItemCreate($query): object
    {
        return $this->apiCall('ItemCreate',$query);
    }

    public function ItemFetchByBrightreeID($query): object
    {
        return $this->apiCall('ItemFetchByBrightreeID',$query);
    }

    public function ItemFetchByExternalID($query): object
    {
        return $this->apiCall('ItemFetchByExternalID',$query);
    }

    public function ItemFetchByItemID($query): object
    {
        return $this->apiCall('ItemFetchByItemID',$query);
    }

    public function ItemFetchReplacementItemsByBrightreeID($query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByBrightreeID',$query);
    }

    public function ItemFetchReplacementItemsByItemID($query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByItemID',$query);
    }

    public function ItemLocationsUpdate($query): object
    {
        return $this->apiCall('ItemLocationsUpdate',$query);
    }

    public function ItemLocationUpdate($query): object
    {
        return $this->apiCall('ItemLocationUpdate',$query);
    }

    public function ItemSearch($query): object
    {
        return $this->apiCall('ItemSearch',$query);
    }

    public function ItemUpdate($query): object
    {
        return $this->apiCall('ItemUpdate',$query);
    }

    public function KitTypeFetchAll(): object
    {
        return $this->apiCall('KitTypeFetchAll',[]);
    }

    public function NDCFetchAll(): object
    {
        return $this->apiCall('NDCFetchAll',[]);
    }

    public function StockingUOMFetchAll(): object
    {
        return $this->apiCall('StockingUOMFetchAll',[]);
    }
}