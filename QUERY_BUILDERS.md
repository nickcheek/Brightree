# Query Builders

This package now includes fluent query builders for the search-heavy Brightree services so you do not have to remember the SOAP method payload shape.

## Patient

```php
$patientService = $bt->Patient();

$patient = $patientService->find(141508);
$patientByPatientId = $patientService->find('PAT-10001');
$patientByExternalId = $patientService->findByExternalId('EXT-10001');
$patientsByName = $patientService->findByName('Smith', 'John');
$patientsByPhone = $patientService->findByPhone('(555) 123-4567');
$contacts = $patientService->findAdditionalContacts(141508);

$patients = $patientService->patientQuery()
    ->lastName('Smith')
    ->firstName('John')
    ->branch(12, 'Main Branch')
    ->sortBy('LastName')
    ->pageSize(25)
    ->page(1)
    ->get();

$phones = $patientService->patientPhoneQuery()
    ->fullName('John Smith')
    ->phoneNumber('(555) 123-4567')
    ->get();

$notes = $patientService->patientNoteQuery()
    ->patient(141508)
    ->status(2)
    ->createdBetween('2026-01-01T00:00:00', '2026-01-31T23:59:59')
    ->get();
```

Available builder entry points:

```php
patientQuery();
patientPhoneQuery();
patientNoteQuery();
```

## SalesOrder

```php
$salesOrders = $bt->SalesOrder()->salesOrderQuery()
    ->brightreeId(12345)
    ->branch(12, 'Main Branch')
    ->reference('REF-1001')
    ->sortBy('BrightreeID', 'Descending')
    ->pageSize(25)
    ->page(1)
    ->get();

$payors = $bt->SalesOrder()->salesOrderPayorQuery()
    ->soKey(12345)
    ->policyNumber('POL123')
    ->verified()
    ->get();

$voids = $bt->SalesOrder()->salesOrderVoidQuery()
    ->salesOrderBrightreeId(12345)
    ->voidReason(7, 'Duplicate')
    ->get();

$templates = $bt->SalesOrder()->salesOrderTemplateQuery()
    ->externalId('EXT-1001')
    ->lastRunHasError()
    ->patient(141508, 'John Smith')
    ->get();

$schedules = $bt->SalesOrder()->salesOrderTemplateScheduleQuery()
    ->soTemplateKey(123)
    ->description('Monthly')
    ->isDisabled(false)
    ->get();

$scheduleLogs = $bt->SalesOrder()->salesOrderTemplateScheduleLogQuery()
    ->soTemplateScheduleKey(999)
    ->errorMessage('Timeout')
    ->get();
```

Available builder entry points:

```php
salesOrderQuery();
salesOrderPayorQuery();
salesOrderVoidQuery();
salesOrderTemplateQuery();
salesOrderTemplateScheduleQuery();
salesOrderTemplateScheduleLogQuery();
```

## Doctor

```php
$doctors = $bt->Doctor()->doctorQuery()
    ->lastName('Smith')
    ->doctorGroup(10, 'Group A')
    ->phoneNumber('(555) 123-4567')
    ->get();
```

Available builder entry points:

```php
doctorQuery();
```

## Insurance

```php
$insurances = $bt->Insurance()->insuranceQuery()
    ->insuranceName('Acme Health')
    ->company(1, 'Acme')
    ->inactive(false)
    ->get();

$eligibilityPayers = $bt->Insurance()->commercialEligibilityPayerQuery()
    ->payerMnemonic('ABC')
    ->payerName('Acme Payer')
    ->get();

$commercialPayers = $bt->Insurance()->commercialPayerQuery()
    ->payerId('12345')
    ->payerName('Acme Commercial')
    ->get();

$priceTables = $bt->Insurance()->priceTableQuery()
    ->priceTableType('Retail')
    ->state('GA')
    ->get();
```

Available builder entry points:

```php
insuranceQuery();
commercialEligibilityPayerQuery();
commercialPayerQuery();
priceTableQuery();
```

## Document

```php
$documents = $bt->Document()->documentQuery()
    ->patientKey(12345)
    ->externalDocumentId('DOC-1')
    ->scannedDateBetween('2026-01-01T00:00:00', '2026-01-31T23:59:59')
    ->get();

$batches = $bt->Document()->documentBatchQuery()
    ->batchName('Import Batch')
    ->closed()
    ->batchOwnerBrightreeId(555)
    ->get();
```

Available builder entry points:

```php
documentQuery();
documentBatchQuery();
```
