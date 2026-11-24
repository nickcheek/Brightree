# Document service

[Back to the main README](../../README.md)

Document management: types, batches, search, storage and content.

| | |
|---|---|
| Accessor | `$bt->Document()` |
| Class | [`src/Service/Document.php`](../../src/Service/Document.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2108/DocumentationService/DocumentManagementService.svc` |
| API methods | 10 |

[Usage](#usage) · [Query builders](#query-builders) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$types = $bt->Document()->DocumentTypesFetchAll();
```

## Query builders

Fluent builders for the search methods. Chain filters, then call `->get()`. Every builder also has `where($field, $value)`, `whereMany([...])`, `sortBy($field, $order)`, `pageSize($n)`, `page($n)` and `toArray()`. See [QUERY_BUILDERS.md](../../QUERY_BUILDERS.md) for examples.

### `documentQuery()`

Runs `DocumentSearch`. Class: [`DocumentSearchBuilder`](../../src/Search/DocumentSearchBuilder.php)

```php
branchKey(int $value)
documentBatchKey(int $value)
documentReviewStatusKey(int $value)
documentTypeKey(int $value)
externalDocumentId(string $value)
patientAccountNumber(string $value)
patientExternalId(string $value)
patientId(int $value)
patientKey(int $value)
salesOrderKey(int $value)
documentDateBetween(?string $start = null, ?string $end = null)
scannedDateBetween(?string $start = null, ?string $end = null)
```

### `documentBatchQuery()`

Runs `DocumentBatchSearch`. Class: [`DocumentBatchSearchBuilder`](../../src/Search/DocumentBatchSearchBuilder.php)

```php
brightreeId(int $value)
batchDescription(string $value)
batchName(string $value)
batchOwnerBrightreeId(int $value)
batchOwnerFullName(string $value)
closed(bool $value = true)
createdDate(string $value)
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `DocumentBatchCreate` | `array $request = []` | Your array, sent as is |
| `DocumentBatchSearch` | `array $request = []` | Your array, sent as is |
| `DocumentPropertyUpdate` | `array $request = []` | Your array, sent as is |
| `DocumentReviewUpdate` | `array $request = []` | Your array, sent as is |
| `DocumentSearch` | `array $request = []` | Your array, sent as is |
| `DocumentTypesFetchAll` | none | Nothing |
| `FetchDocumentContent` | `int $key` | `documentKey` |
| `GenerateDocumentID` | `array $request = []` | Your array, sent as is |
| `StoreDocument` | `array $request = []` | Your array, sent as is |
| `StoreDocumentAndReturnInfo` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Document()->Custom('OperationName', ['Field' => 'value']);
```
