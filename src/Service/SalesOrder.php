<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Search\SalesOrderPayorSearchBuilder;
use Nickcheek\Brightree\Search\SalesOrderSearchBuilder;
use Nickcheek\Brightree\Search\SalesOrderTemplateScheduleLogSearchBuilder;
use Nickcheek\Brightree\Search\SalesOrderTemplateScheduleSearchBuilder;
use Nickcheek\Brightree\Search\SalesOrderTemplateSearchBuilder;
use Nickcheek\Brightree\Search\SalesOrderVoidSearchBuilder;

class SalesOrder extends BaseService
{
	protected array $methods = [
		'BrightSHIPSalesOrderAck' => true,
		'BrightShipSalesOrderFetch' => true,
		'OrderImport' => true,
		'SalesOrderAddDeliveryException' => true,
		'SalesOrderAddMarketingReferral' => true,
		'SalesOrderConfirm' => true,
		'SalesOrderCreate' => true,
		'SalesOrderEvaluateDropShip' => true,
		'SalesOrderEvaluateDropShipWithAccountNumber' => true,
		'SalesOrderFetchByBrightreeID' => true,
		'SalesOrderFetchByExternalID' => true,
		'SalesOrderFetchByPurchaseOrderID' => true,
		'SalesOrderFetchPendingByShippingCarrierKey' => true,
		'SalesOrderFetchReadyforShipping' => true,
		'SalesOrderFulfillmentVendorsFetchAll' => [],
		'SalesOrderItemAddDeliveryException' => true,
		'SalesOrderItemPriceOptionFetchByBrightreeID' => true,
		'SalesOrderItemReplaceGeneric' => true,
		'SalesOrderItemUpdateLotNumbers' => true,
		'SalesOrderItemUpdatePriceOption' => true,
		'SalesOrderItemUpdateSerialNumbers' => true,
		'SalesOrderMessagesFetchByBrightreeID' => true,
		'SalesOrderOverrideValidationDetailMessage' => true,
		'SalesOrderOverrideValidationHeaderMessage' => true,
		'SalesOrderPayorSearch' => true,
		'SalesOrderQuickAddItem' => true,
		'SalesOrderQuickAddItemWithItemsDataReturn' => true,
		'SalesOrderQuickAddItemWithLinkedPAR' => true,
		'SalesOrderRemoveItem' => true,
		'SalesOrderRemoveMarketingReferral' => true,
		'SalesOrderSearch' => true,
		'SalesOrderSendPOD' => true,
		'SalesOrderSubmitDropShip' => true,
		'SalesOrderTemplateCreate' => true,
		'SalesOrderTemplateCreateSalesOrder' => true,
		'SalesOrderTemplateDelete' => true,
		'SalesOrderTemplateFetchByBrightreeID' => true,
		'SalesOrderTemplateFetchByExternalID' => true,
		'SalesOrderTemplateItemFrequencyUpdate' => true,
		'SalesOrderTemplateItemPriceOptionFetchByBrightreeID' => true,
		'SalesOrderTemplateItemUpdatePriceOption' => true,
		'SalesOrderTemplateQuickAddItem' => true,
		'SalesOrderTemplateRemoveItem' => true,
		'SalesOrderTemplateScheduleFetchBySOTemplateKey' => true,
		'SalesOrderTemplateScheduleLogSearch' => true,
		'SalesOrderTemplateScheduleSearch' => true,
		'SalesOrderTemplateScheduleUpdate' => true,
		'SalesOrderTemplateSearch' => true,
		'SalesOrderTemplateUpdate' => true,
		'SalesOrderTemplateUpdateInsurance' => true,
		'SalesOrderTemplateUpdateItem' => true,
		'SalesOrderTemplateUpdateItemPayor' => true,
		'SalesOrderTemplateUpdateItemsWithDefaultPriceOption' => true,
		'SalesOrderTemplateUpdateWIPState' => true,
		'SalesOrderUpdate' => true,
		'SalesOrderUpdateInsurance' => true,
		'SalesOrderUpdateItem' => true,
		'SalesOrderUpdateItemGeneric' => true,
		'SalesOrderUpdateItemNextBilling' => true,
		'SalesOrderUpdateItemPayor' => true,
		'SalesOrderUpdateItemsWithDefaultPriceOption' => true,
		'SalesOrderUpdatePODStatus' => true,
		'SalesOrderUpdateTracking' => true,
		'SalesOrderUpdateWIPState' => true,
		'SalesOrderVoid' => true,
		'SalesOrderVoidSearch' => true,
		'SearchWIPStatusWithUpdate' => true,
		'StopReasonFetchAll' => [],
		'StopReasonSalesOrderTemplateUpdate' => true,
		'StopReasonSalesOrderUpdate' => true,
	];

	protected array $specialMethods = [
		'SalesOrderTemplateItemFrequencyFetchByBrightreeID' => ['BrightreeID'],
		'StopReasonSalesOrderFetchByBrightreeID' => ['BrightreeID'],
		'StopReasonSalesOrderTemplateFetchByBrightreeID' => ['BrightreeID']
	];

	public function salesOrderQuery(): SalesOrderSearchBuilder
	{
		return new SalesOrderSearchBuilder($this);
	}

	public function salesOrderPayorQuery(): SalesOrderPayorSearchBuilder
	{
		return new SalesOrderPayorSearchBuilder($this);
	}

	public function salesOrderVoidQuery(): SalesOrderVoidSearchBuilder
	{
		return new SalesOrderVoidSearchBuilder($this);
	}

	public function salesOrderTemplateQuery(): SalesOrderTemplateSearchBuilder
	{
		return new SalesOrderTemplateSearchBuilder($this);
	}

	public function salesOrderTemplateScheduleQuery(): SalesOrderTemplateScheduleSearchBuilder
	{
		return new SalesOrderTemplateScheduleSearchBuilder($this);
	}

	public function salesOrderTemplateScheduleLogQuery(): SalesOrderTemplateScheduleLogSearchBuilder
	{
		return new SalesOrderTemplateScheduleLogSearchBuilder($this);
	}

	public function SalesOrderFetchByBrightreeID(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("SalesOrderFetchByBrightreeID requires an iterable parameter", 1002);
			}

			if (!isset($query['BrightreeID'])) {
				throw new BrightreeException("BrightreeID is required for SalesOrderFetchByBrightreeID", 1003);
			}

			return $this->apiCall('SalesOrderFetchByBrightreeID', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'SalesOrderFetchByBrightreeID', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching sales order by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function SalesOrderTemplateItemFrequencyFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('SalesOrderTemplateItemFrequencyFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'SalesOrderTemplateItemFrequencyFetchByBrightreeID',
				'BrightreeID' => $BrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching sales order template item frequency: " . $e->getMessage(), 0, $e);
		}
	}

	public function StopReasonSalesOrderFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('StopReasonSalesOrderFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'StopReasonSalesOrderFetchByBrightreeID',
				'BrightreeID' => $BrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching stop reason sales order: " . $e->getMessage(), 0, $e);
		}
	}
}
