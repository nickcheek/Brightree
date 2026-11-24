# CustomField service

[Back to the main README](../../README.md)

Custom field definitions and values.

| | |
|---|---|
| Accessor | `$bt->CustomField()` |
| Class | [`src/Service/CustomField.php`](../../src/Service/CustomField.php) |
| Endpoint | `https://webservices.brightree.net/v0100-1610/CustomFieldService/CustomFieldService.svc` |
| API methods | 3 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
// Pass 1 as the second argument to include inactive fields
$fields = $bt->CustomField()->CustomFieldFetchAllByCategory('Patient', 1);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `CustomFieldFetchAllByCategory` | `string $category, int $includeInactive = 0` | `category`, `includeInactive` |
| `CustomFieldValueFetchAllByBrightreeID` | `int $id, string $category` | `brightreeID`, `category` |
| `CustomFieldValueSaveMultiple` | `iterable $query` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->CustomField()->Custom('OperationName', ['Field' => 'value']);
```
