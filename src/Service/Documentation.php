<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Documentation extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

	public function __construct(object $info)
	{
	    $this->info = $info;
		$this->wsdl = $this->info->config->service['documentation'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['documentation'],'location' => $this->info->config->service['documentation'],'trace' => 1);
	}
    
    public function CMNCreateFromPatient($query): object
    {
        return $this->apiCall('CMNCreateFromPatient',$query);
    }
	
	public function CMNDetailCreate($query): object
	{
		return $this->apiCall('CMNDetailCreate',$query);
	}
	
	public function CMNDetailDelete($query): object
	{
		return $this->apiCall('CMNDetailDelete',$query);
	}
	
	public function CMNDetailUpdate($query): object
	{
		return $this->apiCall('CMNDetailUpdate',$query);
	}
	
	public function CMNFetchByBrightreeID($query): object
	{
		return $this->apiCall('CMNFetchByBrightreeID',$query);
	}
	
	public function CMNFetchByExternalID($query): object
	{
		return $this->apiCall('CMNFetchByExternalID',$query);
	}
	
	public function CMNFetchByPatientBrightreeID($query): object
	{
		return $this->apiCall('CMNFetchByPatientBrightreeID',$query);
	}
	
	public function CMNFetchBySalesOrderBrightreeID($query): object
	{
		return $this->apiCall('CMNFetchBySalesOrderBrightreeID',$query);
	}
	
	public function CMNLog($query): object
	{
		return $this->apiCall('CMNLog',$query);
	}
	
	public function CMNPreview($query): object
	{
		return $this->apiCall('CMNPreview',$query);
	}
	
	public function CMNPrint($query): object
	{
		return $this->apiCall('CMNPrint',$query);
	}
	
	public function CMNQuestionAnswerConfiguration($query): object
	{
		return $this->apiCall('CMNQuestionAnswerConfiguration',$query);
	}
	
	public function CMNReasonFetchAll($query): object
	{
		return $this->apiCall('CMNReasonFetchAll',$query);
	}
	
	public function CMNRenew($query): object
	{
		return $this->apiCall('CMNRenew',$query);
	}
	
	public function CMNRevise($query): object
	{
		return $this->apiCall('CMNRevise',$query);
	}
	
	public function CMNSearch($query): object
	{
		return $this->apiCall('CMNSearch',$query);
	}
	
	public function CMNTaskCreate($query): object
	{
		return $this->apiCall('CMNTaskCreate',$query);
	}
	
	public function CMNTaskUpdate($query): object
	{
		return $this->apiCall('CMNTaskUpdate',$query);
	}
	
	public function CMNUpdate($query): object
	{
		return $this->apiCall('CMNUpdate',$query);
	}
	
	public function PARAddPurchaseLimit($query): object
	{
		return $this->apiCall('PARAddPurchaseLimit',$query);
	}
	
	public function PARCreateFromPatient($query): object
	{
		return $this->apiCall('PARCreateFromPatient',$query);
	}
	
	public function PARDelete($query): object
	{
		return $this->apiCall('PARDelete',$query);
	}
	
	public function PARFetchByBrightreeID($query): object
	{
		return $this->apiCall('PARFetchByBrightreeID',$query);
	}
	
	public function PARFetchByExternalID($query): object
	{
		return $this->apiCall('PARFetchByExternalID',$query);
	}
	
	public function PARFetchByPatientBrightreeID($query): object
	{
		return $this->apiCall('PARFetchByPatientBrightreeID',$query);
	}
	
	public function PARFetchBySalesOrderBrightreeID($query): object
	{
		return $this->apiCall('PARFetchBySalesOrderBrightreeID',$query);
	}
	
	public function PARFetchBySalesOrderTemplateBrightreeID($query): object
	{
		return $this->apiCall('PARFetchBySalesOrderTemplateBrightreeID',$query);
	}
	
	public function PARLog($query): object
	{
		return $this->apiCall('PARLog',$query);
	}
	
	public function PARRenew($query): object
	{
		return $this->apiCall('PARRenew',$query);
	}
	
	public function PARSearch($query): object
	{
		return $this->apiCall('PARSearch',$query);
	}
	
	public function PARUpdate($query): object
	{
		return $this->apiCall('PARUpdate',$query);
	}
	
	public function PARUpdatePurchaseLimit($query): object
	{
		return $this->apiCall('PARUpdatePurchaseLimit',$query);
	}
	
	public function SalesOrderItemLinkCMN($query): object
	{
		return $this->apiCall('SalesOrderItemLinkCMN',$query);
	}
	
	public function SalesOrderItemLinkNewCMN($query): object
	{
		return $this->apiCall('SalesOrderItemLinkNewCMN',$query);
	}
	    
    public function SalesOrderItemLinkToNewPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToNewPAR',$query);
    }
    
    public function SalesOrderItemLinkToPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToPAR',$query);
    }
    
    public function SalesOrderItemsLinkCMN($query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkCMN',$query);
    }
    
    public function SalesOrderItemsLinkNewCMN($query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkNewCMN',$query);
    }
    
    public function SalesOrderItemsLinkToNewPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToNewPAR',$query);
    }
    
    public function SalesOrderItemsLinkToPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToPAR',$query);
    }
    
    public function SalesOrderItemsUnlinkCMN($query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkCMN',$query);
    }
    
    public function SalesOrderItemsUnlinkPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkPAR',$query);
    }
    
    public function SalesOrderItemUnlinkCMN($query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkCMN',$query);
    }
    
    public function SalesOrderItemUnlinkPAR($query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkPAR',$query);
    }
    
    public function SalesOrderTemplateItemLinkToPAR($query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemLinkToPAR',$query);
    }
    
    public function SalesOrderTemplateItemsLinkToPAR($query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsLinkToPAR',$query);
    }
    
    public function SalesOrderTemplateItemsUnlinkPAR($query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsUnlinkPAR',$query);
    }
    
    public function SalesOrderTemplateItemUnlinkPAR($query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemUnlinkPAR',$query);
    }
    
    public function SetParticipantComplianceDate($query): object
    {
    	return $this->apiCall('SetParticipantComplianceDate',$query);
    }
}