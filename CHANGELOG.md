# Changelog

All notable changes to `brightree` will be documented in this file

## 1.0.0 - 2019-02-01

- initial release


## 1.0.1 - 2019-02-25

- added config file
- added Documentation Service
- added Insurance Service
- added Custom Field Service
- divided services up

## 1.0.2 - 2019-02-26

- added doctor service
- added inventory service
- updated readme

## 2.0.0 - 2019-10-02

- refactored to improve config
- Breaking changes from earlier versions.

## 2.1.0 - 2019-10-02

- refactored apiCall method
- Added Security Service.
- Added Pricing Service.

## 3.0.0 - 2019-12-09

- removed user/pass from config
- updated typecasts for php 7.4

## 3.1.0 - 2019-12-09

- Added arrayHelper Class
- Added Invoice API Class
- Changed Readme Docs

## 3.2.2 - 2020-07-23

- Updated API Definitions

## 3.3.0 - 2020-11-18

- Added Custom method to catch all non use cases

## 3.4.2 - 2021-09-14

- Added UserGroupPermissionsFetchByUserGroupBrightreeID, and UserGroupPermissionsUpdate to Security Service.
- Updated definition to latest definitions.
- Added SalesOrderOverrideValidationDetailMessage, SalesOrderOverrideValidationHeaderMessage to sales order service.
- Updated Readme

## 3.5.1 - 2022-04-19

- Added Document Propery Update to Document Management Service
- Added UserGroupCreate, UserGroupUpdate, UserGroupFetchByBrightreeID, and UserGroupFetchAll to Security Service
- Updated Readme

## 3.5.2 - 2023-07-19

- Added PharmacyPatientClinicalInfoFetchByBrightreeID to Patient Service
- Added PharmacyPatientLabResultsFetchByBrightreeIDAndPatientBrightreeID to Patient Service
- Added PharmacyPatientMedicationHistoryFetchByBrightreeIDAndPatientBrightreeID to Patient Service
- Added PharmacyPatientMostRecentLabResultsFetchByPatientBrightreeID to Patient Service

- Added the following fields to the insurance service:
- BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID
- BranchOfficeInsuranceUpdate
- BundleBillingRuleSetFetchAll
- ClaimFormFetchAll
- CommercialEligibilityPayerSearch
- CommercialPayerSearch
- CoverageLimitFetchAll
- CustomAppealFormFetchAll
- FetchPmtSubTypeByPmtTypeBrightreeID
- InsuranceCarrierCodeCreate
- InsuranceCarrierCodeUpdate
- InsuranceCompanyFetchAll
- InsuranceCreate
- InsuranceGroupFetchAll
- InsurancePlanTypeFetchAll
- InsurancePrintedFormsClaimFieldsFetch
- InsurancePrintedFormsPARFieldsFetch
- InsuranceSpanDateHoldInclusionCreate
- InsuranceSpanDateHoldInclusionDelete
- InsuranceSpanDateOverrideCreate
- InsuranceSpanDateOverrideDelete
- InsuranceSpanDateOverrideUpdate
- InsuranceValidationRuleSetCreate
- InsuranceValidationRuleSetDelete
- ItemGroupFetchAll
- ItemGroupFetchByInsuranceBrightreeID
- PARFormFetchAll
- Ping
- PriceTableSearch
- SpanDateSplit

- Added the following fields to the Doctor service:
- DoctorNoteCreate, DoctorNoteFetchByDoctor, DoctorNoteUpdate, DoctorNoteFetchByKey

- Added the following to SalesOrder service:
- SalesOrderTemplateItemFrequencyFetchByBrightreeID,SalesOrderTemplateItemFrequencyUpdate, SalesOrderUpdateItemNextBilling, StopReasonFetchAll