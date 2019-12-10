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

    /**
     * @return object
     */
	public function CoverageTypeFetchAll(): object
    {
    	return $this->apiCall('CoverageTypeFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ClaimNoteTypeFetchAll(): object
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FetchItemLocations(array $query): object
    {
        return $this->apiCall('FetchItemLocations',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FetchItemQuantitiesAtLocation(array $query): object
    {
        return $this->apiCall('FetchItemQuantitiesAtLocation',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function InventoryItemAddLots(array $query): object
    {
        return $this->apiCall('InventoryItemAddLots',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function InventoryItemAddSerialNumbers(array $query): object
    {
        return $this->apiCall('InventoryItemAddSerialNumbers',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function InventoryItemAdjustment(array $query): object
    {
        return $this->apiCall('InventoryItemAdjustment',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function InventoryItemTransfer(array $query): object
    {
        return $this->apiCall('InventoryItemTransfer',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemAddToLocation(array $query): object
    {
        return $this->apiCall('ItemAddToLocation',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemAddToLocations(array $query): object
    {
        return $this->apiCall('ItemAddToLocations',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemCreate(array $query): object
    {
        return $this->apiCall('ItemCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('ItemFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemFetchByExternalID(array $query): object
    {
        return $this->apiCall('ItemFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemFetchByItemID(array $query): object
    {
        return $this->apiCall('ItemFetchByItemID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemFetchReplacementItemsByBrightreeID(array $query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemFetchReplacementItemsByItemID(array $query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByItemID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemLocationsUpdate(array $query): object
    {
        return $this->apiCall('ItemLocationsUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemLocationUpdate(array $query): object
    {
        return $this->apiCall('ItemLocationUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemSearch(array $query): object
    {
        return $this->apiCall('ItemSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ItemUpdate(array $query): object
    {
        return $this->apiCall('ItemUpdate',$query);
    }

    /**
     * @return object
     */
    public function KitTypeFetchAll(): object
    {
        return $this->apiCall('KitTypeFetchAll',[]);
    }

    /**
     * @return object
     */
    public function NDCFetchAll(): object
    {
        return $this->apiCall('NDCFetchAll',[]);
    }

    /**
     * @return object
     */
    public function StockingUOMFetchAll(): object
    {
        return $this->apiCall('StockingUOMFetchAll',[]);
    }
}