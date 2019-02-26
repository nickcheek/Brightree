<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Inventory
{
	protected $inventory;
	protected $inventory_options;

	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->inventory = $config->inventory;
		$this->inventory_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => $this->inventory,'location' => $this->inventory,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->inventory .'?singleWsdl', $this->inventory_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	public function CoverageTypeFetchAll()
    {
    	return $this->apiCall('CoverageTypeFetchAll',[]);
    }

    public function ClaimNoteTypeFetchAll()
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    public function FetchItemLocations($query)
    {
        return $this->apiCall('FetchItemLocations',$query);
    }

    public function FetchItemQuantitiesAtLocation($query)
    {
        return $this->apiCall('FetchItemQuantitiesAtLocation',$query);
    }
   
    public function InventoryItemAddLots($query)
    {
        return $this->apiCall('InventoryItemAddLots',$query);
    }

    public function InventoryItemAddSerialNumbers($query)
    {
        return $this->apiCall('InventoryItemAddSerialNumbers',$query);
    }

    public function InventoryItemAdjustment($query)
    {
        return $this->apiCall('InventoryItemAdjustment',$query);
    }

    public function InventoryItemTransfer($query)
    {
        return $this->apiCall('InventoryItemTransfer',$query);
    }

    public function ItemAddToLocation($query)
    {
        return $this->apiCall('ItemAddToLocation',$query);
    }

    public function ItemAddToLocations($query)
    {
        return $this->apiCall('ItemAddToLocations',$query);
    }

    public function ItemCreate($query)
    {
        return $this->apiCall('ItemCreate',$query);
    }

    public function ItemFetchByBrightreeID($query)
    {
        return $this->apiCall('ItemFetchByBrightreeID',$query);
    }

    public function ItemFetchByExternalID($query)
    {
        return $this->apiCall('ItemFetchByExternalID',$query);
    }

    public function ItemFetchByItemID($query)
    {
        return $this->apiCall('ItemFetchByItemID',$query);
    }

    public function ItemFetchReplacementItemsByBrightreeID($query)
    {
        return $this->apiCall('ItemFetchReplacementItemsByBrightreeID',$query);
    }

    public function ItemFetchReplacementItemsByItemID($query)
    {
        return $this->apiCall('ItemFetchReplacementItemsByItemID',$query);
    }

    public function ItemLocationsUpdate($query)
    {
        return $this->apiCall('ItemLocationsUpdate',$query);
    }

    public function ItemLocationUpdate($query)
    {
        return $this->apiCall('ItemLocationUpdate',$query);
    }

    public function ItemSearch($query)
    {
        return $this->apiCall('ItemSearch',$query);
    }

    public function ItemUpdate($query)
    {
        return $this->apiCall('ItemUpdate',$query);
    }

    public function KitTypeFetchAll()
    {
        return $this->apiCall('KitTypeFetchAll',[]);
    }

    public function NDCFetchAll()
    {
        return $this->apiCall('NDCFetchAll',[]);
    }

    public function StockingUOMFetchAll()
    {
        return $this->apiCall('StockingUOMFetchAll',[]);
    }
}