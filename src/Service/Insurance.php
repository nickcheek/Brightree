<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Insurance extends BaseService
{
	protected array $methods = [
		'InsuranceSearch' => true,
		'InsuranceUpdate' => true,
		'BranchOfficeInsuranceUpdate' => true,
		'BundleBillingRuleSetFetchAll' => [],
		'ClaimFormFetchAll' => [],
		'CommercialEligibilityPayerSearch' => true,
		'CommercialPayerSearch' => true,
		'CoverageLimitFetchAll' => [],
		'CustomAppealFormFetchAll' => [],
		'InsuranceCarrierCodeCreate' => true,
		'InsuranceCarrierCodeUpdate' => true,
		'InsuranceCompanyFetchAll' => [],
		'InsuranceCreate' => true,
		'InsuranceGroupFetchAll' => [],
		'InsurancePlanTypeFetchAll' => [],
		'InsurancePrintedFormsClaimFieldsFetch' => [],
		'InsurancePrintedFormsPARFieldsFetch' => [],
		'InsuranceSpanDateHoldInclusionCreate' => true,
		'InsuranceSpanDateOverrideCreate' => true,
		'InsuranceSpanDateOverrideUpdate' => true,
		'ItemGroupFetchAll' => [],
		'PARFormFetchAll' => [],
		'Ping' => [],
		'PriceTableSearch' => true,
		'SpanDateSplit' => true
	];

	protected array $specialMethods = [
		'InsuranceFetchByBrightreeID' => ['BrightreeID'],
		'InsuranceFetchByExternalID' => ['ExternalID'],
		'BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID' => ['BranchBrightreeID', 'InsuranceBrightreeID'],
		'FetchPmtSubTypeByPmtTypeBrightreeID' => ['PaymentTypeBrightreeID'],
		'InsuranceCarrierCodeDelete' => ['BrightreeID'],
		'InsuranceSpanDateHoldInclusionDelete' => ['BrightreeID'],
		'InsuranceSpanDateOverrideDelete' => ['BrightreeID'],
		'InsuranceValidationRuleSetCreate' => ['BranchBrightreeID', 'InsuranceBrightreeID'],
		'InsuranceValidationRuleSetDelete' => ['BrightreeID'],
		'ItemGroupFetchByInsuranceBrightreeID' => ['BrightreeID']
	];

	public function InsuranceFetchByBrightreeID(int $id): object
	{
		try {
			if ($id <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $id", 1003);
			}
			return $this->apiCall('InsuranceFetchByBrightreeID', ['BrightreeID' => $id]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'InsuranceFetchByBrightreeID', 'BrightreeID' => $id]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching insurance by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function InsuranceFetchByExternalID(int $id): object
	{
		try {
			if ($id <= 0) {
				throw new BrightreeException("Invalid External ID: $id", 1003);
			}
			return $this->apiCall('InsuranceFetchByExternalID', ['ExternalID' => $id]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'InsuranceFetchByExternalID', 'ExternalID' => $id]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching insurance by External ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID(?int $branchBrightreeID = null, ?int $insuranceBrightreeID = null): object
	{
		try {
			if ($branchBrightreeID === null) {
				throw new BrightreeException("BranchBrightreeID is required", 1003);
			}
			if ($insuranceBrightreeID === null) {
				throw new BrightreeException("InsuranceBrightreeID is required", 1003);
			}

			return $this->apiCall('BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID', [
				'BranchBrightreeID' => $branchBrightreeID,
				'InsuranceBrightreeID' => $insuranceBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID',
				'BranchBrightreeID' => $branchBrightreeID,
				'InsuranceBrightreeID' => $insuranceBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching branch office insurance: " . $e->getMessage(), 0, $e);
		}
	}

	public function InsuranceValidationRuleSetCreate(?int $validationRuleSetBrightreeID = null, ?int $insuranceBrightreeID = null): object
	{
		try {
			if ($validationRuleSetBrightreeID === null) {
				throw new BrightreeException("ValidationRuleSetBrightreeID is required", 1003);
			}
			if ($insuranceBrightreeID === null) {
				throw new BrightreeException("InsuranceBrightreeID is required", 1003);
			}

			return $this->apiCall('InsuranceValidationRuleSetCreate', [
				'ValidationRuleSetBrightreeID' => $validationRuleSetBrightreeID,
				'InsuranceBrightreeID' => $insuranceBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'InsuranceValidationRuleSetCreate',
				'ValidationRuleSetBrightreeID' => $validationRuleSetBrightreeID,
				'InsuranceBrightreeID' => $insuranceBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating insurance validation rule set: " . $e->getMessage(), 0, $e);
		}
	}
}