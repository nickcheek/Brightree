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
     * @param iterable $query
     * @return object
     */
    public function FetchItemLocations(iterable $query): object
    {
        return $this->apiCall('FetchItemLocations',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FetchItemQuantitiesAtLocation(iterable $query): object
    {
        return $this->apiCall('FetchItemQuantitiesAtLocation',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InventoryItemAddLots(iterable $query): object
    {
        return $this->apiCall('InventoryItemAddLots',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InventoryItemAddSerialNumbers(iterable $query): object
    {
        return $this->apiCall('InventoryItemAddSerialNumbers',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InventoryItemAdjustment(iterable $query): object
    {
        return $this->apiCall('InventoryItemAdjustment',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InventoryItemTransfer(iterable $query): object
    {
        return $this->apiCall('InventoryItemTransfer',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemAddToLocation(iterable $query): object
    {
        return $this->apiCall('ItemAddToLocation',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemAddToLocations(iterable $query): object
    {
        return $this->apiCall('ItemAddToLocations',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemCreate(iterable $query): object
    {
        return $this->apiCall('ItemCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('ItemFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('ItemFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemFetchByItemID(iterable $query): object
    {
        return $this->apiCall('ItemFetchByItemID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemFetchReplacementItemsByBrightreeID(iterable $query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemFetchReplacementItemsByItemID(iterable $query): object
    {
        return $this->apiCall('ItemFetchReplacementItemsByItemID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemLocationsUpdate(iterable $query): object
    {
        return $this->apiCall('ItemLocationsUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemLocationUpdate(iterable $query): object
    {
        return $this->apiCall('ItemLocationUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemSearch(iterable $query): object
    {
        return $this->apiCall('ItemSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ItemUpdate(iterable $query): object
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