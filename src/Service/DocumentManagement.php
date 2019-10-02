<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use SoapClient;

class DocumentManagement extends Brightree
{
	protected $documentation_options;
	
	public function __construct()
	{
	    parent::__construct();
		
		$this->documentation_options = array('login' => $this->config->user['name'],'password' => $this->config->user['pass'],'uri' => $this->config->service['documentation'],'location' => $this->config->service['documentation'],'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->config->service['documentation'] .'?singleWsdl', $this->documentation_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
    public function CMNCreateFromPatient($query)
    {
        return $this->apiCall('CMNCreateFromPatient',$query);
    }
	
	public function CMNDetailCreate($query)
	{
		return $this->apiCall('CMNDetailCreate',$query);
	}
	
	public function CMNDetailDelete($query)
	{
		return $this->apiCall('CMNDetailDelete',$query);
	}
	
	public function CMNDetailUpdate($query)
	{
		return $this->apiCall('CMNDetailUpdate',$query);
	}
	
	public function CMNFetchByBrightreeID($query)
	{
		return $this->apiCall('CMNFetchByBrightreeID',$query);
	}
	
	public function CMNFetchByExternalID($query)
	{
		return $this->apiCall('CMNFetchByExternalID',$query);
	}
	
	public function CMNFetchByPatientBrightreeID($query)
	{
		return $this->apiCall('CMNFetchByPatientBrightreeID',$query);
	}
	
	public function CMNFetchBySalesOrderBrightreeID($query)
	{
		return $this->apiCall('CMNFetchBySalesOrderBrightreeID',$query);
	}
	
	public function CMNLog($query)
	{
		return $this->apiCall('CMNLog',$query);
	}
	
	public function CMNPreview($query)
	{
		return $this->apiCall('CMNPreview',$query);
	}
	
	public function CMNPrint($query)
	{
		return $this->apiCall('CMNPrint',$query);
	}
	
	public function CMNQuestionAnswerConfiguration($query)
	{
		return $this->apiCall('CMNQuestionAnswerConfiguration',$query);
	}
	
	public function CMNReasonFetchAll($query)
	{
		return $this->apiCall('CMNReasonFetchAll',$query);
	}
	
	public function CMNRenew($query)
	{
		return $this->apiCall('CMNRenew',$query);
	}
	
	public function CMNRevise($query)
	{
		return $this->apiCall('CMNRevise',$query);
	}
	
	public function CMNSearch($query)
	{
		return $this->apiCall('CMNSearch',$query);
	}
	
	public function CMNTaskCreate($query)
	{
		return $this->apiCall('CMNTaskCreate',$query);
	}
	
	public function CMNTaskUpdate($query)
	{
		return $this->apiCall('CMNTaskUpdate',$query);
	}
	
	public function CMNUpdate($query)
	{
		return $this->apiCall('CMNUpdate',$query);
	}
	
	public function PARAddPurchaseLimit($query)
	{
		return $this->apiCall('PARAddPurchaseLimit',$query);
	}
	
	public function PARCreateFromPatient($query)
	{
		return $this->apiCall('PARCreateFromPatient',$query);
	}
	
	public function PARDelete($query)
	{
		return $this->apiCall('PARDelete',$query);
	}
	
	public function PARFetchByBrightreeID($query)
	{
		return $this->apiCall('PARFetchByBrightreeID',$query);
	}
	
	public function PARFetchByExternalID($query)
	{
		return $this->apiCall('PARFetchByExternalID',$query);
	}
	
	public function PARFetchByPatientBrightreeID($query)
	{
		return $this->apiCall('PARFetchByPatientBrightreeID',$query);
	}
	
	public function PARFetchBySalesOrderBrightreeID($query)
	{
		return $this->apiCall('PARFetchBySalesOrderBrightreeID',$query);
	}
	
	public function PARFetchBySalesOrderTemplateBrightreeID($query)
	{
		return $this->apiCall('PARFetchBySalesOrderTemplateBrightreeID',$query);
	}
	
	public function PARLog($query)
	{
		return $this->apiCall('PARLog',$query);
	}
	
	public function PARRenew($query)
	{
		return $this->apiCall('PARRenew',$query);
	}
	
	public function PARSearch($query)
	{
		return $this->apiCall('PARSearch',$query);
	}
	
	public function PARUpdate($query)
	{
		return $this->apiCall('PARUpdate',$query);
	}
	
	public function PARUpdatePurchaseLimit($query)
	{
		return $this->apiCall('PARUpdatePurchaseLimit',$query);
	}
	
	public function SalesOrderItemLinkCMN($query)
	{
		return $this->apiCall('SalesOrderItemLinkCMN',$query);
	}
	
	public function SalesOrderItemLinkNewCMN($query)
	{
		return $this->apiCall('SalesOrderItemLinkNewCMN',$query);
	}
	    
    public function SalesOrderItemLinkToNewPAR($query)
    {
    	return $this->apiCall('SalesOrderItemLinkToNewPAR',$query);
    }
    
    public function SalesOrderItemLinkToPAR($query)
    {
    	return $this->apiCall('SalesOrderItemLinkToPAR',$query);
    }
    
    public function SalesOrderItemsLinkCMN($query)
    {
    	return $this->apiCall('SalesOrderItemsLinkCMN',$query);
    }
    
    public function SalesOrderItemsLinkNewCMN($query)
    {
    	return $this->apiCall('SalesOrderItemsLinkNewCMN',$query);
    }
    
    public function SalesOrderItemsLinkToNewPAR($query)
    {
    	return $this->apiCall('SalesOrderItemsLinkToNewPAR',$query);
    }
    
    public function SalesOrderItemsLinkToPAR($query)
    {
    	return $this->apiCall('SalesOrderItemsLinkToPAR',$query);
    }
    
    public function SalesOrderItemsUnlinkCMN($query)
    {
    	return $this->apiCall('SalesOrderItemsUnlinkCMN',$query);
    }
    
    public function SalesOrderItemsUnlinkPAR($query)
    {
    	return $this->apiCall('SalesOrderItemsUnlinkPAR',$query);
    }
    
    public function SalesOrderItemUnlinkCMN($query)
    {
    	return $this->apiCall('SalesOrderItemUnlinkCMN',$query);
    }
    
    public function SalesOrderItemUnlinkPAR($query)
    {
    	return $this->apiCall('SalesOrderItemUnlinkPAR',$query);
    }
    
    public function SalesOrderTemplateItemLinkToPAR($query)
    {
    	return $this->apiCall('SalesOrderTemplateItemLinkToPAR',$query);
    }
    
    public function SalesOrderTemplateItemsLinkToPAR($query)
    {
    	return $this->apiCall('SalesOrderTemplateItemsLinkToPAR',$query);
    }
    
    public function SalesOrderTemplateItemsUnlinkPAR($query)
    {
    	return $this->apiCall('SalesOrderTemplateItemsUnlinkPAR',$query);
    }
    
    public function SalesOrderTemplateItemUnlinkPAR($query)
    {
    	return $this->apiCall('SalesOrderTemplateItemUnlinkPAR',$query);
    }
    
    public function SetParticipantComplianceDate($query)
    {
    	return $this->apiCall('SetParticipantComplianceDate',$query);
    }
}