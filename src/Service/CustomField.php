<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class CustomField extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'CustomFieldValueSaveMultiple' => true
	];

	protected array $specialMethods = [
		'CustomFieldFetchAllByCategory' => ['category', 'includeInactive'],
		'CustomFieldValueFetchAllByBrightreeID' => ['brightreeID', 'category']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['custom'])) {
				throw BrightreeException::configError('Custom Field service URL not configured');
			}

			$this->wsdl = $this->info->config->service['custom'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['custom'],
				'location' => $this->info->config->service['custom'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize CustomField service: ' . $e->getMessage(), 0, $e);
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

			if (isset($this->specialMethods[$name])) {
				$params = [];
				foreach ($this->specialMethods[$name] as $index => $paramName) {
					if (!isset($arguments[$index])) {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index];
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