<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Pricing extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'CMNFormFetchAll' => true,
		'NonTaxReasonFetchAll' => true,
		'PriceCreateItem' => true,
		'PriceCreateStandard' => true,
		'PriceDetailCreate' => true,
		'PriceDetailFetchByBrightreeDetailID' => true,
		'PriceDetailUpdate' => true,
		'PriceFetch' => true,
		'PriceOptionLetterTypeFetchAll' => true,
		'PriceTableFetchAll' => true,
		'Ping' => []
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['pricing'])) {
				throw BrightreeException::configError('Pricing service URL not configured');
			}

			$this->wsdl = $this->info->config->service['pricing'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['pricing'],
				'location' => $this->info->config->service['pricing'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Pricing service: ' . $e->getMessage(), 0, $e);
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

	public function PriceCreateItem(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("PriceCreateItem requires an iterable parameter", 1002);
			}

			return $this->apiCall('PriceCreateItem', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PriceCreateItem', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating price item: " . $e->getMessage(), 0, $e);
		}
	}

	public function PriceDetailFetchByBrightreeDetailID(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("PriceDetailFetchByBrightreeDetailID requires an iterable parameter", 1002);
			}

			if (!isset($query['BrightreeDetailID'])) {
				throw new BrightreeException("BrightreeDetailID is required for PriceDetailFetchByBrightreeDetailID", 1003);
			}

			return $this->apiCall('PriceDetailFetchByBrightreeDetailID', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PriceDetailFetchByBrightreeDetailID', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching price detail: " . $e->getMessage(), 0, $e);
		}
	}

	public function Ping(): object
	{
		try {
			return $this->apiCall('Ping', []);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'Ping']);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error pinging service: " . $e->getMessage(), 0, $e);
		}
	}
}