# Doctor service

[Back to the main README](../../README.md)

Doctors, doctor notes, referral contacts, facilities and marketing reps.

| | |
|---|---|
| Accessor | `$bt->Doctor()` |
| Class | [`src/Service/Doctor.php`](../../src/Service/Doctor.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2406/DoctorService/DoctorService.svc` |
| API methods | 17 |

[Usage](#usage) · [Query builders](#query-builders) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$doctor = $bt->Doctor()->DoctorFetchByBrightreeID(123);
```

## Query builders

Fluent builders for the search methods. Chain filters, then call `->get()`. Every builder also has `where($field, $value)`, `whereMany([...])`, `sortBy($field, $order)`, `pageSize($n)`, `page($n)` and `toArray()`. See [QUERY_BUILDERS.md](../../QUERY_BUILDERS.md) for examples.

### `doctorQuery()`

Runs `DoctorSearch`. Class: [`DoctorSearchBuilder`](../../src/Search/DoctorSearchBuilder.php)

```php
brightreeId(int $id)
externalId(string $externalId)
firstName(string $firstName)
lastName(string $lastName)
fullName(string $fullName)
deaNumber(string $value)
licenseNumber(string $value)
npi(string $value)
upin(string $value)
phoneNumber(string $value)
faxNumber(string $value)
address1(string $value)
address2(string $value)
city(string $value)
zipCode(string $value)
inactive(bool $value = true)
doctorGroup(?int $id = null, ?string $value = null)
facility(?int $id = null, ?string $value = null)
marketingRep(?int $id = null, ?string $value = null)
state(?int $id = null, ?string $value = null)
user1(string $value)
user2(string $value)
licenseExpirationBetween(?string $start = null, ?string $end = null)
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `AddDoctorReferralContact` | `int $DocBrightreeID, int $ReferralBrightreeID` | `DoctorBrightreeID`, `ReferralContactBrightreeID` |
| `CMNFaxScheduleFetchAll` | none | Nothing |
| `DoctorCreate` | `iterable $query` | Your array, sent as is |
| `DoctorFetchByBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `DoctorFetchByExternalID` | `$ExternalID` | `ExternalID` |
| `DoctorGroupFetchAll` | none | Nothing |
| `DoctorNoteCreate` | `array $request = []` | Your array, sent as is |
| `DoctorNoteFetchByDoctor` | `$brightreeID` | `brightreeID` |
| `DoctorNoteFetchByKey` | `$brightreeID` | `brightreeID` |
| `DoctorNoteUpdate` | `array $request = []` | Your array, sent as is |
| `DoctorReferralContactsFetchByDoctorKey` | `$DoctorBrightreeID` | `DoctorBrightreeID` |
| `DoctorSearch` | `array $request = []` | Your array, sent as is |
| `DoctorUpdate` | `array $request = []` | Your array, sent as is |
| `FacilityFetchAll` | none | Nothing |
| `FacilityGroupFetchAll` | none | Nothing |
| `MarketingRepFetchAll` | none | Nothing |
| `RemoveDoctorReferralContact` | `int $DocBrightreeID, int $ReferralBrightreeID` | `DoctorBrightreeID`, `ReferralContactBrightreeID` |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Doctor()->Custom('OperationName', ['Field' => 'value']);
```
