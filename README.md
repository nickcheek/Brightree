# Brightree API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nickcheek/Brightree/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/build-status/master)

Brightree API Wrapper.  

## Installation

You can install the package via composer:

```bash
composer require nickcheek/brightree
```
## Setup

Add user/pass to the config file (src/config/config.php).

```bash
'name'=>'you@domain',
'pass'=>'yourpassword',
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

#### Usage
``` php
$bt = new Brightree\Brightree();
$note = $bt->Patient()->GetNoteByKey('141508');
return $note;
```

``` php
PatientCreate($patient);
PatientSearch($patient);
PatientUpdate($patient);
PatientFetchByExternalID($id);
PatientFetchByPatientID($id);
PatientFetchByBrightreeID($id);
PatientFetchByPatientID($id);
PatientPhoneNumberSearch($patient);
PatientNoteCreate($note);
PatientNoteFetchByKey($id);
PatientNoteFetchByPatient($id);
PatientNoteSearch($search);
PatientNoteUpdate($update);
GetNotesByPatient($id);
GetNoteByKey($NoteKey);
PatientPayorAdd($payor);
PatientPayorFetch($payor);
PatientPayorFetchAll($patientKey);
PatientPayorRemove($brightreeid);
PatientPayorUpdate($payor);
PatientAddMarketingReferral($brightreeid,$referralid);
PatientRemoveMarketingReferral($id);
FacilityMasterInfoFetchAll();
FacilityResidentCreate($resident);

```

### Available Document Management Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$document = $bt->Document()->DocumentTypesFetchAll();
return $document;
```

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
Use the [CUSTOM FIELD](ServicesGuide/CUSTOMFIELD.md) Readme to see available definitions.
#### Usage
``` php
$bt = new Brightree\Brightree();
//If you need to return the inactive records, pass the number 1 as the second variable
$cf = $bt->CustomField()->CustomFieldFetchAllByCategory('Patient');
return $cf;
```

``` php
CustomFieldFetchAllByCategory($category,$includeInactive);
CustomFieldValueFetchAllByBrightreeID($brightreeID,$category);
CustomFieldValueSaveMultiple($query);

```
### Available Doctor Methods
Use the [DOCTOR](ServicesGuide/DOCTOR.md) Readme to see available definitions.
#### Usage
``` php
$bt = new Brightree\Brightree();
$doctor = $bt->Doctor()->DoctorFetchByBrightreeID(123);
return $doctor;
```

``` php
AddDoctorReferralContact($doctorBrightreeID,$referralContactBrightreeID);
DoctorCreate($query);
DoctorFetchByBrightreeID($brightreeID);
DoctorFetchByExternalID($externalID);
DoctorGroupFetchAll();
DoctorReferralContactsFetchByDoctorKey($doctorBrightreeID);
DoctorSearch($query);
DoctorUpdate($query);
FacilityFetchAll();
FacilityGroupFetchAll();
MarketingRepFetchAll();
RemoveDoctorReferralContact($doctorBrightreeID,$referralContactBrightreeID);

```

### Available Insurance Methods
Use the [INSURANCE](ServicesGuide/INSURANCE.md) Readme to see available definitions.
#### Usage
``` php
$bt = new Brightree\Brightree();
$insurance = $bt->Insurance()->InsuranceFetchByBrightreeID(['BrightreeID'=>123]);
return $insurance;
```

``` php
InsuranceFetchByBrightreeID($BrightreeID);
InsuranceFetchByExternalID($ExternalID);
InsuranceSearch($query);
InsuranceUpdate($query);

```

