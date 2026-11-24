# Security service

[Back to the main README](../../README.md)

Users, user groups and permissions.

| | |
|---|---|
| Accessor | `$bt->Security()` |
| Class | [`src/Service/Security.php`](../../src/Service/Security.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2407/SecurityService/UserSecurityService.svc` |
| API methods | 13 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$user = $bt->Security()->UserFetchByBrightreeID(123);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `Ping` | none | Nothing |
| `UserCreate` | `iterable $query` | Your array, sent as is |
| `UserFetchByBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `UserGroupBDMPermissionsFetchByUserGroupBrightreeID` | `int $userGroupBrightreeID` | `UserGroupBrightreeID` |
| `UserGroupBDMPermissionsUpdate` | `int $userGroupBrightreeID, $userGroupBDMPermissions` | `UserGroupBrightreeID`, `UserGroupBDMPermissions` |
| `UserGroupCreate` | `array $request = []` | Your array, sent as is |
| `UserGroupFetchAll` | `array $request = []` | Your array, sent as is |
| `UserGroupFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `UserGroupPermissionsFetchByUserGroupBrightreeID` | `array $request = []` | Your array, sent as is |
| `UserGroupPermissionsUpdate` | `iterable $query` | Your array, sent as is |
| `UserGroupUpdate` | `array $request = []` | Your array, sent as is |
| `UserSearch` | `array $request = []` | Your array, sent as is |
| `UserUpdate` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Security()->Custom('OperationName', ['Field' => 'value']);
```
