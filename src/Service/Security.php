<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Security extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'UserCreate' => true,
		'UserSearch' => true,
		'UserUpdate' => true,
		'UserGroupCreate' => true,
		'UserGroupUpdate' => true,
		'UserGroupFetchByBrightreeID' => true,
		'UserGroupFetchAll' => true,
		'UserGroupPermissionsFetchByUserGroupBrightreeID' => true,
		'UserGroupPermissionsUpdate' => true
	];

	protected array $specialMethods = [
		'UserFetchByBrightreeID' => ['BrightreeID']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['security'])) {
				throw BrightreeException::configError('Security service URL not configured');
			}

			$this->wsdl = $this->info->config->service['security'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['security'],
				'location' => $this->info->config->service['security'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Security service: ' . $e->getMessage(), 0, $e);
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

	public function UserFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('UserFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'UserFetchByBrightreeID', 'BrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching user by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function UserCreate(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("UserCreate requires an iterable parameter", 1002);
			}

			return $this->apiCall('UserCreate', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'UserCreate', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating user: " . $e->getMessage(), 0, $e);
		}
	}

	public function UserGroupPermissionsUpdate(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("UserGroupPermissionsUpdate requires an iterable parameter", 1002);
			}

			return $this->apiCall('UserGroupPermissionsUpdate', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'UserGroupPermissionsUpdate', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error updating user group permissions: " . $e->getMessage(), 0, $e);
		}
	}
}