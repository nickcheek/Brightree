<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use SoapClient;

class SalesOrder extends Brightree
{
	protected $salesorder_options;
	
	public function __construct()
	{
		parent::__construct();
		$this->salesorder_options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['salesorder'],'location' => $this->config->service['salesorder'],'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client = new SoapClient( $this->config->service['salesorder'] .'?singleWsdl', $this->salesorder_options);
        return $client->$call($query);
    }
    
	public function BrightSHIPSalesOrderAck($query)
    {
    	return $this->apiCall('BrightSHIPSalesOrderAck',$query);
    }
    
    public function BrightShipSalesOrderFetch($query)
    {
        return $this->apiCall('BrightShipSalesOrderFetch',$query);
    }

    public function OrderImport($query)
    {
        return $this->apiCall('OrderImport',$query);
    }

    public function SalesOrderAddDeliveryException($query)
    {
        return $this->apiCall('SalesOrderAddDeliveryException',$query);
    }
   
    public function SalesOrderAddMarketingReferral($query)
    {
        return $this->apiCall('SalesOrderAddMarketingReferral',$query);
    }

    public function SalesOrderConfirm($query)
    {
        return $this->apiCall('SalesOrderConfirm',$query);
    }

    public function SalesOrderCreate($query)
    {
        return $this->apiCall('SalesOrderCreate',$query);
    }

    public function SalesOrderFetchByBrightreeID($query)
    {
        return $this->apiCall('SalesOrderFetchByBrightreeID',$query);
    }

    public function SalesOrderFetchByExternalID($query)
    {
        return $this->apiCall('SalesOrderFetchByExternalID',$query);
    }

    public function SalesOrderFetchByPurchaseOrderID($query)
    {
        return $this->apiCall('SalesOrderFetchByPurchaseOrderID',$query);
    }

    public function SalesOrderFetchPendingByShippingCarrierKey($query)
    {
        return $this->apiCall('SalesOrderFetchPendingByShippingCarrierKey',$query);
    }

    public function SalesOrderFetchReadyforShipping($query)
    {
        return $this->apiCall('SalesOrderFetchReadyforShipping',$query);
    }

    public function SalesOrderFulfillmentVendorsFetchAll()
    {
        return $this->apiCall('SalesOrderFulfillmentVendorsFetchAll',[]);
    }

    public function SalesOrderItemAddDeliveryException($query)
    {
        return $this->apiCall('SalesOrderItemAddDeliveryException',$query);
    }

    public function SalesOrderItemPriceOptionFetchByBrightreeID($query)
    {
        return $this->apiCall('SalesOrderItemPriceOptionFetchByBrightreeID',$query);
    }

    public function SalesOrderItemReplaceGeneric($query)
    {
        return $this->apiCall('SalesOrderItemReplaceGeneric',$query);
    }

    public function SalesOrderItemUpdateLotNumbers($query)
    {
        return $this->apiCall('SalesOrderItemUpdateLotNumbers',$query);
    }

    public function SalesOrderItemUpdatePriceOption($query)
    {
        return $this->apiCall('SalesOrderItemUpdatePriceOption',$query);
    }

    public function SalesOrderItemUpdateSerialNumbers($query)
    {
        return $this->apiCall('SalesOrderItemUpdateSerialNumbers',$query);
    }

    public function SalesOrderMessagesFetchByBrightreeID($query)
    {
        return $this->apiCall('SalesOrderMessagesFetchByBrightreeID',$query);
    }

    public function SalesOrderPayorSearch($query)
    {
        return $this->apiCall('SalesOrderPayorSearch',$query);
    }

    public function SalesOrderQuickAddItem($query)
    {
        return $this->apiCall('SalesOrderQuickAddItem',$query);
    }

    public function SalesOrderRemoveItem($query)
    {
        return $this->apiCall('SalesOrderRemoveItem',$query);
    }

    public function SalesOrderRemoveMarketingReferral($query)
    {
        return $this->apiCall('SalesOrderRemoveMarketingReferral',$query);
    }

    public function SalesOrderSearch($query)
    {
        return $this->apiCall('SalesOrderSearch',$query);
    }

    public function SalesOrderSendPOD($query)
    {
        return $this->apiCall('SalesOrderSendPOD',$query);
    }

    public function SalesOrderTemplateCreate($query)
    {
        return $this->apiCall('SalesOrderTemplateCreate',$query);
    }

