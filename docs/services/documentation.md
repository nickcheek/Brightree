# Documentation service

[Back to the main README](../../README.md)

CMNs, PARs and linking them to sales order items.

| | |
|---|---|
| Accessor | `$bt->Documentation()` |
| Class | [`src/Service/Documentation.php`](../../src/Service/Documentation.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2004/DocumentationService/DocumentationService.svc` |
| API methods | 55 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$cmn = $bt->Documentation()->CMNFetchByBrightreeID(['BrightreeID' => 12345]);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `CMNCreateFromPatient` | `array $request = []` | Your array, sent as is |
| `CMNDetailCreate` | `array $request = []` | Your array, sent as is |
| `CMNDetailDelete` | `array $request = []` | Your array, sent as is |
| `CMNDetailUpdate` | `array $request = []` | Your array, sent as is |
| `CMNFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `CMNFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `CMNFetchByPatientBrightreeID` | `array $request = []` | Your array, sent as is |
| `CMNFetchBySalesOrderBrightreeID` | `array $request = []` | Your array, sent as is |
| `CMNFrequencyFetchbyBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `CMNFrequencyUpdate` | `array $request = []` | Your array, sent as is |
| `CMNLog` | `array $request = []` | Your array, sent as is |
| `CMNPreview` | `array $request = []` | Your array, sent as is |
| `CMNPrint` | `array $request = []` | Your array, sent as is |
| `CMNQuestionAnswerConfiguration` | `array $request = []` | Your array, sent as is |
| `CMNReasonFetchAll` | `array $request = []` | Your array, sent as is |
| `CMNRenew` | `array $request = []` | Your array, sent as is |
| `CMNRevise` | `array $request = []` | Your array, sent as is |
| `CMNSearch` | `array $request = []` | Your array, sent as is |
| `CMNTaskCreate` | `array $request = []` | Your array, sent as is |
| `CMNTaskUpdate` | `array $request = []` | Your array, sent as is |
| `CMNUpdate` | `array $request = []` | Your array, sent as is |
| `PARAddPurchaseLimit` | `array $request = []` | Your array, sent as is |
| `PARCreateFromPatient` | `array $request = []` | Your array, sent as is |
| `PARDelete` | `array $request = []` | Your array, sent as is |
| `PARFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `PARFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `PARFetchByPatientBrightreeID` | `array $request = []` | Your array, sent as is |
| `PARFetchBySalesOrderBrightreeID` | `array $request = []` | Your array, sent as is |
| `PARFetchBySalesOrderTemplateBrightreeID` | `array $request = []` | Your array, sent as is |
| `PARLog` | `array $request = []` | Your array, sent as is |
| `PARRenew` | `array $request = []` | Your array, sent as is |
| `PARSearch` | `array $request = []` | Your array, sent as is |
| `PARTaskCreate` | `array $request = []` | Your array, sent as is |
| `PARTaskFetchByPARBrightreeID` | `int $PARBrightreeID` | `BrightreeID` |
| `PARTaskReasonFetchAll` | none | Nothing |
| `PARTaskUpdate` | `array $request = []` | Your array, sent as is |
| `PARUpdate` | `array $request = []` | Your array, sent as is |
| `PARUpdatePurchaseLimit` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemLinkCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemLinkNewCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemLinkToNewPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemLinkToPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsLinkCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsLinkNewCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsLinkToNewPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsLinkToPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsUnlinkCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemsUnlinkPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemUnlinkCMN` | `array $request = []` | Your array, sent as is |
| `SalesOrderItemUnlinkPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemLinkToPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemsLinkToPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemsUnlinkPAR` | `array $request = []` | Your array, sent as is |
| `SalesOrderTemplateItemUnlinkPAR` | `array $request = []` | Your array, sent as is |
| `SetParticipantComplianceDate` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Documentation()->Custom('OperationName', ['Field' => 'value']);
```
