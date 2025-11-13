<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class CustomField extends BaseService
{
	protected array $methods = [
		'CustomFieldValueSaveMultiple' => true
	];

	protected array $specialMethods = [
		'CustomFieldFetchAllByCategory' => ['category', 'includeInactive'],
		'CustomFieldValueFetchAllByBrightreeID' => ['brightreeID', 'category']
	];

	protected function getServiceName(): string
	{
		return 'custom';
	}

	public function CustomFieldFetchAllByCategory(string $category, int $includeInactive = 0): object
	{
		try {
			return $this->apiCall('CustomFieldFetchAllByCategory', [
				'category' => $category,
				'includeInactive' => $includeInactive
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'CustomFieldFetchAllByCategory',
				'category' => $category,
				'includeInactive' => $includeInactive
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching custom fields by category: " . $e->getMessage(), 0, $e);
		}
	}

	public function CustomFieldValueFetchAllByBrightreeID(int $id, string $category): object
	{
		try {
			return $this->apiCall('CustomFieldValueFetchAllByBrightreeID', [
				'brightreeID' => $id,
				'category' => $category
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'CustomFieldValueFetchAllByBrightreeID',
				'brightreeID' => $id,
				'category' => $category
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching custom field values by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function CustomFieldValueSaveMultiple(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("CustomFieldValueSaveMultiple requires an iterable parameter", 1002);
			}
			return $this->apiCall('CustomFieldValueSaveMultiple', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'CustomFieldValueSaveMultiple', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error saving custom field values: " . $e->getMessage(), 0, $e);
		}
	}
}