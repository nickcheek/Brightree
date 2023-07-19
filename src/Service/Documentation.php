<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Documentation extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

	public function __construct(object $info)
	{
	    $this->info = $info;
		$this->wsdl = $this->info->config->service['documentation'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['documentation'],'location' => $this->info->config->service['documentation'],'trace' => 1);
	}

    /**
     * @param iterable $query
     * @return object
     */
    public function CMNCreateFromPatient(iterable $query): object
    {
        return $this->apiCall('CMNCreateFromPatient',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
	
	public function CMNDetailCreate(iterable $query): object
	{
		return $this->apiCall('CMNDetailCreate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNDetailDelete(iterable $query): object
	{
		return $this->apiCall('CMNDetailDelete',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNDetailUpdate(iterable $query): object
	{
		return $this->apiCall('CMNDetailUpdate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNFetchByBrightreeID(iterable $query): object
	{
		return $this->apiCall('CMNFetchByBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNFetchByExternalID(iterable $query): object
	{
		return $this->apiCall('CMNFetchByExternalID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNFetchByPatientBrightreeID(iterable $query): object
	{
		return $this->apiCall('CMNFetchByPatientBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNFetchBySalesOrderBrightreeID(iterable $query): object
	{
		return $this->apiCall('CMNFetchBySalesOrderBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNLog(iterable $query): object
	{
		return $this->apiCall('CMNLog',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNPreview(iterable $query): object
	{
		return $this->apiCall('CMNPreview',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNPrint(iterable $query): object
	{
		return $this->apiCall('CMNPrint',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNQuestionAnswerConfiguration(iterable $query): object
	{
		return $this->apiCall('CMNQuestionAnswerConfiguration',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNReasonFetchAll(iterable $query): object
	{
		return $this->apiCall('CMNReasonFetchAll',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNRenew(iterable $query): object
	{
		return $this->apiCall('CMNRenew',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNRevise(iterable $query): object
	{
		return $this->apiCall('CMNRevise',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNSearch(iterable $query): object
	{
		return $this->apiCall('CMNSearch',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNTaskCreate(iterable $query): object
	{
		return $this->apiCall('CMNTaskCreate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNTaskUpdate(iterable $query): object
	{
		return $this->apiCall('CMNTaskUpdate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function CMNUpdate(iterable $query): object
	{
		return $this->apiCall('CMNUpdate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARAddPurchaseLimit(iterable $query): object
	{
		return $this->apiCall('PARAddPurchaseLimit',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARCreateFromPatient(iterable $query): object
	{
		return $this->apiCall('PARCreateFromPatient',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARDelete(iterable $query): object
	{
		return $this->apiCall('PARDelete',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARFetchByBrightreeID(iterable $query): object
	{
		return $this->apiCall('PARFetchByBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARFetchByExternalID(iterable $query): object
	{
		return $this->apiCall('PARFetchByExternalID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARFetchByPatientBrightreeID(iterable $query): object
	{
		return $this->apiCall('PARFetchByPatientBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARFetchBySalesOrderBrightreeID(iterable $query): object
	{
		return $this->apiCall('PARFetchBySalesOrderBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARFetchBySalesOrderTemplateBrightreeID(iterable $query): object
	{
		return $this->apiCall('PARFetchBySalesOrderTemplateBrightreeID',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARLog(iterable $query): object
	{
		return $this->apiCall('PARLog',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARRenew(iterable $query): object
	{
		return $this->apiCall('PARRenew',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARSearch(iterable $query): object
	{
		return $this->apiCall('PARSearch',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARUpdate(iterable $query): object
	{
		return $this->apiCall('PARUpdate',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function PARUpdatePurchaseLimit(iterable $query): object
	{
		return $this->apiCall('PARUpdatePurchaseLimit',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function SalesOrderItemLinkCMN(iterable $query): object
	{
		return $this->apiCall('SalesOrderItemLinkCMN',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
	public function SalesOrderItemLinkNewCMN(iterable $query): object
	{
		return $this->apiCall('SalesOrderItemLinkNewCMN',$query);
	}

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemLinkToNewPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToNewPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemLinkToPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemLinkToPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsLinkCMN(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkCMN',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsLinkNewCMN(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkNewCMN',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsLinkToNewPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToNewPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsLinkToPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsLinkToPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsUnlinkCMN(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkCMN',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemsUnlinkPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemsUnlinkPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemUnlinkCMN(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkCMN',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderItemUnlinkPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderItemUnlinkPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemLinkToPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemLinkToPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemsLinkToPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsLinkToPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemsUnlinkPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemsUnlinkPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SalesOrderTemplateItemUnlinkPAR(iterable $query): object
    {
    	return $this->apiCall('SalesOrderTemplateItemUnlinkPAR',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SetParticipantComplianceDate(iterable $query): object
    {
    	return $this->apiCall('SetParticipantComplianceDate',$query);
    }
}