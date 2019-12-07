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
    
	public function BrightSHIPSalesOrderAck($query): object
    {
    	return $this->apiCall('BrightSHIPSalesOrderAck',$query);
    }
    
    public function BrightShipSalesOrderFetch($query): object
    {
        return $this->apiCall('BrightShipSalesOrderFetch',$query);
    }

    public function OrderImport($query): object
    {
        return $this->apiCall('OrderImport',$query);
    }

    public function SalesOrderAddDeliveryException($query): object
    {
        return $this->apiCall('SalesOrderAddDeliveryException',$query);
    }
   
    public function SalesOrderAddMarketingReferral($query): object
    {
        return $this->apiCall('SalesOrderAddMarketingReferral',$query);
    }

    public function SalesOrderConfirm($query): object
    {
        return $this->apiCall('SalesOrderConfirm',$query);
    }

    public function SalesOrderCreate($query): object
    {
        return $this->apiCall('SalesOrderCreate',$query);
    }

    public function SalesOrderFetchByBrightreeID($query): object
    {
        return $this->apiCall('SalesOrderFetchByBrightreeID',$query);
    }

    public function SalesOrderFetchByExternalID($query): object
    {
        return $this->apiCall('SalesOrderFetchByExternalID',$query);
    }

    public function SalesOrderFetchByPurchaseOrderID($query): object
    {
        return $this->apiCall('SalesOrderFetchByPurchaseOrderID',$query);
    }

    public function SalesOrderFetchPendingByShippingCarrierKey($query): object
    {
        return $this->apiCall('SalesOrderFetchPendingByShippingCarrierKey',$query);
    }

    public function SalesOrderFetchReadyforShipping($query): object
    {
        return $this->apiCall('SalesOrderFetchReadyforShipping',$query);
    }

    public function SalesOrderFulfillmentVendorsFetchAll(): object
    {
        return $this->apiCall('SalesOrderFulfillmentVendorsFetchAll',[]);
    }

    public function SalesOrderItemAddDeliveryException($query): object
    {
        return $this->apiCall('SalesOrderItemAddDeliveryException',$query);
    }

    public function SalesOrderItemPriceOptionFetchByBrightreeID($query): object
    {
        return $this->apiCall('SalesOrderItemPriceOptionFetchByBrightreeID',$query);
    }

    public function SalesOrderItemReplaceGeneric($query): object
    {
        return $this->apiCall('SalesOrderItemReplaceGeneric',$query);
    }

    public function SalesOrderItemUpdateLotNumbers($query): object
    {
        return $this->apiCall('SalesOrderItemUpdateLotNumbers',$query);
    }

    public function SalesOrderItemUpdatePriceOption($query): object
    {
        return $this->apiCall('SalesOrderItemUpdatePriceOption',$query);
    }

    public function SalesOrderItemUpdateSerialNumbers($query): object
    {
        return $this->apiCall('SalesOrderItemUpdateSerialNumbers',$query);
    }

    public function SalesOrderMessagesFetchByBrightreeID($query): object
    {
        return $this->apiCall('SalesOrderMessagesFetchByBrightreeID',$query);
    }

    public function SalesOrderPayorSearch($query): object
    {
        return $this->apiCall('SalesOrderPayorSearch',$query);
    }

    public function SalesOrderQuickAddItem($query): object
    {
        return $this->apiCall('SalesOrderQuickAddItem',$query);
    }

    public function SalesOrderRemoveItem($query): object
    {
        return $this->apiCall('SalesOrderRemoveItem',$query);
    }

    public function SalesOrderRemoveMarketingReferral($query): object
    {
        return $this->apiCall('SalesOrderRemoveMarketingReferral',$query);
    }

    public function SalesOrderSearch($query): object
    {
        return $this->apiCall('SalesOrderSearch',$query);
    }

    public function SalesOrderSendPOD($query): object
    {
        return $this->apiCall('SalesOrderSendPOD',$query);
    }

    public function SalesOrderTemplateCreate($query): object
    {
        return $this->apiCall('SalesOrderTemplateCreate',$query);
    }

    public function SalesOrderTemplateCreateSalesOrder($query): object
    {
        return $this->apiCall('SalesOrderTemplateCreateSalesOrder',$query);
    }

    public function SalesOrderTemplateDelete($query): object
    {
        return $this->apiCall('SalesOrderTemplateDelete',$query);
    }

    public function SalesOrderTemplateFetchByBrightreeID($query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByBrightreeID',$query);
    }

    public function SalesOrderTemplateFetchByExternalID($query): object
    {
        return $this->apiCall('SalesOrderTemplateFetchByExternalID',$query);
    }

    public function SalesOrderTemplateItemPriceOptionFetchByBrightreeID($query): object
    {
        return $this->apiCall('SalesOrderTemplateItemPriceOptionFetchByBrightreeID',$query);
    }

    public function SalesOrderTemplateItemUpdatePriceOption($query): object
    {
        return $this->apiCall('SalesOrderTemplateItemUpdatePriceOption',$query);
    }
    
    public function SalesOrderTemplateQuickAddItem($query): object
    {
        return $this->apiCall('SalesOrderTemplateQuickAddItem',$query);
    }

    public function SalesOrderTemplateRemoveItem($query): object
    {
        return $this->apiCall('SalesOrderTemplateRemoveItem',$query);
    }

    public function SalesOrderTemplateScheduleFetchBySOTemplateKey($query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleFetchBySOTemplateKey',$query);
    }

    public function SalesOrderTemplateScheduleLogSearch($query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleLogSearch',$query);
    }

    public function SalesOrderTemplateScheduleSearch($query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleSearch',$query);
    }

    public function SalesOrderTemplateScheduleUpdate($query): object
    {
        return $this->apiCall('SalesOrderTemplateScheduleUpdate',$query);
    }

    public function SalesOrderTemplateSearch($query): object
    {
        return $this->apiCall('SalesOrderTemplateSearch',$query);
    }

    public function SalesOrderTemplateUpdate($query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdate',$query);
    }

    public function SalesOrderTemplateUpdateInsurance($query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateInsurance',$query);
    }

    public function SalesOrderTemplateUpdateItem($query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItem',$query);
    }

    public function SalesOrderTemplateUpdateItemsWithDefaultPriceOption($query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateItemsWithDefaultPriceOption',$query);
    }

    public function SalesOrderTemplateUpdateWIPState($query): object
    {
        return $this->apiCall('SalesOrderTemplateUpdateWIPState',$query);
    }

    public function SalesOrderUpdate($query): object
    {
        return $this->apiCall('SalesOrderUpdate',$query);
    }

    public function SalesOrderUpdateInsurance($query): object
    {
        return $this->apiCall('SalesOrderUpdateInsurance',$query);
    }

    public function SalesOrderUpdateItem($query): object
    {
        return $this->apiCall('SalesOrderUpdateItem',$query);
    }

    public function SalesOrderUpdateItemPayor($query): object
    {
        return $this->apiCall('SalesOrderUpdateItemPayor',$query);
    }

    public function SalesOrderUpdateItemsWithDefaultPriceOption($query): object
    {
        return $this->apiCall('SalesOrderUpdateItemsWithDefaultPriceOption',$query);
    }

    public function SalesOrderUpdatePODStatus($query): object
    {
        return $this->apiCall('SalesOrderUpdatePODStatus',$query);
    }

    public function SalesOrderUpdateTracking($query): object
    {
        return $this->apiCall('SalesOrderUpdateTracking',$query);
    }

    public function SalesOrderUpdateWIPState($query): object
    {
        return $this->apiCall('SalesOrderUpdateWIPState',$query);
    }

    public function SalesOrderVoid($query): object
    {
        return $this->apiCall('SalesOrderVoid',$query);
    }

    public function SalesOrderVoidSearch($query): object
    {
        return $this->apiCall('SalesOrderVoidSearch',$query);
    }

    public function SearchWIPStatusWithUpdate($query): object
    {
        return $this->apiCall('SearchWIPStatusWithUpdate',$query);
    }
}