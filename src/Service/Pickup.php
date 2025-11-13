<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Pickup extends BaseService
{
	protected array $methods = [
		'PickupExchangeAddAllRentalItems' => true,
		'PickupExchangeAddDeliveryException' => true,
		'PickupExchangeAddPickupItem' => true,
		'PickupExchangeCancelPOD' => true,
		'PickupExchangeConfirm' => true,
		'PickupExchangeCreate' => true,
		'PickupExchangeDelete' => true,
		'PickupExchangeFetchByBrightreeID' => true,
		'PickupExchangeFetchByExternalID' => true,
		'PickupExchangeItemAddDeliveryException' => true,
		'PickupExchangeItemSpecifyExchangeItem' => true,
		'PickupExchangeMessagesFetchByBrightreeID' => true,
		'PickupExchangePayorSearch' => true,
		'PickupExchangeRemoveItem' => true,
		'PickupExchangeSearch' => true,
		'PickupExchangeSendPOD' => true,
		'PickupExchangeUpdate' => true,
		'PickupExchangeUpdateItem' => true,
		'PickupExchangeUpdatePODStatus' => true
	];

	public function PickupExchangeFetchByBrightreeID(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("PickupExchangeFetchByBrightreeID requires an iterable parameter", 1002);
			}

			if (!isset($query['BrightreeID'])) {
				throw new BrightreeException("BrightreeID is required for PickupExchangeFetchByBrightreeID", 1003);
			}

			return $this->apiCall('PickupExchangeFetchByBrightreeID', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PickupExchangeFetchByBrightreeID', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching pickup exchange by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function PickupExchangeCreate(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("PickupExchangeCreate requires an iterable parameter", 1002);
			}

			return $this->apiCall('PickupExchangeCreate', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PickupExchangeCreate', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating pickup exchange: " . $e->getMessage(), 0, $e);
		}
	}

	public function PickupExchangeSearch(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("PickupExchangeSearch requires an iterable parameter", 1002);
			}

			return $this->apiCall('PickupExchangeSearch', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PickupExchangeSearch', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error searching pickup exchanges: " . $e->getMessage(), 0, $e);
		}
	}
}