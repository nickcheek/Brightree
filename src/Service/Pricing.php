<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Pricing extends BaseService
{
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