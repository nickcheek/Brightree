# Brightree API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/brightree.svg?style=flat-square)](https://packagist.org/packages/nickcheek/brightree)
[![Build Status](https://img.shields.io/travis/nickcheek/brightree/master.svg?style=flat-square)](https://travis-ci.org/nickcheek/brightree)
[![Quality Score](https://img.shields.io/scrutinizer/g/nickcheek/brightree.svg?style=flat-square)](https://scrutinizer-ci.com/g/nickcheek/brightree)
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

Create a new instance and the API Call you're looking for, for instance, if you wanted to get a note by it's key
``` php
$bt = new Brightree\Brightree();
$note = $bt::GetNoteByKey('141508');

var_dump($note);
```
### Available Patient Methods

``` php
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
