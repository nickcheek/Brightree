<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Insurance extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

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

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['insurance'])) {
				throw BrightreeException::configError('Insurance service URL not configured');
			}

			$this->wsdl = $this->info->config->service['insurance'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['insurance'],
				'location' => $this->info->config->service['insurance'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Insurance service: ' . $e->getMessage(), 0, $e);
		}
	}

	public function __call(string $name, array $arguments): object
	{
		try {
			if (isset($this->methods[$name])) {
				$params = $this->methods[$name] === true ? ($arguments[0] ?? []) : [];

				if ($this->methods[$name] === true && !is_iterable($params)) {
					throw new BrightreeException(sprintf("Method %s requires an iterable parameter", $name), 1002);
				}

				return $this->apiCall($name, $params);
			}

			if (isset($this->specialMethods[$name])) {
				$params = [];
				foreach ($this->specialMethods[$name] as $index => $paramName) {
					if (!isset($arguments[$index])) {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index];
				}
				return $this->apiCall($name, $params);
			}

			throw new \BadMethodCallException("Method $name does not exist");
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => $name, 'params' => $params ?? $arguments]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error calling $name: " . $e->getMessage(), 0, $e);
		}
	}

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