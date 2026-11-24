# Invoice service

[Back to the main README](../../README.md)

Invoices and open balances.

| | |
|---|---|
| Accessor | `$bt->Invoice()` |
| Class | [`src/Service/Invoice.php`](../../src/Service/Invoice.php) |
| Endpoint | `https://webservices.brightree.net/v0100-2409/InvoiceService/InvoiceService.svc` |
| API methods | 8 |

[Usage](#usage) · [API methods](#api-methods)

## Usage

```php
use Nickcheek\Brightree\Brightree;

$bt = new Brightree($username, $password);
$invoice = $bt->Invoice()->InvoiceFetchByBrightreeID(12345);
```

## API methods

Each method maps to the Brightree SOAP operation of the same name and returns the response object. Where the request is "your array, sent as is", build it to match the Brightree API definition for that operation.

| Method | Arguments | Request fields sent |
|---|---|---|
| `InvoiceCreatePrintActivity` | `$BrightreeID` | `BrightreeID` |
| `InvoiceFetchByBrightreeID` | `int $BrightreeID` | `BrightreeID` |
| `InvoiceFetchByInvoiceID` | `int $InvoiceID` | `InvoiceID` |
| `InvoiceItemUpdate` | `array $request = []` | Your array, sent as is |
| `InvoiceUpdate` | `array $request = []` | Your array, sent as is |
| `OpenInvoiceAgedBalanceFetchByPatient` | `$PatientBrightreeID` | `PatientBrightreeID` |
| `OpenInvoiceBalanceFetchByPatient` | `int $BrightreeID` | `PatientBrightreeID` |
| `ResubmitInvoices` | `array $request = []` | Your array, sent as is |

## Anything not listed

Call any other operation on this endpoint with `Custom()`:

```php
$result = $bt->Invoice()->Custom('OperationName', ['Field' => 'value']);
```
