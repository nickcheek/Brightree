<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Insurance extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;
    use \Nickcheek\Brightree\Traits\Custom;

	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['insurance'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['insurance'],'location' => $this->info->config->service['insurance'],'trace' => 1);
	}

    /**
     * Get insurance by brightree id
     *
     * @param int $id
     * @return object
     */
	public function InsuranceFetchByBrightreeID(int $id): object
    {
    	return $this->apiCall('InsuranceFetchByBrightreeID',['BrightreeID'=>$id]);
    }

    /**
     * Get insurance by external id
     *
     * @param int $id
     * @return object
     */
	public function InsuranceFetchByExternalID(int $id): object
    {
    	return $this->apiCall('InsuranceFetchByExternalID',['ExternalID'=>$id]);
    }

    /**
     * Search for an insurance carrier
     *
     * @param iterable $query
     * @return object
     */
    public function InsuranceSearch(iterable $query): object
    {
    	return $this->apiCall('InsuranceSearch',$query);
    }

    /**
     * Update Insurance
     *
     * @param iterable $query
     * @return object
     */
    public function InsuranceUpdate(iterable $query): object
    {
    	return $this->apiCall('InsuranceUpdate',$query);
    }

    /**
     * @param int|null $branchBrightreeID, int|null $insuranceBrightreeID
     * @return object
     */
    public function BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID(?int $branchBrightreeID = null, ?int $insuranceBrightreeID = null): object
    {
        return $this->apiCall('BranchOfficeInsuranceFetchByBranchBrightreeIDAndInsuranceBrightreeID', array('BranchBrightreeID' => $branchBrightreeID, 'InsuranceBrightreeID' => $insuranceBrightreeID));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function BranchOfficeInsuranceUpdate(iterable $query): object
    {
    	return $this->apiCall('BranchOfficeInsuranceUpdate',$query);
    }

    /**
     * @param none
     * @return object
     */
    public function BundleBillingRuleSetFetchAll(): object
    {
    	return $this->apiCall('BundleBillingRuleSetFetchAll',[]);
    }

    /**
     * @param none
     * @return object
     */
    public function ClaimFormFetchAll(): object
    {
    	return $this->apiCall('ClaimFormFetchAll',[]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function CommercialEligibilityPayerSearch(iterable $query): object
    {
    	return $this->apiCall('CommercialEligibilityPayerSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function CommercialPayerSearch(iterable $query): object
    {
    	return $this->apiCall('CommercialPayerSearch',$query);
    }

    /**
     * @param none
     * @return object
     */
    public function CoverageLimitFetchAll(): object
    {
    	return $this->apiCall('CoverageLimitFetchAll',[]);
    }

    /**
     * @param none
     * @return object
     */
    public function CustomAppealFormFetchAll(): object
    {
    	return $this->apiCall('CustomAppealFormFetchAll',[]);
    }

    /**
     * @param int $paymentTypeBrightreeID
     * @return object
     */
	public function FetchPmtSubTypeByPmtTypeBrightreeID(int $paymentTypeBrightreeID): object
    {
    	return $this->apiCall('FetchPmtSubTypeByPmtTypeBrightreeID',['PaymentTypeBrightreeID'=>$paymentTypeBrightreeID]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceCarrierCodeCreate(iterable $query): object
    {
    	return $this->apiCall('InsuranceCarrierCodeCreate',$query);
    }

    /**
     * @param int $brightreeID
     * @return object
     */
	public function InsuranceCarrierCodeDelete(int $brightreeID): object
    {
    	return $this->apiCall('InsuranceCarrierCodeDelete',['BrightreeID'=>$brightreeID]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceCarrierCodeUpdate(iterable $query): object
    {
    	return $this->apiCall('InsuranceCarrierCodeUpdate',$query);
    }

    /**
     * @param none
     * @return object
     */
    public function InsuranceCompanyFetchAll(): object
    {
    	return $this->apiCall('InsuranceCompanyFetchAll',[]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceCreate(iterable $query): object
    {
    	return $this->apiCall('InsuranceCreate',$query);
    }

    /**
     * @param none
     * @return object
     */
	public function InsuranceGroupFetchAll(): object
    {
    	return $this->apiCall('InsuranceGroupFetchAll',[]);
    }

    /**
     * @param none
     * @return object
     */
	public function InsurancePlanTypeFetchAll(): object
    {
    	return $this->apiCall('InsurancePlanTypeFetchAll',[]);
    }

    /**
     * @param none
     * @return object
     */
	public function InsurancePrintedFormsClaimFieldsFetch(): object
    {
    	return $this->apiCall('InsurancePrintedFormsClaimFieldsFetch',[]);
    }

    /**
     * @param none
     * @return object
     */
	public function InsurancePrintedFormsPARFieldsFetch(): object
    {
    	return $this->apiCall('InsurancePrintedFormsPARFieldsFetch',[]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceSpanDateHoldInclusionCreate(iterable $query): object
    {
    	return $this->apiCall('InsuranceSpanDateHoldInclusionCreate',$query);
    }

    /**
     * @param int $brightreeID
     * @return object
     */
	public function InsuranceSpanDateHoldInclusionDelete(int $brightreeID): object
    {
    	return $this->apiCall('InsuranceSpanDateHoldInclusionDelete',['BrightreeID'=>$brightreeID]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceSpanDateOverrideCreate(iterable $query): object
    {
    	return $this->apiCall('InsuranceSpanDateOverrideCreate',$query);
    }

    /**
     * @param int $brightreeID
     * @return object
     */
	public function InsuranceSpanDateOverrideDelete(int $brightreeID): object
    {
    	return $this->apiCall('InsuranceSpanDateOverrideDelete',['BrightreeID'=>$brightreeID]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InsuranceSpanDateOverrideUpdate(iterable $query): object
    {
    	return $this->apiCall('InsuranceSpanDateOverrideUpdate',$query);
    }

    /**
     * @param int|null $validationRuleSetBrightreeID, int|null $insuranceBrightreeID
     * @return object
     */
    public function InsuranceValidationRuleSetCreate(?int $validationRuleSetBrightreeID = null, ?int $insuranceBrightreeID = null): object
    {
        return $this->apiCall('InsuranceValidationRuleSetCreate', array('BranchBrightreeID' => $validationRuleSetBrightreeID, 'InsuranceBrightreeID' => $insuranceBrightreeID));
    }

    /**
     * @param int $insuranceBrightreeID
     * @return object
     */
	public function InsuranceValidationRuleSetDelete(int $insuranceBrightreeID): object
    {
    	return $this->apiCall('InsuranceValidationRuleSetDelete',['BrightreeID'=>$insuranceBrightreeID]);
    }

    /**
     * @param none
     * @return object
     */
	public function ItemGroupFetchAll(): object
    {
    	return $this->apiCall('ItemGroupFetchAll',[]);
    }

    /**
     * @param int $insuranceBrightreeID
     * @return object
     */
	public function ItemGroupFetchByInsuranceBrightreeID(int $insuranceBrightreeID): object
    {
    	return $this->apiCall('ItemGroupFetchByInsuranceBrightreeID',['BrightreeID'=>$insuranceBrightreeID]);
    }

    /**
     * @param none
     * @return object
     */
	public function PARFormFetchAll(): object
    {
    	return $this->apiCall('PARFormFetchAll',[]);
    }

    /**
     * @param none
     * @return object
     */
	public function Ping(): object
    {
    	return $this->apiCall('Ping',[]);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function PriceTableSearch(iterable $query): object
    {
    	return $this->apiCall('PriceTableSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function SpanDateSplit(iterable $query): object
    {
    	return $this->apiCall('SpanDateSplit',$query);
    }


}