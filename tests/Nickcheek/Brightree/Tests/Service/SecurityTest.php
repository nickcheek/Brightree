<?php

namespace Nickcheek\Brightree\Tests\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Security;
use PHPUnit\Framework\TestCase;
use stdClass;

class SecurityTest extends TestCase
{
	private object $mockInfo;
	private Security $security;
	private object $mockApiResponse;

	protected function setUp(): void
	{
		$this->mockInfo = (object) [
			'username' => 'test_user',
			'password' => 'test_pass',
			'config' => (object) [
				'service' => [
					'security' => 'https://example.com/security'
				]
			]
		];

		$this->mockApiResponse = (object) ['success' => true];

		$this->security = $this->getMockBuilder(Security::class)
		                       ->setConstructorArgs([$this->mockInfo])
		                       ->onlyMethods(['apiCall'])
		                       ->getMock();
	}

	public function testUserFetchByBrightreeIDWithValidId()
	{
		$brightreeId = 12345;

		$this->security->expects($this->once())
		               ->method('apiCall')
		               ->with('UserFetchByBrightreeID', ['BrightreeID' => $brightreeId])
		               ->willReturn($this->mockApiResponse);

		$result = $this->security->UserFetchByBrightreeID($brightreeId);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUserFetchByBrightreeIDWithInvalidId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid Brightree ID: 0');

		$this->security->UserFetchByBrightreeID(0);
	}

	public function testUserGroupBDMPermissionsFetchByUserGroupBrightreeID()
	{
		$userGroupBrightreeID = 12345;

		$this->security->expects($this->once())
		               ->method('apiCall')
		               ->with('UserGroupBDMPermissionsFetchByUserGroupBrightreeID', [
			               'UserGroupBrightreeID' => $userGroupBrightreeID
		               ])
		               ->willReturn($this->mockApiResponse);

		$result = $this->security->UserGroupBDMPermissionsFetchByUserGroupBrightreeID($userGroupBrightreeID);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUserGroupBDMPermissionsFetchByUserGroupBrightreeIDWithInvalidId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid UserGroupBrightreeID: 0');

		$this->security->UserGroupBDMPermissionsFetchByUserGroupBrightreeID(0);
	}

	public function testUserGroupBDMPermissionsUpdateWithArrayPayload()
	{
		$userGroupBrightreeID = 12345;
		$payload = [
			'BDMDocumentTypes' => [
				['BrightreeID' => 1, 'Enabled' => true]
			]
		];

		$this->security->expects($this->once())
		               ->method('apiCall')
		               ->with('UserGroupBDMPermissionsUpdate', [
			               'UserGroupBrightreeID' => $userGroupBrightreeID,
			               'UserGroupBDMPermissions' => $payload
		               ])
		               ->willReturn($this->mockApiResponse);

		$result = $this->security->UserGroupBDMPermissionsUpdate($userGroupBrightreeID, $payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUserGroupBDMPermissionsUpdateWithObjectPayload()
	{
		$userGroupBrightreeID = 12345;
		$payload = new stdClass();
		$payload->BDMDocumentTypes = [
			(object) ['BrightreeID' => 1, 'Enabled' => true]
		];

		$this->security->expects($this->once())
		               ->method('apiCall')
		               ->with('UserGroupBDMPermissionsUpdate', [
			               'UserGroupBrightreeID' => $userGroupBrightreeID,
			               'UserGroupBDMPermissions' => $payload
		               ])
		               ->willReturn($this->mockApiResponse);

		$result = $this->security->UserGroupBDMPermissionsUpdate($userGroupBrightreeID, $payload);
		$this->assertSame($this->mockApiResponse, $result);
	}

	public function testUserGroupBDMPermissionsUpdateWithInvalidGroupId()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('Invalid UserGroupBrightreeID: 0');

		$this->security->UserGroupBDMPermissionsUpdate(0, []);
	}

	public function testUserGroupBDMPermissionsUpdateWithInvalidPayload()
	{
		$this->expectException(BrightreeException::class);
		$this->expectExceptionMessage('UserGroupBDMPermissions must be provided as an array or object');

		$this->security->UserGroupBDMPermissionsUpdate(12345, 'invalid');
	}
}
