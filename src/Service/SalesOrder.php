<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class SalesOrder extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
	
	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['salesorder'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['salesorder'],'location' => $this->info->config->service['salesorder'],'trace' => 1);
	}

    /**
     * @param array $query
     * @return object
     */
	public function BrightSHIPSalesOrderAck(array $query): object
    {
    	return $this->apiCall('BrightSHIPSalesOrderAck',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function BrightShipSalesOrderFetch(array $query): object
    {
        return $this->apiCall('BrightShipSalesOrderFetch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function OrderImport(array $query): object
    {
        return $this->apiCall('OrderImport',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderAddDeliveryException(array $query): object
    {
        return $this->apiCall('SalesOrderAddDeliveryException',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderAddMarketingReferral(array $query): object
    {
        return $this->apiCall('SalesOrderAddMarketingReferral',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderConfirm(array $query): object
    {
        return $this->apiCall('SalesOrderConfirm',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderCreate(array $query): object
    {
        return $this->apiCall('SalesOrderCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('SalesOrderFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderFetchByExternalID(array $query): object
    {
        return $this->apiCall('SalesOrderFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderFetchByPurchaseOrderID(array $query): object
    {
        return $this->apiCall('SalesOrderFetchByPurchaseOrderID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderFetchPendingByShippingCarrierKey(array $query): object
    {
        return $this->apiCall('SalesOrderFetchPendingByShippingCarrierKey',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderFetchReadyforShipping(array $query): object
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
     * @param array $query
     * @return object
     */
    public function SalesOrderItemAddDeliveryException(array $query): object
    {
        return $this->apiCall('SalesOrderItemAddDeliveryException',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemPriceOptionFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('SalesOrderItemPriceOptionFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemReplaceGeneric(array $query): object
    {
        return $this->apiCall('SalesOrderItemReplaceGeneric',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemUpdateLotNumbers(array $query): object
    {
        return $this->apiCall('SalesOrderItemUpdateLotNumbers',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemUpdatePriceOption(array $query): object
    {
        return $this->apiCall('SalesOrderItemUpdatePriceOption',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemUpdateSerialNumbers(array $query): object
    {
        return $this->apiCall('SalesOrderItemUpdateSerialNumbers',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderMessagesFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('SalesOrderMessagesFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderPayorSearch(array $query): object
    {
        return $this->apiCall('SalesOrderPayorSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderQuickAddItem(array $query): object
    {
        return $this->apiCall('SalesOrderQuickAddItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderRemoveItem(array $query): object
    {
        return $this->apiCall('SalesOrderRemoveItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderRemoveMarketingReferral(array $query): object
    {
        return $this->apiCall('SalesOrderRemoveMarketingReferral',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderSearch(array $query): object
    {
        return $this->apiCall('SalesOrderSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderSendPOD(array $query): object
    {
        return $this->apiCall('SalesOrderSendPOD',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateCreate(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateCreateSalesOrder(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateCreateSalesOrder',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateDelete(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateDelete',$query);
    }

    /**
     * @param array $query
     * @return object
     */

    public function SalesOrderTemplateFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateFetchByExternalID(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemPriceOptionFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateItemPriceOptionFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemUpdatePriceOption(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateItemUpdatePriceOption',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateQuickAddItem(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateQuickAddItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateRemoveItem(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateRemoveItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateScheduleFetchBySOTemplateKey(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleFetchBySOTemplateKey',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateScheduleLogSearch(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleLogSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateScheduleSearch(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateScheduleUpdate(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateSearch(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateUpdate(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateUpdateInsurance(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateInsurance',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateUpdateItem(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateUpdateItemsWithDefaultPriceOption(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItemsWithDefaultPriceOption',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateUpdateWIPState(array $query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateWIPState',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdate(array $query): object
    {
        return $this->apiCall('SalesOrderUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateInsurance(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateInsurance',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateItem(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateItem',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateItemPayor(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateItemPayor',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateItemsWithDefaultPriceOption(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateItemsWithDefaultPriceOption',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdatePODStatus(array $query): object
    {
        return $this->apiCall('SalesOrderUpdatePODStatus',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateTracking(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateTracking',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderUpdateWIPState(array $query): object
    {
        return $this->apiCall('SalesOrderUpdateWIPState',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderVoid(array $query): object
    {
        return $this->apiCall('SalesOrderVoid',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderVoidSearch(array $query): object
    {
        return $this->apiCall('SalesOrderVoidSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SearchWIPStatusWithUpdate(array $query): object
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
     * @param array $query
     * @return object
     */
    public function StopReasonSalesOrderTemplateUpdate(array $query): object
    {
        return $this->apiCall('StopReasonSalesOrderTemplateUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function StopReasonSalesOrderUpdate(array $query): object
    {
        return $this->apiCall('StopReasonSalesOrderUpdate',$query);
    }
}