### Available Inventory Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$inventory = $bt->Inventory()->ClaimNoteTypeFetchAll();
return $inventory;
```

``` php
ClaimNoteTypeFetchAll();
CoverageTypeFetchAll();
FetchItemLocations($query);
FetchItemQuantitiesAtLocation($query);
InventoryItemAddLots($query);
InventoryItemAddSerialNumbers($query);
InventoryItemAdjustment($query);
InventoryItemTransfer($query);
ItemAddToLocation($query);
ItemAddToLocations($query);
ItemCreate($query);
ItemFetchByBrightreeID($query);
ItemFetchByExternalID($query);
ItemFetchByItemID($query);
ItemFetchReplacementItemsByBrightreeID($query);
ItemFetchReplacementItemsByItemID($query);
ItemLocationsUpdate($query);
ItemLocationUpdate($query);
ItemSearch($query);
ItemUpdate($query);
KitTypeFetchAll();
NDCFetchAll();
StockingUOMFetchAll();
```
### Available Pickup/Exchange Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$params = array(
    'searchParams'=> array(
        'Branch'=> array(
            'ID' => '102'
        )
    ),
    'sortParams' => '',
    'pageSize' => '100',
    'page' => 1
);
$puex = $bt->Pickup()->PickupExchangeSearch($params);
return $puex;
```

``` php

PickupExchangeAddAllRentalItems($query);
PickupExchangeAddDeliveryException($query);
PickupExchangeAddPickupItem($query);
PickupExchangeCancelPOD($query);
PickupExchangeConfirm($query);
PickupExchangeCreate($query);
PickupExchangeDelete($query);
PickupExchangeFetchByBrightreeID($query);
PickupExchangeFetchByExternalID($query);
PickupExchangeItemAddDeliveryException($query);
PickupExchangeItemSpecifyExchangeItem($query);
PickupExchangeMessagesFetchByBrightreeID($query);
PickupExchangePayorSearch($query);
PickupExchangeRemoveItem($query);
PickupExchangeSearch($query);
PickupExchangeSendPOD($query);
PickupExchangeUpdate($query);
PickupExchangeUpdateItem($query);
PickupExchangeUpdatePODStatus($query);

```
### Available Reference Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$reference = $bt->Reference()->AccountGroupFetchAll();
return $reference;
```

``` php

AccountGroupFetchAll();
AddFacilityReferralContact($query);
BranchInfoFetchAll();
BranchInfoFetchByBrightreeID($query);
ClaimNoteTypeFetchAll();
ContactTypeCreate($query);
ContactTypeDelete($query);
ContactTypeFetchAll();
ContactTypeFetchByBrightreeID($query);
ContactTypeUpdate($query);
DelivryTechnicianFetchAll();
DepreciationTypesFetchAll();
EPSDTConditionCodeFetchAll();
FacilityCreate($query);
FacilityDelete($query);
FacilityFetchByBrightreeID($query);
FacilityFetchByExternalID($query);
FacilityInfoFetchAll();
FacilityReferralContactsFetchByFacilityKey($query);
FacilityUpdate($query);
FetchCurrentSecUser();
FunctionalAssessmentFetchAll();
GLAccountGroupsFetchAll();
ItemGroupFetchAll();
ItemManufacturerFetchAll();
ItemStatusFetchAll();
ItemTypesFetchAll();
LocationInfoFetchAll();
MarketingRepFetchAll();
MarketingRepFetchByBrightreeID($query);
MarketingRepFetchByExternalID($query);
MarketingRepUpdateExternalID($query);
MSPInsTypeFetchAll();
PatientNoteReasonFetchAll();
PlaceOfServiceFetchAll();
PolicyClaimCodeFetchAll();
PolicyTypeCodeFetchAll();
PractitionerInfoFetchAll();
ReferralContactCreate($query);
ReferralContactFetchByBrightreeID($query);
ReferralContactFetchByExternalID($query);
ReferralContactSearch($query);
ReferralContactUpdate($query);
ReferralFetchByBrightreeID($query);
ReferralSearch($query);
RemoveFacilityReferralContact($query);
SalesOrderClassificationFetchAll();
SalesOrderManualHoldReasonFetchAll();
SalesOrderVoidReasonFetchAll();
SalesTypesFetchAll();
SecUsersFetchAll();
ShippingCarriersFetchAll();
SiteInfoFetch($query);
TaxZoneFetchAll();
VendorFetchByBrightreeID($query);
VendorsFetchAll();
WIPStatesFetchAll();