    public function SalesOrderTemplateCreateSalesOrder($query)
    {
        return $this->apiCall('SalesOrderTemplateCreateSalesOrder',$query);
    }

    public function SalesOrderTemplateDelete($query)
    {
        return $this->apiCall('SalesOrderTemplateDelete',$query);
    }

    public function SalesOrderTemplateFetchByBrightreeID($query)
    {
        return $this->apiCall('SalesOrderTemplateFetchByBrightreeID',$query);
    }

    public function SalesOrderTemplateFetchByExternalID($query)
    {
        return $this->apiCall('SalesOrderTemplateFetchByExternalID',$query);
    }

    public function SalesOrderTemplateItemPriceOptionFetchByBrightreeID($query)
    {
        return $this->apiCall('SalesOrderTemplateItemPriceOptionFetchByBrightreeID',$query);
    }

    public function SalesOrderTemplateItemUpdatePriceOption($query)
    {
        return $this->apiCall('SalesOrderTemplateItemUpdatePriceOption',$query);
    }
    
    public function SalesOrderTemplateQuickAddItem($query)
    {
        return $this->apiCall('SalesOrderTemplateQuickAddItem',$query);
    }

    public function SalesOrderTemplateRemoveItem($query)
    {
        return $this->apiCall('SalesOrderTemplateRemoveItem',$query);
    }

    public function SalesOrderTemplateScheduleFetchBySOTemplateKey($query)
    {
        return $this->apiCall('SalesOrderTemplateScheduleFetchBySOTemplateKey',$query);
    }

    public function SalesOrderTemplateScheduleLogSearch($query)
    {
        return $this->apiCall('SalesOrderTemplateScheduleLogSearch',$query);
    }

    public function SalesOrderTemplateScheduleSearch($query)
    {
        return $this->apiCall('SalesOrderTemplateScheduleSearch',$query);
    }

    public function SalesOrderTemplateScheduleUpdate($query)
    {
        return $this->apiCall('SalesOrderTemplateScheduleUpdate',$query);
    }

    public function SalesOrderTemplateSearch($query)
    {
        return $this->apiCall('SalesOrderTemplateSearch',$query);
    }

    public function SalesOrderTemplateUpdate($query)
    {
        return $this->apiCall('SalesOrderTemplateUpdate',$query);
    }

    public function SalesOrderTemplateUpdateInsurance($query)
    {
        return $this->apiCall('SalesOrderTemplateUpdateInsurance',$query);
    }

    public function SalesOrderTemplateUpdateItem($query)
    {
        return $this->apiCall('SalesOrderTemplateUpdateItem',$query);
    }

    public function SalesOrderTemplateUpdateItemsWithDefaultPriceOption($query)
    {
        return $this->apiCall('SalesOrderTemplateUpdateItemsWithDefaultPriceOption',$query);
    }

    public function SalesOrderTemplateUpdateWIPState($query)
    {
        return $this->apiCall('SalesOrderTemplateUpdateWIPState',$query);
    }

    public function SalesOrderUpdate($query)
    {
        return $this->apiCall('SalesOrderUpdate',$query);
    }

    public function SalesOrderUpdateInsurance($query)
    {
        return $this->apiCall('SalesOrderUpdateInsurance',$query);
    }

    public function SalesOrderUpdateItem($query)
    {
        return $this->apiCall('SalesOrderUpdateItem',$query);
    }

    public function SalesOrderUpdateItemPayor($query)
    {
        return $this->apiCall('SalesOrderUpdateItemPayor',$query);
    }

    public function SalesOrderUpdateItemsWithDefaultPriceOption($query)
    {
        return $this->apiCall('SalesOrderUpdateItemsWithDefaultPriceOption',$query);
    }

    public function SalesOrderUpdatePODStatus($query)
    {
        return $this->apiCall('SalesOrderUpdatePODStatus',$query);
    }

    public function SalesOrderUpdateTracking($query)
    {
        return $this->apiCall('SalesOrderUpdateTracking',$query);
    }

    public function SalesOrderUpdateWIPState($query)
    {
        return $this->apiCall('SalesOrderUpdateWIPState',$query);
    }

    public function SalesOrderVoid($query)
    {
        return $this->apiCall('SalesOrderVoid',$query);
    }

    public function SalesOrderVoidSearch($query)
    {
        return $this->apiCall('SalesOrderVoidSearch',$query);
    }

    public function SearchWIPStatusWithUpdate($query)
    {
        return $this->apiCall('SearchWIPStatusWithUpdate',$query);
    }
}