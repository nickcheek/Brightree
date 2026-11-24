# Insurance service

[Back to the main README](../../README.md)

Insurance records, carrier codes, span dates, payer search and price tables.

| | |
|---|---|
| Accessor | `$bt->Insurance()` |
| Class | [`src/Service/Insurance.php`](../../src/Service/Insurance.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2310/OrderEntryService/InsuranceService.svc` |
| API methods | 38 |

[Usage](#usage) · [Query builders](#query-builders) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$insurance = $bt->Insurance()->InsuranceFetchByBrightreeID(123);
```

## Query builders

Fluent builders for the search methods. Chain filters, then call `->get()`. Every builder also has `where($field, $value)`, `whereMany([...])`, `sortBy($field, $order)`, `pageSize($n)`, `page($n)` and `toArray()`. See [QUERY_BUILDERS.md](../../QUERY_BUILDERS.md) for examples.

### `insuranceQuery()`

Runs `InsuranceSearch`. Class: [`InsuranceSearchBuilder`](../../src/Search/InsuranceSearchBuilder.php)

```php
brightreeId(int $id)
insuranceId(int $id)
externalId(string $value)
insuranceName(string $value)
address(string $value)
city(string $value)
inactive(bool $value = true)
company(?int $id = null, ?string $value = null)
group(?int $id = null, ?string $value = null)
planType(?int $id = null, ?string $value = null)
priceTable(?int $id = null, ?string $value = null)
state(?int $id = null, ?string $value = null)
coverageType($value)
```

### `commercialEligibilityPayerQuery()`

Runs `CommercialEligibilityPayerSearch`. Class: [`CommercialEligibilityPayerSearchBuilder`](../../src/Search/CommercialEligibilityPayerSearchBuilder.php)

```php
brightreeId(int $id)
payerMnemonic(string $value)
payerName(string $value)
```

### `commercialPayerQuery()`

Runs `CommercialPayerSearch`. Class: [`CommercialPayerSearchBuilder`](../../src/Search/CommercialPayerSearchBuilder.php)

```php
payerId(string $value)
payerName(string $value)
lineOfBusinesses($value)
```

### `priceTableQuery()`

Runs `PriceTableSearch`. Class: [`PriceTableSearchBuilder`](../../src/Search/PriceTableSearchBuilder.php)

```php
priceTableType($value)
state(string $value)
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID` | `?int $branchBrightreeID = null, ?int $insuranceBrightreeID = null` | `BranchBrightreeID`, `InsuranceBrightreeID` |
| `BranchOfficeInsuranceUpdate` | `array $request = []` | Your array, sent as is |
| `BundleBillingRuleSetFetchAll` | none | Nothing |
| `ClaimFormFetchAll` | none | Nothing |
| `CommercialEligibilityPayerSearch` | `array $request = []` | Your array, sent as is |
| `CommercialPayerSearch` | `array $request = []` | Your array, sent as is |
| `CoverageLimitFetchAll` | none | Nothing |
| `CustomAppealFormFetchAll` | none | Nothing |
| `FetchPmtSubTypeByPmtTypeBrightreeID` | `$PaymentTypeBrightreeID` | `PaymentTypeBrightreeID` |
| `InsuranceCarrierCodeCreate` | `array $request = []` | Your array, sent as is |
| `InsuranceCarrierCodeDelete` | `$BrightreeID` | `BrightreeID` |
| `InsuranceCarrierCodeUpdate` | `array $request = []` | Your array, sent as is |
| `InsuranceCompanyFetchAll` | none | Nothing |
| `InsuranceCreate` | `array $request = []` | Your array, sent as is |
| `InsuranceFetchByBrightreeID` | `int $id` | `BrightreeID` |
| `InsuranceFetchByExternalID` | `string $id` | `ExternalID` |
| `InsuranceGroupFetchAll` | none | Nothing |
| `InsurancePlanTypeFetchAll` | none | Nothing |
| `InsurancePrintedFormsClaimFieldsFetch` | none | Nothing |
| `InsurancePrintedFormsPARFieldsFetch` | none | Nothing |
| `InsuranceSearch` | `array $request = []` | Your array, sent as is |
| `InsuranceSpanDateHoldInclusionCreate` | `array $request = []` | Your array, sent as is |
| `InsuranceSpanDateHoldInclusionDelete` | `$BrightreeID` | `BrightreeID` |
| `InsuranceSpanDateOverrideCreate` | `array $request = []` | Your array, sent as is |
| `InsuranceSpanDateOverrideDelete` | `$BrightreeID` | `BrightreeID` |
| `InsuranceSpanDateOverrideUpdate` | `array $request = []` | Your array, sent as is |
| `InsuranceUpdate` | `array $request = []` | Your array, sent as is |
| `InsuranceValidationRuleSetCreate` | `?int $validationRuleSetBrightreeID = null, ?int $insuranceBrightreeID = null` | `ValidationRuleSetBrightreeID`, `InsuranceBrightreeID` |
| `InsuranceValidationRuleSetDelete` | `$BrightreeID` | `BrightreeID` |
| `ItemGroupFetchAll` | none | Nothing |
| `ItemGroupFetchByInsuranceBrightreeID` | `$BrightreeID` | `BrightreeID` |
| `PARFormFetchAll` | none | Nothing |
| `Ping` | none | Nothing |
| `PriceTableFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `PriceTableSearch` | `array $request = []` | Your array, sent as is |
| `PriceTableUpdate` | `array $request = []` | Your array, sent as is |
| `SpanDateSplit` | `array $request = []` | Your array, sent as is |
| `SupplyAllowanceRuleSetFetchAll` | none | Nothing |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Insurance()->Custom('OperationName', ['Field' => 'value']);
```
