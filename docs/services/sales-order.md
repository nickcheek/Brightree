# SalesOrder service

[Back to the main README](../../README.md)

Sales orders, sales order templates, schedules, WIP state, shipping and stop reasons.

| | |
|---|---|
| Accessor | `$bt->SalesOrder()` |
| Class | [`src/Service/SalesOrder.php`](../../src/Service/SalesOrder.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2408/OrderEntryService/SalesOrderService.svc` |
| API methods | 73 |

[Usage](#usage) · [Query builders](#query-builders) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$order = $bt->SalesOrder()->SalesOrderFetchByBrightreeID(['BrightreeID' => 12345]);
```

## Query builders

Fluent builders for the search methods. Chain filters, then call `->get()`. Every builder also has `where($field, $value)`, `whereMany([...])`, `sortBy($field, $order)`, `pageSize($n)`, `page($n)` and `toArray()`. See [QUERY_BUILDERS.md](../../QUERY_BUILDERS.md) for examples.

### `salesOrderQuery()`

Runs `SalesOrderSearch`. Class: [`SalesOrderSearchBuilder`](../../src/Search/SalesOrderSearchBuilder.php)

```php
brightreeId(int $id)
brightreeReferralId(int $id)
externalId(string $externalId)
poNumber(string $poNumber)
reference(string $reference)
fulfillmentAccountNumber(string $value)
branch(?int $id = null, ?string $value = null)
classification(?int $id = null, ?string $value = null)
createdBy(?int $id = null, ?string $value = null)
deliveryTechnician(?int $id = null, ?string $value = null)
dropShipStatus(?int $id = null, ?string $value = null)
facility(?int $id = null, ?string $value = null)
fulfillmentShipByVendor(?int $id = null, ?string $value = null)
fulfillmentVendor(?int $id = null, ?string $value = null)
patient(?int $id = null, ?string $value = null)
shippingStatus(?int $id = null, ?string $value = null)
wipAssignedTo(?int $id = null, ?string $value = null)
wipUserTaskReason(?int $id = null, ?string $value = null)
status($status)
type($type)
fulfillmentStatus($status)
excludeConfirmed(bool $value = true)
wipDaysInState(int $days)
actualDeliveryBetween(?string $start = null, ?string $end = null)
confirmedBetween(?string $start = null, ?string $end = null)
createdBetween(?string $start = null, ?string $end = null)
fulfillmentBetween(?string $start = null, ?string $end = null)
updatedBetween(?string $start = null, ?string $end = null)
printedBetween(?string $start = null, ?string $end = null)
scheduledDeliveryBetween(?string $start = null, ?string $end = null)
wipClosedBetween(?string $start = null, ?string $end = null)
wipCreatedBetween(?string $start = null, ?string $end = null)
wipNeedBetween(?string $start = null, ?string $end = null)
customField(int $fieldStorageNumber, string $value)
```

### `salesOrderPayorQuery()`

Runs `SalesOrderPayorSearch`. Class: [`SalesOrderPayorSearchBuilder`](../../src/Search/SalesOrderPayorSearchBuilder.php)

```php
soKey(int $value)
soPayorKey(int $value)
payorKey(int $value)
payorLevelKey(int $value)
policyNumber(string $value)
insuranceCompanyName(string $value)
insuranceCompanyPhone(string $value)
verified(bool $value = true)
between(?string $start = null, ?string $end = null)
```

### `salesOrderVoidQuery()`

Runs `SalesOrderVoidSearch`. Class: [`SalesOrderVoidSearchBuilder`](../../src/Search/SalesOrderVoidSearchBuilder.php)

```php
brightreeId(int $id)
salesOrderBrightreeId(int $id)
branch(?int $id = null, ?string $value = null)
deliveryTechnician(?int $id = null, ?string $value = null)
facility(?int $id = null, ?string $value = null)
patient(?int $id = null, ?string $value = null)
voidReason(?int $id = null, ?string $value = null)
voidedBy(?int $id = null, ?string $value = null)
reference(string $value)
type($value)
createdBetween(?string $start = null, ?string $end = null)
printedBetween(?string $start = null, ?string $end = null)
scheduledDeliveryBetween(?string $start = null, ?string $end = null)
voidedBetween(?string $start = null, ?string $end = null)
customField(int $fieldStorageNumber, string $value)
```

### `salesOrderTemplateQuery()`

Runs `SalesOrderTemplateSearch`. Class: [`SalesOrderTemplateSearchBuilder`](../../src/Search/SalesOrderTemplateSearchBuilder.php)

```php
brightreeId(int $id)
externalId(string $value)
reference(string $value)
branch(?int $id = null, ?string $value = null)
patient(?int $id = null, ?string $value = null)
status($value)
stopType($value)
type($value)
lastRunHasError(bool $value = true)
createdBetween(?string $start = null, ?string $end = null)
nextRunBetween(?string $start = null, ?string $end = null)
previousRunBetween(?string $start = null, ?string $end = null)
salesOrderCustomField(int $fieldStorageNumber, string $value)
templateCustomField(int $fieldStorageNumber, string $value)
```

### `salesOrderTemplateScheduleQuery()`

Runs `SalesOrderTemplateScheduleSearch`. Class: [`SalesOrderTemplateScheduleSearchBuilder`](../../src/Search/SalesOrderTemplateScheduleSearchBuilder.php)

```php
brightreeId(int $value)
soTemplateKey(int $value)
description(string $value)
billScheduleType($value)
monthFlags($value)
monthType(bool $value = true)
weekdayFlags($value)
isDisabled(bool $value = true)
endPeriod(int $value)
periodsRan(int $value)
timeInterval(int $value)
lastRunDate(string $value)
nextRunDate(string $value)
startDate(string $value)
lastRunBetween(?string $start = null, ?string $end = null)
nextRunBetween(?string $start = null, ?string $end = null)
startDateBetween(?string $start = null, ?string $end = null)
```

### `salesOrderTemplateScheduleLogQuery()`

Runs `SalesOrderTemplateScheduleLogSearch`. Class: [`SalesOrderTemplateScheduleLogSearchBuilder`](../../src/Search/SalesOrderTemplateScheduleLogSearchBuilder.php)

```php
brightreeId(int $value)
createdSoKey(int $value)
errorMessage(string $value)
runDate(string $value)
soTemplateKey(int $value)
soTemplateScheduleKey(int $value)
runDateBetween(?string $start = null, ?string $end = null)
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `BrightSHIPSalesOrderAck` | `array $request = []` | Your array, sent as is |
| `BrightShipSalesOrderFetch` | `array $request = []` | Your array, sent as is |
| `OrderImport` | `array $request = []` | Your array, sent as is |
| `SalesOrderAddDeliveryException` | `array $request = []` | Your array, sent as is |
| `SalesOrderAddMarketingReferral` | `array $request = []` | Your array, sent as is |
| `SalesOrderConfirm` | `array $request = []` | Your array, sent as is |
| `SalesOrderCreate` | `array $request = []` | Your array, sent as is |
| `SalesOrderEvaluateDropShip` | `array $request = []` | Your array, sent as is |
| `SalesOrderEvaluateDropShipWithAccountNumber` | `array $request = []` | Your array, sent as is |
| `SalesOrderFetchByBrightreeID` | `iterable $query` | Your array, sent as is. Must contain `BrightreeID` |
| `SalesOrderFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `SalesOrderFetchByPurchaseOrderID` | `array $request = []` | Your array, sent as is |
| `SalesOrderFetchPendingByShippingCarrierKey` | `array $request = []` | Your array, sent as is |
| `SalesOrderFetchReadyforShipping` | `array $request = []` | Your array, sent as is |
| `SalesOrderFulfillmentVendorsFetchAll` | none | Nothing |
| `SalesOrderItemAddDeliveryException` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemPriceOptionFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemReplaceGeneric` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemUpdateLotNumbers` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemUpdatePriceOption` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemUpdateSerialNumbers` | `array $request = []` | Your array, sent as is |
| `SalesOrderMessagesFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `SalesOrderOverrideValidationDetailMessage` | `array $request = []` | Your array, sent as is |
| `SalesOrderOverrideValidationHeaderMessage` | `array $request = []` | Your array, sent as is |
| `SalesOrderPayorSearch` | `array $request = []` | Your array, sent as is |
| `SalesOrderQuickAddItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderQuickAddItemWithItemsDataReturn` | `array $request = []` | Your array, sent as is |
| `SalesOrderQuickAddItemWithLinkedPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderRemoveItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderRemoveMarketingReferral` | `array $request = []` | Your array, sent as is |
| `SalesOrderSearch` | `array $request = []` | Your array, sent as is |
| `SalesOrderSendPOD` | `array $request = []` | Your array, sent as is |
| `SalesOrderSubmitDropShip` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateCreate` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateCreateSalesOrder` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateDelete` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemFrequencyFetchByBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `SalesOrderTemplateItemFrequencyUpdate` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemPriceOptionFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemUpdatePriceOption` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateQuickAddItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateRemoveItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateScheduleFetchBySOTemplateKey` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateScheduleLogSearch` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateScheduleSearch` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateScheduleUpdate` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateSearch` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdate` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdateInsurance` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdateItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdateItemPayor` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdateItemsWithDefaultPriceOption` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateUpdateWIPState` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdate` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateInsurance` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateItem` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateItemGeneric` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateItemNextBilling` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateItemPayor` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateItemsWithDefaultPriceOption` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdatePODStatus` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateTracking` | `array $request = []` | Your array, sent as is |
| `SalesOrderUpdateWIPState` | `array $request = []` | Your array, sent as is |
| `SalesOrderVoid` | `array $request = []` | Your array, sent as is |
| `SalesOrderVoidSearch` | `array $request = []` | Your array, sent as is |
| `SearchWIPStatusWithUpdate` | `array $request = []` | Your array, sent as is |
| `StopReasonFetchAll` | none | Nothing |
| `StopReasonSalesOrderFetchByBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `StopReasonSalesOrderTemplateFetchByBrightreeID` | `$BrightreeID` | `BrightreeID` |
| `StopReasonSalesOrderTemplateUpdate` | `array $request = []` | Your array, sent as is |
| `StopReasonSalesOrderUpdate` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->SalesOrder()->Custom('OperationName', ['Field' => 'value']);
```
