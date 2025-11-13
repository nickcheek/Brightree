<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Inventory extends BaseService
{
	protected array $methods = [
		'CoverageTypeFetchAll' => [],
		'ClaimNoteTypeFetchAll' => [],
		'FetchItemLocations' => true,
		'FetchItemQuantitiesAtLocation' => true,
		'InventoryItemAddLots' => true,
		'InventoryItemAddSerialNumbers' => true,
		'InventoryItemAdjustment' => true,
		'InventoryItemTransfer' => true,
		'ItemAddToLocation' => true,
		'ItemAddToLocations' => true,
		'ItemCreate' => true,
		'ItemFetchByBrightreeID' => true,
		'ItemFetchByExternalID' => true,
		'ItemFetchByItemID' => true,
		'ItemFetchReplacementItemsByBrightreeID' => true,
		'ItemFetchReplacementItemsByItemID' => true,
		'ItemLocationsUpdate' => true,
		'ItemLocationUpdate' => true,
		'ItemSearch' => true,
		'ItemUpdate' => true,
		'KitTypeFetchAll' => [],
		'NDCFetchAll' => [],
		'StockingUOMFetchAll' => []
	];

	public function ItemFetchByBrightreeID(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("ItemFetchByBrightreeID requires an iterable parameter", 1002);
			}

			if (!isset($query['BrightreeID'])) {
				throw new BrightreeException("BrightreeID is required for ItemFetchByBrightreeID", 1003);
			}

			return $this->apiCall('ItemFetchByBrightreeID', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'ItemFetchByBrightreeID', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching item by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function ItemSearch(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("ItemSearch requires an iterable parameter", 1002);
			}

			return $this->apiCall('ItemSearch', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'ItemSearch', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error searching items: " . $e->getMessage(), 0, $e);
		}
	}

	public function CoverageTypeFetchAll(): object
	{
		try {
			return $this->apiCall('CoverageTypeFetchAll', []);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'CoverageTypeFetchAll']);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching coverage types: " . $e->getMessage(), 0, $e);
		}
	}
}