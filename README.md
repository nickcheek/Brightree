# Brightree API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)

Brightree API Wrapper.  

## Installation

You can install the package via composer:

```bash
composer require nickcheek/brightree
```
## Laravel Setup

Add user/pass to ENV file.

```bash
BT_USER=you@domain
BT_Pass=yourpassword
```

Add Service Provider and Facade to config/app

``` php
Nickcheek\Brightree\BrighreeServiceProvider::class,
```
``` php
'Brightree' =>  Nickcheek\Brightree\Facades\Brightree::class
```

## Usage

Reference Class in your controller
``` php
use \Nickcheek\Brightree;
```

Create a new instance of the service and the API Call you're looking for, for instance, if you wanted to get a note by it's key
``` php
$bt = new Brightree\Brightree();
$note = $bt->Patient()->GetNoteByKey('141508');
return $note;
```
### Available Patient Methods

``` php
//patient
PatientCreate($patient);
PatientSearch($patient);
PatientUpdate($patient);
PatientFetchByExternalID($id);
PatientFetchByPatientID($id);
PatientFetchByBrightreeID($id);
PatientFetchByPatientID($id);
PatientPhoneNumberSearch($patient);

//notes
PatientNoteCreate($note);
PatientNoteFetchByKey($id);
PatientNoteFetchByPatient($id);
PatientNoteSearch($search);
PatientNoteUpdate($update);
GetNotesByPatient($id);
GetNoteByKey($NoteKey);

//payor
PatientPayorAdd($payor);
PatientPayorFetch($payor);
PatientPayorFetchAll($patientKey);
PatientPayorRemove($brightreeid);
PatientPayorUpdate($payor);

//other
PatientAddMarketingReferral($brightreeid,$referralid);
PatientRemoveMarketingReferral($id);
FacilityMasterInfoFetchAll();
FacilityResidentCreate($resident);

```

### Available Document Management Methods

``` php
DocumentTypesFetchAll();
DocumentBatchCreate($batch);
DocumentBatchSearch($search);
DocumentSearch($search);
FetchDocumentContent($key);
GenerateDocumentID($query);
StoreDocument($document);

```

### Available Custom Field Methods

``` php
CustomFieldFetchAllByCategory($query);
CustomFieldValueFetchAllByBrightreeID($query);
CustomFieldValueSaveMultiple($query);

```

### Available Insurance Methods

``` php
InsuranceFetchByBrightreeID($query);
InsuranceFetchByExternalID($query);
InsuranceSearch($query);
InsuranceUpdate($query);

```

### Available Documentation Methods

``` php
CMNCreateFromPatient($query);
CMNDetailCreate($query);
CMNDetailDelete($query);
CMNDetailUpdate($query);
CMNFetchByBrightreeID($query);
CMNFetchByExternalID($query);
CMNFetchByPatientBrightreeID($query);
CMNFetchBySalesOrderBrightreeID($query);
CMNLog($query);
CMNPreview($query);
CMNPrint($query);
CMNQuestionAnswerConfiguration($query);
CMNReasonFetchAll($query);
CMNRenew($query);
CMNRevise($query);
CMNSearch($query);
CMNTaskCreate($query);
CMNTaskUpdate($query);
CMNUpdate($query);
PARAddPurchaseLimit($query);
PARCreateFromPatient($query);
PARDelete($query);
PARFetchByBrightreeID($query);
PARFetchByExternalID($query);
PARFetchByPatientBrightreeID($query);
PARFetchBySalesOrderBrightreeID($query);
PARFetchBySalesOrderTemplateBrightreeID($query);
PARLog($query);
PARRenew($query);
PARSearch($query);
PARUpdate($query);
PARUpdatePurchaseLimit($query);
SalesOrderItemLinkCMN($query);
SalesOrderItemLinkNewCMN($query);
SalesOrderItemLinkToNewPAR($query);
SalesOrderItemLinkToPAR($query);
SalesOrderItemsLinkCMN($query);
SalesOrderItemsLinkNewCMN($query);
SalesOrderItemsLinkToNewPAR($query);
SalesOrderItemsLinkToPAR($query);
SalesOrderItemsUnlinkCMN($query);
SalesOrderItemsUnlinkPAR($query);
SalesOrderItemUnlinkCMN($query);
SalesOrderItemUnlinkPAR($query);
SalesOrderTemplateItemLinkToPAR($query);
SalesOrderTemplateItemsLinkToPAR($query);
SalesOrderTemplateItemsUnlinkPAR($query);
SalesOrderTemplateItemUnlinkPAR($query);
SetParticipantComplianceDate($query);

```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nick@nicholascheek.com.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
