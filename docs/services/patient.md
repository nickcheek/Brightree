# Patient service

[Back to the main README](../../README.md)

Patients, contacts, notes, payors, pharmacy data and opt-in status.

| | |
|---|---|
| Accessor | `$bt->Patient()` |
| Class | [`src/Service/Patient.php`](../../src/Service/Patient.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2410/OrderEntryService/patientservice.svc` |
| API methods | 52 |

[Usage](#usage) · [Shortcuts](#shortcuts) · [Query builders](#query-builders) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$patient = $bt->Patient()->PatientFetchByBrightreeID(141508);
```

## Shortcuts

Convenience methods that wrap the API methods below.

| Method | What it does |
|---|---|
| `find($identifier)` | Fetches a patient. A numeric value is treated as a Brightree ID, anything else as a Patient ID. |
| `findByExternalId(string $externalId)` | Fetches a patient by External ID. |
| `findByName(string $lastName, ?string $firstName = null, int $pageSize = 10, int $page = 1)` | Runs `PatientSearch` by last name and optional first name. |
| `findByPhone(string $phoneNumber, int $pageSize = 10, int $page = 1)` | Runs `PatientPhoneNumberSearch`. Formatting is stripped from the number. |
| `findAdditionalContacts($identifier)` | Fetches additional contacts. A numeric value is treated as a Brightree ID, anything else as a Patient ID. |

## Query builders

Fluent builders for the search methods. Chain filters, then call `->get()`. Every builder also has `where($field, $value)`, `whereMany([...])`, `sortBy($field, $order)`, `pageSize($n)`, `page($n)` and `toArray()`. See [QUERY_BUILDERS.md](../../QUERY_BUILDERS.md) for examples.

### `patientQuery()`

Runs `PatientSearch`. Class: [`PatientSearchBuilder`](../../src/Search/PatientSearchBuilder.php)

```php
brightreeId(int $id)
externalId(string $externalId)
firstName(string $firstName)
lastName(string $lastName)
accountNumber(string $accountNumber)
branch(?int $id = null, ?string $value = null)
accountGroup(?int $id = null, ?string $value = null)
masterFacility(?int $id = null, ?string $value = null)
deliveryPhone(string $phoneNumber)
deliveryFax(string $faxNumber)
ssn(string $ssn)
diabetic(bool $isDiabetic = true)
deceased(bool $isDeceased = true)
user1(string $value)
user2(string $value)
user3(string $value)
user4(string $value)
createdBetween(?string $start = null, ?string $end = null)
updatedBetween(?string $start = null, ?string $end = null)
dobBetween(?string $start = null, ?string $end = null)
customField(int $fieldStorageNumber, string $value)
```

### `patientPhoneQuery()`

Runs `PatientPhoneNumberSearch`. Class: [`PatientPhoneSearchBuilder`](../../src/Search/PatientPhoneSearchBuilder.php)

```php
brightreeId(int $id)
externalId(string $externalId)
fullName(string $fullName)
phoneNumber(string $phoneNumber)
phoneType($phoneType)
```

### `patientNoteQuery()`

Runs `PatientNoteSearch`. Class: [`PatientNoteSearchBuilder`](../../src/Search/PatientNoteSearchBuilder.php)

```php
patient(int $patientId)
patientNoteKey(int $patientNoteKey)
branch(int $branch)
assignedTo(int $userId)
createdBy(int $userId)
reason(int $reason)
status(int $status)
userDefined1(string $value)
userDefined2(string $value)
actualBetween(?string $start = null, ?string $end = null)
closedBetween(?string $start = null, ?string $end = null)
createdBetween(?string $start = null, ?string $end = null)
updatedBetween(?string $start = null, ?string $end = null)
needBetween(?string $start = null, ?string $end = null)
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `AdditionalPatientContactCreate` | `$additionalPatientContact` | `AdditionalPatientContact` |
| `AdditionalPatientContactFetchByBrightreeID` | `$patientBrightreeID` | `PatientBrightreeID` |
| `AdditionalPatientContactFetchByPatientID` | `$PatientID` | `PatientID` |
| `AdditionalPatientContactUpdate` | `$brightreePatientContactKey, $additionalPatientContact` | `BrightreePatientContactKey`, `AdditionalPatientContact` |
| `FacilityMasterInfoFetchAll` | none | Nothing |
| `FacilityResidentCreate` | `array $request = []` | Your array, sent as is |
| `FetchPatientOptInStatus` | `?int $brightreeId = null, ?string $patientPhone = null` | `brightreeId`, `patientPhone` |
| `FinancialNoteCreate` | `array $request = []` | Your array, sent as is |
| `FinancialNoteFetchByPatient` | `array $request = []` | Your array, sent as is |
| `FinancialNoteSearch` | `array $request = []` | Your array, sent as is |
| `FinancialNoteUpdate` | `array $request = []` | Your array, sent as is |
| `JustificationNoteCreate` | `array $request = []` | Your array, sent as is |
| `JustificationNoteFetchByPatient` | `array $request = []` | Your array, sent as is |
| `JustificationNoteSearch` | `array $request = []` | Your array, sent as is |
| `JustificationNoteUpdate` | `array $request = []` | Your array, sent as is |
| `PatientAddMarketingReferral` | `?int $btid = null, ?int $refid = null` | `BrightreeID`, `BrightreeReferralID` |
| `PatientCreate` | `array $request = []` | Your array, sent as is |
| `PatientFetchByBrightreeID` | `int $id` | `BrightreeID` |
| `PatientFetchByExternalID` | `$ExternalID` | `ExternalID` |
| `PatientFetchByPatientID` | `$PatientID` | `PatientID` |
| `PatientNoteCommentCreate` | `array $request = []` | Your array, sent as is |
| `PatientNoteCommentsFetch` | `array $request = []` | Your array, sent as is |
| `PatientNoteCommentUpdate` | `array $request = []` | Your array, sent as is |
| `PatientNoteCreate` | `array $request = []` | Your array, sent as is |
| `PatientNoteFetchByKey` | `$brightreeID` | `brightreeID` |
| `PatientNoteFetchByPatient` | `$brightreeID` | `brightreeID` |
| `PatientNoteReasonTemplateFetch` | `array $request = []` | Your array, sent as is |
| `PatientNoteSearch` | `array $request = []` | Your array, sent as is |
| `PatientNoteUpdate` | `array $request = []` | Your array, sent as is |
| `PatientPayorAdd` | `array $request = []` | Your array, sent as is |
| `PatientPayorFetch` | `array $request = []` | Your array, sent as is |
| `PatientPayorFetchAll` | `int $key` | `PatientKey` |
| `PatientPayorRemove` | `$brightreeID` | `brightreeID` |
| `PatientPayorUpdate` | `array $request = []` | Your array, sent as is |
| `PatientPhoneNumberSearch` | `array $request = []` | Your array, sent as is |
| `PatientRemoveMarketingReferral` | `$brightreeID` | `brightreeID` |
| `PatientSearch` | `array $request = []` | Your array, sent as is |
| `PatientUpdate` | `array $request = []` | Your array, sent as is |
| `PatientUpdateSleepTherapyPatientID` | `array $request = []` | Your array, sent as is |
| `PharmacyPatientClinicalInfoFetchByBrightreeID` | `array $request = []` | Your array, sent as is |
| `PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID` | `?int $patientid = null, ?int $brightreeid = null` | `BrightreeID`, `PatientBrightreeID` |
| `PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID` | `$PatientBrightreeID, $BrightreeID` | `PatientBrightreeID`, `BrightreeID` |
| `PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID` | `$brightreeID` | `brightreeID` |
| `PractitionerNoteCreate` | `array $request = []` | Your array, sent as is |
| `PractitionerNoteFetchByPatient` | `array $request = []` | Your array, sent as is |
| `PractitionerNoteSearch` | `array $request = []` | Your array, sent as is |
| `PractitionerNoteUpdate` | `array $request = []` | Your array, sent as is |
| `ProgressNoteCreate` | `array $request = []` | Your array, sent as is |
| `ProgressNoteFetchByPatient` | `array $request = []` | Your array, sent as is |
| `ProgressNoteSearch` | `array $request = []` | Your array, sent as is |
| `ProgressNoteUpdate` | `array $request = []` | Your array, sent as is |
| `UpdatePatientOptInStatus` | `$patientOptInStatus` | `patientOptInStatus` |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Patient()->Custom('OperationName', ['Field' => 'value']);
```
