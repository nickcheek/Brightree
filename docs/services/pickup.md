# Pickup service

[Back to the main README](../../README.md)

Pickup and exchange orders.

| | |
|---|---|
| Accessor | `$bt->Pickup()` |
| Class | [`src/Service/Pickup.php`](../../src/Service/Pickup.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2007/OrderEntryService/PickupExchangeService.svc` |
| API methods | 21 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$results = $bt->Pickup()->PickupExchangeSearch([
    'searchParams' => ['Branch' => ['ID' => '102']],
    'sortParams' => '',
    'pageSize' => '100',
    'page' => 1,
]);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `PickupExchangeAddAllRentalItems` | `array $request = []` | Your array, sent as is |
| `PickupExchangeAddDeliveryException` | `array $request = []` | Your array, sent as is |
| `PickupExchangeAddPickupItem` | `array $request = []` | Your array, sent as is |
| `PickupExchangeCancelPOD` | `array $request = []` | Your array, sent as is |
| `PickupExchangeConfirm` | `array $request = []` | Your array, sent as is |
| `PickupExchangeCreate` | `iterable $query` | Your array, sent as is |
| `PickupExchangeDelete` | `array $request = []` | Your array, sent as is |
| `PickupExchangeFetchByBrightreeID` | `iterable $query` | Your array, sent as is. Must contain `BrightreeID` |
| `PickupExchangeFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `PickupExchangeItemAddDeliveryException` | `array $request = []` | Your array, sent as is |
| `PickupExchangeItemSpecifyExchangeItem` | `array $request = []` | Your array, sent as is |
| `PickupExchangeMessagesFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `PickupExchangePayorSearch` | `array $request = []` | Your array, sent as is |
| `PickupExchangeRemoveItem` | `array $request = []` | Your array, sent as is |
| `PickupExchangeSearch` | `iterable $query` | Your array, sent as is |
| `PickupExchangeSendPOD` | `array $request = []` | Your array, sent as is |
| `PickupExchangeUpdate` | `array $request = []` | Your array, sent as is |
| `PickupExchangeUpdateItem` | `array $request = []` | Your array, sent as is |
| `PickupExchangeUpdatePODStatus` | `array $request = []` | Your array, sent as is |
| `PickupExchangeUpdateWIPInfoFromTemplate` | `array $request = []` | Your array, sent as is |
| `PickupExchangeWIPStatesFetchAll` | none | Nothing |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Pickup()->Custom('OperationName', ['Field' => 'value']);
```
