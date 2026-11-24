# Pricing service

[Back to the main README](../../README.md)

Prices, price details and price tables.

| | |
|---|---|
| Accessor | `$bt->Pricing()` |
| Class | [`src/Service/Pricing.php`](../../src/Service/Pricing.php) |
| Endpoint | `https://webservices.brightree.net/v0100-1908/InventoryService/PricingService.svc` |
| API methods | 11 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$tables = $bt->Pricing()->PriceTableFetchAll();
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `CMNFormFetchAll` | `array $request = []` | Your array, sent as is |
| `NonTaxReasonFetchAll` | `array $request = []` | Your array, sent as is |
| `Ping` | none | Nothing |
| `PriceCreateItem` | `iterable $query` | Your array, sent as is |
| `PriceCreateStandard` | `array $request = []` | Your array, sent as is |
| `PriceDetailCreate` | `array $request = []` | Your array, sent as is |
| `PriceDetailFetchByBrightreeDetailID` | `iterable $query` | Your array, sent as is. Must contain `BrightreeDetailID` |
| `PriceDetailUpdate` | `array $request = []` | Your array, sent as is |
| `PriceFetch` | `array $request = []` | Your array, sent as is |
| `PriceOptionLetterTypeFetchAll` | `array $request = []` | Your array, sent as is |
| `PriceTableFetchAll` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Pricing()->Custom('OperationName', ['Field' => 'value']);
```
