<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Pickup extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

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

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['pickup'])) {
				throw BrightreeException::configError('Pickup service URL not configured');
			}

			$this->wsdl = $this->info->config->service['pickup'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['pickup'],
				'location' => $this->info->config->service['pickup'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Pickup service: ' . $e->getMessage(), 0, $e);
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