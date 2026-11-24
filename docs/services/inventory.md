# Inventory service

[Back to the main README](../../README.md)

Items, locations, quantities, lots, serial numbers and item maintenance.

| | |
|---|---|
| Accessor | `$bt->Inventory()` |
| Class | [`src/Service/Inventory.php`](../../src/Service/Inventory.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2309/InventoryService/InventoryService.svc` |
| API methods | 31 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$item = $bt->Inventory()->ItemFetchByBrightreeID(['BrightreeID' => 12345]);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `ClaimNoteTypeFetchAll` | none | Nothing |
| `CoverageTypeFetchAll` | none | Nothing |
| `FetchItemLocations` | `array $request = []` | Your array, sent as is |
| `FetchItemQuantitiesAtLocation` | `array $request = []` | Your array, sent as is |
| `InventoryItemAddLots` | `array $request = []` | Your array, sent as is |
| `InventoryItemAddSerialNumbers` | `array $request = []` | Your array, sent as is |
| `InventoryItemAdjustment` | `array $request = []` | Your array, sent as is |
| `InventoryItemTransfer` | `array $request = []` | Your array, sent as is |
| `ItemAddToLocation` | `array $request = []` | Your array, sent as is |
| `ItemAddToLocations` | `array $request = []` | Your array, sent as is |
| `ItemCreate` | `array $request = []` | Your array, sent as is |
| `ItemFetchByBrightreeID` | `iterable $query` | Your array, sent as is. Must contain `BrightreeID` |
| `ItemFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `ItemFetchByItemID` | `array $request = []` | Your array, sent as is |
| `ItemFetchReplacementItemsByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ItemFetchReplacementItemsByItemID` | `array $request = []` | Your array, sent as is |
| `ItemLocationsUpdate` | `array $request = []` | Your array, sent as is |
| `ItemLocationUpdate` | `array $request = []` | Your array, sent as is |
| `ItemMaintenanceAddTracking` | `array $request = []` | Your array, sent as is |
| `ItemMaintenanceFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ItemMaintenanceNoteCreate` | `array $request = []` | Your array, sent as is |
| `ItemMaintenanceReasonFetchAll` | none | Nothing |
| `ItemMaintenanceUpdate` | `array $request = []` | Your array, sent as is |
| `ItemSearch` | `iterable $query` | Your array, sent as is |
| `ItemSearchWithDetails` | `array $request = []` | Your array, sent as is |
| `ItemUpdate` | `array $request = []` | Your array, sent as is |
| `KitTypeFetchAll` | none | Nothing |
| `LocationFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ManufacturerInfoFetchAll` | none | Nothing |
| `NDCFetchAll` | none | Nothing |
| `StockingUOMFetchAll` | none | Nothing |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Inventory()->Custom('OperationName', ['Field' => 'value']);
```
