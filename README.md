# Brightree API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)

PHP wrapper for the Brightree SOAP API. It covers 13 services and 401 API methods, with fluent query builders for the search-heavy ones.

- [Installation](#installation)
- [Quick start](#quick-start)
- [Services](#services)
- [How methods are called](#how-methods-are-called)
- [Query builders](#query-builders)
- [Error handling](#error-handling)
- [Custom calls](#custom-calls)
- [Examples](#examples)

## Installation

Requires PHP 7.4 or newer with the `soap` extension.

```bash
composer require nickcheek/brightree
```

## Quick start

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);

$patient = $bt->Patient()->PatientFetchByBrightreeID(141508);
```

Pick a service from the table below, then call any of its methods. Every call returns the response object from Brightree.

## Services

Each service has its own page listing every method, its arguments and the request fields it sends.

| Service | Accessor | Methods | Covers |
|---|---|---|---|
| [Patient](docs/services/patient.md) | `$bt->Patient()` | 52 | Patients, contacts, notes, payors, pharmacy data and opt-in status. |
| [SalesOrder](docs/services/sales-order.md) | `$bt->SalesOrder()` | 73 | Sales orders, sales order templates, schedules, WIP state, shipping and stop reasons. |
| [Doctor](docs/services/doctor.md) | `$bt->Doctor()` | 17 | Doctors, doctor notes, referral contacts, facilities and marketing reps. |
| [Insurance](docs/services/insurance.md) | `$bt->Insurance()` | 38 | Insurance records, carrier codes, span dates, payer search and price tables. |
| [Document](docs/services/document.md) | `$bt->Document()` | 10 | Document management: types, batches, search, storage and content. |
| [Documentation](docs/services/documentation.md) | `$bt->Documentation()` | 55 | CMNs, PARs and linking them to sales order items. |
| [Inventory](docs/services/inventory.md) | `$bt->Inventory()` | 31 | Items, locations, quantities, lots, serial numbers and item maintenance. |
| [Pickup](docs/services/pickup.md) | `$bt->Pickup()` | 21 | Pickup and exchange orders. |
| [Reference](docs/services/reference.md) | `$bt->Reference()` | 69 | Lookup data: branches, facilities, referral contacts, users, vendors and reason lists. |
| [Pricing](docs/services/pricing.md) | `$bt->Pricing()` | 11 | Prices, price details and price tables. |
| [Invoice](docs/services/invoice.md) | `$bt->Invoice()` | 8 | Invoices and open balances. |
| [CustomField](docs/services/custom-field.md) | `$bt->CustomField()` | 3 | Custom field definitions and values. |
| [Security](docs/services/security.md) | `$bt->Security()` | 13 | Users, user groups and permissions. |

## How methods are called

Methods are named after the Brightree SOAP operation they call. They come in three shapes, and each service page shows which shape a method uses.

**No arguments.** Mostly the `FetchAll` lookups.

```php
$branches = $bt->Reference()->BranchInfoFetchAll();
```

**Positional arguments.** The wrapper builds the request for you.

```php
$doctor = $bt->Doctor()->DoctorFetchByBrightreeID(123);
$fields = $bt->CustomField()->CustomFieldFetchAllByCategory('Patient', 1);
```

**A request array.** You pass the request as an array that matches the Brightree API definition, and it is sent as is.

```php
$order = $bt->SalesOrder()->SalesOrderFetchByBrightreeID(['BrightreeID' => 12345]);
```

## Query builders

The search methods on `Patient`, `SalesOrder`, `Doctor`, `Insurance` and `Document` have fluent builders, so you do not need to remember the request shape.

```php
$patients = $bt->Patient()->patientQuery()
    ->lastName('Smith')
    ->firstName('John')
    ->sortBy('LastName')
    ->pageSize(25)
    ->get();
```

See [QUERY_BUILDERS.md](QUERY_BUILDERS.md) for examples. The filters each builder supports are listed on its service page.

For searches without a builder, the client has a small helper that assembles the search, sort and paging arrays:

```php
$query = $bt->search(['SearchParams' => ['Branch' => ['ID' => 102]]])
    ->sort(['SortParams' => []])
    ->pageSize(50)
    ->pages(1)
    ->build();

$orders = $bt->SalesOrder()->SalesOrderSearch($query);
```

## Error handling

Failures are thrown as `Nickcheek\Brightree\Exceptions\BrightreeException`, including SOAP faults and invalid arguments.

```php
use Nickcheek\Brightree\Exceptions\BrightreeException;

try {
    $patient = $bt->Patient()->PatientFetchByBrightreeID(141508);
} catch (BrightreeException $e) {
    $e->getMessage();
    $e->getErrorData();   // SOAP fault detail, when there is one
    $e->getRequestData(); // the method and request that failed
}
```

`getRequestData()` holds the request that was sent, which can include patient information. Take care where you log it.

## Custom calls

Any operation on a service endpoint that the wrapper does not define can be called with `Custom()`:

```php
$patient = $bt->Patient()->Custom('PatientFetchByPatientID', ['PatientID' => $id]);
```

## Examples

Runnable scripts are in [examples/](examples).

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nick@nicholascheek.com.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
