# Reference service

[Back to the main README](../../README.md)

Lookup data: branches, facilities, referral contacts, users, vendors and reason lists.

| | |
|---|---|
| Accessor | `$bt->Reference()` |
| Class | [`src/Service/Reference.php`](../../src/Service/Reference.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2409/ReferenceDataService/ReferenceDataService.svc` |
| API methods | 69 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$groups = $bt->Reference()->AccountGroupFetchAll();
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `AccountGroupFetchAll` | none | Nothing |
| `AddFacilityReferralContact` | `array $request = []` | Your array, sent as is |
| `BranchInfoFetchAll` | none | Nothing |
| `BranchInfoFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ClaimNoteTypeFetchAll` | none | Nothing |
| `ContactTypeCreate` | `array $request = []` | Your array, sent as is |
| `ContactTypeDelete` | `array $request = []` | Your array, sent as is |
| `ContactTypeFetchAll` | none | Nothing |
| `ContactTypeFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ContactTypeUpdate` | `array $request = []` | Your array, sent as is |
| `DelivryTechnicianFetchAll` | none | Nothing |
| `DepreciationTypesFetchAll` | none | Nothing |
| `DoctorNoteReasonFetchAll` | none | Nothing |
| `EPSDTConditionCodeFetchAll` | none | Nothing |
| `FacilityCreate` | `array $request = []` | Your array, sent as is |
| `FacilityDelete` | `array $request = []` | Your array, sent as is |
| `FacilityFetchByBrightreeID` | `iterable $query` | Your array, sent as is. Must contain `BrightreeID` |
| `FacilityFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `FacilityInfoFetchAll` | none | Nothing |
| `FacilityNoteCreate` | `array $request = []` | Your array, sent as is |
| `FacilityNoteFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `FacilityNoteFetchByFacility` | `array $request = []` | Your array, sent as is |
| `FacilityNoteReasonFetchAll` | none | Nothing |
| `FacilityNoteUpdate` | `array $request = []` | Your array, sent as is |
| `FacilityReferralContactsFetchByFacilityKey` | `array $request = []` | Your array, sent as is |
| `FacilityUpdate` | `array $request = []` | Your array, sent as is |
| `FetchCurrentSecUser` | none | Nothing |
| `FinancialNoteReasonFetchAll` | none | Nothing |
| `FunctionalAssessmentFetchAll` | none | Nothing |
| `GLAccountGroupsFetchAll` | none | Nothing |
| `ItemGroupFetchAll` | none | Nothing |
| `ItemManufacturerFetchAll` | none | Nothing |
| `ItemStatusFetchAll` | none | Nothing |
| `ItemTypesFetchAll` | none | Nothing |
| `JustificationNoteReasonFetchAll` | none | Nothing |
| `LocationInfoFetchAll` | none | Nothing |
| `MarketingRepFetchAll` | none | Nothing |
| `MarketingRepFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `MarketingRepFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `MarketingRepUpdateExternalID` | `array $request = []` | Your array, sent as is |
| `MSPInsTypeFetchAll` | none | Nothing |
| `PatientNoteReasonFetchAll` | none | Nothing |
| `PatientSecurityGroupFetchAll` | none | Nothing |
| `PickupExchangeReasonFetchAll` | none | Nothing |
| `PlaceOfServiceFetchAll` | none | Nothing |
| `PolicyClaimCodeFetchAll` | none | Nothing |
| `PolicyTypeCodeFetchAll` | none | Nothing |
| `PractitionerInfoFetchAll` | none | Nothing |
| `PractitionerNoteReasonFetchAll` | none | Nothing |
| `ProgressNoteReasonFetchAll` | none | Nothing |
| `ReferralContactCreate` | `array $request = []` | Your array, sent as is |
| `ReferralContactFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ReferralContactFetchByExternalID` | `array $request = []` | Your array, sent as is |
| `ReferralContactSearch` | `iterable $query` | Your array, sent as is |
| `ReferralContactUpdate` | `array $request = []` | Your array, sent as is |
| `ReferralFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `ReferralSearch` | `array $request = []` | Your array, sent as is |
| `RemoveFacilityReferralContact` | `array $request = []` | Your array, sent as is |
| `SalesOrderClassificationFetchAll` | none | Nothing |
| `SalesOrderManualHoldReasonFetchAll` | none | Nothing |
| `SalesOrderVoidReasonFetchAll` | none | Nothing |
| `SalesTypesFetchAll` | none | Nothing |
| `SecUsersFetchAll` | none | Nothing |
| `ShippingCarriersFetchAll` | none | Nothing |
| `SiteInfoFetch` | `array $request = []` | Your array, sent as is |
| `TaxZoneFetchAll` | none | Nothing |
| `VendorFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `VendorsFetchAll` | none | Nothing |
| `WIPStatesFetchAll` | none | Nothing |

> **Note:** `DelivryTechnicianFetchAll` is spelled this way in the code. `DeliveryTechnicianFetchAll` is not defined.

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Reference()->Custom('OperationName', ['Field' => 'value']);
```
