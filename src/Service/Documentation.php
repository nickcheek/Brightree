<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Documentation extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'CMNCreateFromPatient' => true,
		'CMNDetailCreate' => true,
		'CMNDetailDelete' => true,
		'CMNDetailUpdate' => true,
		'CMNFetchByBrightreeID' => true,
		'CMNFetchByExternalID' => true,
		'CMNFetchByPatientBrightreeID' => true,
		'CMNFetchBySalesOrderBrightreeID' => true,
		'CMNFrequencyUpdate' => true,
		'CMNLog' => true,
		'CMNPreview' => true,
		'CMNPrint' => true,
		'CMNQuestionAnswerConfiguration' => true,
		'CMNReasonFetchAll' => true,
		'CMNRenew' => true,
		'CMNRevise' => true,
		'CMNSearch' => true,
		'CMNTaskCreate' => true,
		'CMNTaskUpdate' => true,
		'CMNUpdate' => true,
		'PARAddPurchaseLimit' => true,
		'PARCreateFromPatient' => true,
		'PARDelete' => true,
		'PARFetchByBrightreeID' => true,
		'PARFetchByExternalID' => true,
		'PARFetchByPatientBrightreeID' => true,
		'PARFetchBySalesOrderBrightreeID' => true,
		'PARFetchBySalesOrderTemplateBrightreeID' => true,
		'PARLog' => true,
		'PARRenew' => true,
		'PARSearch' => true,
		'PARTaskCreate' => true,
		'PARTaskUpdate' => true,
		'PARUpdate' => true,
		'PARUpdatePurchaseLimit' => true,
		'SalesOrderItemLinkCMN' => true,
		'SalesOrderItemLinkNewCMN' => true,
		'SalesOrderItemLinkToNewPAR' => true,
		'SalesOrderItemLinkToPAR' => true,
		'SalesOrderItemsLinkCMN' => true,
		'SalesOrderItemsLinkNewCMN' => true,
		'SalesOrderItemsLinkToNewPAR' => true,
		'SalesOrderItemsLinkToPAR' => true,
		'SalesOrderItemsUnlinkCMN' => true,
		'SalesOrderItemsUnlinkPAR' => true,
		'SalesOrderItemUnlinkCMN' => true,
		'SalesOrderItemUnlinkPAR' => true,
		'SalesOrderTemplateItemLinkToPAR' => true,
		'SalesOrderTemplateItemsLinkToPAR' => true,
		'SalesOrderTemplateItemsUnlinkPAR' => true,
		'SalesOrderTemplateItemUnlinkPAR' => true,
		'SetParticipantComplianceDate' => true,
		'PARTaskReasonFetchAll' => []
	];

	protected array $specialMethods = [
		'CMNFrequencyFetchbyBrightreeID' => ['BrightreeID'],
		'PARTaskFetchByPARBrightreeID' => ['BrightreeID']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['documentation'])) {
				throw BrightreeException::configError('Documentation service URL not configured');
			}

			$this->wsdl = $this->info->config->service['documentation'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['documentation'],
				'location' => $this->info->config->service['documentation'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Documentation service: ' . $e->getMessage(), 0, $e);
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

	public function CMNFrequencyFetchbyBrightreeID(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('CMNFrequencyFetchbyBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'CMNFrequencyFetchbyBrightreeID', 'BrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching CMN frequency: " . $e->getMessage(), 0, $e);
		}
	}

	public function PARTaskFetchByPARBrightreeID(int $PARBrightreeID): object
	{
		try {
			if ($PARBrightreeID <= 0) {
				throw new BrightreeException("Invalid PAR Brightree ID: $PARBrightreeID", 1003);
			}
			return $this->apiCall('PARTaskFetchByPARBrightreeID', ['BrightreeID' => $PARBrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PARTaskFetchByPARBrightreeID', 'BrightreeID' => $PARBrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching PAR task: " . $e->getMessage(), 0, $e);
		}
	}

	public function PARTaskReasonFetchAll(): object
	{
		try {
			return $this->apiCall('PARTaskReasonFetchAll', []);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'PARTaskReasonFetchAll']);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching PAR task reasons: " . $e->getMessage(), 0, $e);
		}
	}
}