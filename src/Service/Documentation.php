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

    /**
     * @param array $query
     * @return object
     */
    public function CMNCreateFromPatient(array $query): object
    {
        return $this->apiCall('CMNCreateFromPatient',$query);
    }

    /**
     * @param array $query
     * @return object
     */
	
	public function CMNDetailCreate(array $query): object
	{
		return $this->apiCall('CMNDetailCreate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNDetailDelete(array $query): object
	{
		return $this->apiCall('CMNDetailDelete',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNDetailUpdate(array $query): object
	{
		return $this->apiCall('CMNDetailUpdate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNFetchByBrightreeID(array $query): object
	{
		return $this->apiCall('CMNFetchByBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNFetchByExternalID(array $query): object
	{
		return $this->apiCall('CMNFetchByExternalID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNFetchByPatientBrightreeID(array $query): object
	{
		return $this->apiCall('CMNFetchByPatientBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNFetchBySalesOrderBrightreeID(array $query): object
	{
		return $this->apiCall('CMNFetchBySalesOrderBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNLog(array $query): object
	{
		return $this->apiCall('CMNLog',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNPreview(array $query): object
	{
		return $this->apiCall('CMNPreview',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNPrint(array $query): object
	{
		return $this->apiCall('CMNPrint',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNQuestionAnswerConfiguration(array $query): object
	{
		return $this->apiCall('CMNQuestionAnswerConfiguration',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNReasonFetchAll(array $query): object
	{
		return $this->apiCall('CMNReasonFetchAll',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNRenew(array $query): object
	{
		return $this->apiCall('CMNRenew',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNRevise(array $query): object
	{
		return $this->apiCall('CMNRevise',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNSearch(array $query): object
	{
		return $this->apiCall('CMNSearch',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNTaskCreate(array $query): object
	{
		return $this->apiCall('CMNTaskCreate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNTaskUpdate(array $query): object
	{
		return $this->apiCall('CMNTaskUpdate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function CMNUpdate(array $query): object
	{
		return $this->apiCall('CMNUpdate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARAddPurchaseLimit(array $query): object
	{
		return $this->apiCall('PARAddPurchaseLimit',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARCreateFromPatient(array $query): object
	{
		return $this->apiCall('PARCreateFromPatient',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARDelete(array $query): object
	{
		return $this->apiCall('PARDelete',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARFetchByBrightreeID(array $query): object
	{
		return $this->apiCall('PARFetchByBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARFetchByExternalID(array $query): object
	{
		return $this->apiCall('PARFetchByExternalID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARFetchByPatientBrightreeID(array $query): object
	{
		return $this->apiCall('PARFetchByPatientBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARFetchBySalesOrderBrightreeID(array $query): object
	{
		return $this->apiCall('PARFetchBySalesOrderBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARFetchBySalesOrderTemplateBrightreeID(array $query): object
	{
		return $this->apiCall('PARFetchBySalesOrderTemplateBrightreeID',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARLog(array $query): object
	{
		return $this->apiCall('PARLog',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARRenew(array $query): object
	{
		return $this->apiCall('PARRenew',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARSearch(array $query): object
	{
		return $this->apiCall('PARSearch',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARUpdate(array $query): object
	{
		return $this->apiCall('PARUpdate',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function PARUpdatePurchaseLimit(array $query): object
	{
		return $this->apiCall('PARUpdatePurchaseLimit',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function SalesOrderItemLinkCMN(array $query): object
	{
		return $this->apiCall('SalesOrderItemLinkCMN',$query);
	}

    /**
     * @param array $query
     * @return object
     */
	public function SalesOrderItemLinkNewCMN(array $query): object
	{
		return $this->apiCall('SalesOrderItemLinkNewCMN',$query);
	}

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemLinkToNewPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToNewPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemLinkToPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsLinkCMN(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkCMN',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsLinkNewCMN(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkNewCMN',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsLinkToNewPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToNewPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsLinkToPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsUnlinkCMN(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkCMN',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemsUnlinkPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemUnlinkCMN(array $query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkCMN',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderItemUnlinkPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemLinkToPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemLinkToPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemsLinkToPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsLinkToPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemsUnlinkPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsUnlinkPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SalesOrderTemplateItemUnlinkPAR(array $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemUnlinkPAR',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SetParticipantComplianceDate(array $query): object
    {
    	return $this->apiCall('SetParticipantComplianceDate',$query);
    }
}