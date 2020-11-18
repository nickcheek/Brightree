<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class SalesOrder extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['salesorder'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['salesorder'],'location' => $this->info->config->service['salesorder'],'trace' => 1);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function BrightSHIPSalesOrderAck(iterable $query): object
    {
    	return $this->apiCall('BrightSHIPSalesOrderAck',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function BrightShipSalesOrderFetch(iterable $query): object
    {
        return $this->apiCall('BrightShipSalesOrderFetch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function OrderImport(iterable $query): object
    {
        return $this->apiCall('OrderImport',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderAddDeliveryException(iterable $query): object
    {
        return $this->apiCall('SalesOrderAddDeliveryException',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderAddMarketingReferral(iterable $query): object
    {
        return $this->apiCall('SalesOrderAddMarketingReferral',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderConfirm(iterable $query): object
    {
        return $this->apiCall('SalesOrderConfirm',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderCreate(iterable $query): object
    {
        return $this->apiCall('SalesOrderCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('SalesOrderFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('SalesOrderFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderFetchByPurchaseOrderID(iterable $query): object
    {
        return $this->apiCall('SalesOrderFetchByPurchaseOrderID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderFetchPendingByShippingCarrierKey(iterable $query): object
    {
        return $this->apiCall('SalesOrderFetchPendingByShippingCarrierKey',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderFetchReadyforShipping(iterable $query): object
    {
        return $this->apiCall('SalesOrderFetchReadyforShipping',$query);
    }

    /**
     * @return object
     */
    public function SalesOrderFulfillmentVendorsFetchAll(): object
    {
        return $this->apiCall('SalesOrderFulfillmentVendorsFetchAll',[]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemAddDeliveryException(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemAddDeliveryException',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemPriceOptionFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemPriceOptionFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemReplaceGeneric(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemReplaceGeneric',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemUpdateLotNumbers(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemUpdateLotNumbers',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemUpdatePriceOption(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemUpdatePriceOption',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemUpdateSerialNumbers(iterable $query): object
    {
        return $this->apiCall('SalesOrderItemUpdateSerialNumbers',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderMessagesFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('SalesOrderMessagesFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderPayorSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderPayorSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderQuickAddItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderQuickAddItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderRemoveItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderRemoveItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderRemoveMarketingReferral(iterable $query): object
    {
        return $this->apiCall('SalesOrderRemoveMarketingReferral',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderSendPOD(iterable $query): object
    {
        return $this->apiCall('SalesOrderSendPOD',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateCreate(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateCreateSalesOrder(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateCreateSalesOrder',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateDelete(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateDelete',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */

    public function SalesOrderTemplateFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemPriceOptionFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateItemPriceOptionFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemUpdatePriceOption(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateItemUpdatePriceOption',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateQuickAddItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateQuickAddItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateRemoveItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateRemoveItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateScheduleFetchBySOTemplateKey(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleFetchBySOTemplateKey',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateScheduleLogSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleLogSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateScheduleSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateScheduleUpdate(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateUpdate(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateUpdateInsurance(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateInsurance',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateUpdateItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateUpdateItemsWithDefaultPriceOption(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItemsWithDefaultPriceOption',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateUpdateWIPState(iterable $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateWIPState',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdate(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateInsurance(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateInsurance',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateItem(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateItem',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateItemPayor(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateItemPayor',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateItemsWithDefaultPriceOption(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateItemsWithDefaultPriceOption',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdatePODStatus(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdatePODStatus',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateTracking(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateTracking',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderUpdateWIPState(iterable $query): object
    {
        return $this->apiCall('SalesOrderUpdateWIPState',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderVoid(iterable $query): object
    {
        return $this->apiCall('SalesOrderVoid',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderVoidSearch(iterable $query): object
    {
        return $this->apiCall('SalesOrderVoidSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SearchWIPStatusWithUpdate(iterable $query): object
    {
        return $this->apiCall('SearchWIPStatusWithUpdate',$query);
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function StopReasonSalesOrderFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('StopReasonSalesOrderFetchByBrightreeID', array('BrightreeID' => $BrightreeID));
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function StopReasonSalesOrderTemplateFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('StopReasonSalesOrderTemplateFetchByBrightreeID',array('BrightreeID'=> $BrightreeID));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function StopReasonSalesOrderTemplateUpdate(iterable $query): object
    {
        return $this->apiCall('StopReasonSalesOrderTemplateUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function StopReasonSalesOrderUpdate(iterable $query): object
    {
        return $this->apiCall('StopReasonSalesOrderUpdate',$query);
    }
}