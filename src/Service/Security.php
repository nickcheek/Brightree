<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Security extends BaseService
{
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