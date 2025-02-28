<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Inventory extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

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

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['inventory'])) {
				throw BrightreeException::configError('Inventory service URL not configured');
			}

			$this->wsdl = $this->info->config->service['inventory'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['inventory'],
				'location' => $this->info->config->service['inventory'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Inventory service: ' . $e->getMessage(), 0, $e);
		}
	}

	public function __call(string $name, array $arguments): object
	{
		try {
			if (isset($this->methods[$name])) {
				$params = $this->methods[$name] === true ? ($arguments[0] ?? []) : [];

				if ($this->methods[$name] === true && !is_iterable($params)) {
					throw new BrightreeException(sprintf("Method %s requires an iterable parameter", $name), 1002);
				}

				return $this->apiCall($name, $params);
			}

			throw new \BadMethodCallException("Method $name does not exist");
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => $name, 'params' => $params ?? $arguments]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error calling $name: " . $e->getMessage(), 0, $e);
		}
	}

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