```
### Available SalesOrder Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$salesorder = $bt->SalesOrder()->BrightSHIPSalesOrderAck(['soKey'=> 12345]);
return $salesorder;
```

``` php
BrightSHIPSalesOrderAck($query);
BrightShipSalesOrderFetch($query);
OrderImport($query);
SalesOrderAddDeliveryException($query); 
SalesOrderAddMarketingReferral($query);
SalesOrderConfirm($query);
SalesOrderCreate($query);
SalesOrderFetchByBrightreeID($query);
SalesOrderFetchByExternalID($query);
SalesOrderFetchByPurchaseOrderID($query);
SalesOrderFetchPendingByShippingCarrierKey($query);
SalesOrderFetchReadyforShipping($query);
SalesOrderFulfillmentVendorsFetchAll();
SalesOrderItemAddDeliveryException($query);
SalesOrderItemPriceOptionFetchByBrightreeID($query);
SalesOrderItemReplaceGeneric($query); 
SalesOrderItemUpdateLotNumbers($query); 
SalesOrderItemUpdatePriceOption($query); 
SalesOrderItemUpdateSerialNumbers($query);
SalesOrderMessagesFetchByBrightreeID($query);
SalesOrderPayorSearch($query);
SalesOrderQuickAddItem($query);
SalesOrderRemoveItem($query);
SalesOrderRemoveMarketingReferral($query); 
SalesOrderSearch($query); 
SalesOrderSendPOD($query); 
SalesOrderTemplateCreate($query);
SalesOrderTemplateCreateSalesOrder($query);
SalesOrderTemplateDelete($query); 
SalesOrderTemplateFetchByBrightreeID($query);
SalesOrderTemplateFetchByExternalID($query);
SalesOrderTemplateItemPriceOptionFetchByBrightreeID($query);
SalesOrderTemplateItemUpdatePriceOption($query);
SalesOrderTemplateQuickAddItem($query);
SalesOrderTemplateRemoveItem($query); 
SalesOrderTemplateScheduleFetchBySOTemplateKey($query);
SalesOrderTemplateScheduleLogSearch($query);
SalesOrderTemplateScheduleSearch($query);
SalesOrderTemplateScheduleUpdate($query);
SalesOrderTemplateSearch($query);
SalesOrderTemplateUpdate($query);
SalesOrderTemplateUpdateInsurance($query);
SalesOrderTemplateUpdateItem($query);
SalesOrderTemplateUpdateItemsWithDefaultPriceOption($query);
SalesOrderTemplateUpdateWIPState($query);
SalesOrderUpdate($query);
SalesOrderUpdateInsurance($query);
SalesOrderUpdateItem($query);
SalesOrderUpdateItemPayor($query);
SalesOrderUpdateItemsWithDefaultPriceOption($query);
SalesOrderUpdatePODStatus($query);
SalesOrderUpdateTracking($query);
SalesOrderUpdateWIPState($query);
SalesOrderVoid($query);
SalesOrderVoidSearch($query);
SearchWIPStatusWithUpdate($query);

```
### Available Documentation Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$documentation = $bt->Documentation()->CMNFetchByBrightreeID(['BrightreeID'=>12345]);
return $documentation;
```

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
### Available Pricing Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$pricing = $bt->Pricing()->NonTaxReasonFetchAll($query);
return $pricing;
```

```php
CMNFormFetchAll($query);
NonTaxReasonFetchAll($query);
PriceCreateItem($query);
PriceCreateStandard($query);
PriceDetailCreate($query);
PriceDetailFetchByBrightreeDetailID($query);
PriceDetailUpdate($query);
PriceFetch($query);
PriceOptionLetterTypeFetchAll($query);
PriceTableFetchAll($query);
```

### Available Security Methods

#### Usage
``` php
$bt = new Brightree\Brightree();
$security = $bt->Security()->UserFetchByBrightreeID($query);
return $security;
```

```php
UserFetchByBrightreeID($query);
UserSearch($query);
UserUpdate($query);
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
