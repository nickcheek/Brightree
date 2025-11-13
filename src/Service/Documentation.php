<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Documentation extends BaseService
{
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