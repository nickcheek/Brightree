<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Reference extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

	public function __construct(object $info)
	{
		$this->info = $info;
		$this->wsdl = $this->info->config->service['reference'] .'?singleWsdl';
		$this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['reference'],'location' => $this->info->config->service['reference'],'trace' => 1);
	}

    /**
     * @return object
     */
	public function AccountGroupFetchAll(): object
    {
    	return $this->apiCall('AccountGroupFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function AddFacilityReferralContact(array $query): object
    {
        return $this->apiCall('AddFacilityReferralContact',$query);
    }

    /**
     * @return object
     */
    public function BranchInfoFetchAll(): object
    {
        return $this->apiCall('BranchInfoFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function BranchInfoFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('BranchInfoFetchByBrightreeID',$query);
    }

    /**
     * @return object
     */
    public function ClaimNoteTypeFetchAll(): object
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ContactTypeCreate(array $query): object
    {
        return $this->apiCall('ContactTypeCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ContactTypeDelete(array $query): object
    {
        return $this->apiCall('ContactTypeDelete',$query);
    }

    /**
     * @return object
     */
    public function ContactTypeFetchAll(): object
    {
        return $this->apiCall('ContactTypeFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ContactTypeFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('ContactTypeFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ContactTypeUpdate(array $query): object
    {
        return $this->apiCall('ContactTypeUpdate',$query);
    }

    /**
     * @return object
     */
    public function DeliveryTechnicianFetchAll(): object
    {
        return $this->apiCall('DeliveryTechnicianFetchAll',[]);
    }

    /**
     * @return object
     */
    public function DepreciationTypesFetchAll(): object
    {
        return $this->apiCall('DepreciationTypesFetchAll',[]);
    }

    /**
     * @return object
     */
    public function EPSDTConditionCodeFetchAll(): object
    {
        return $this->apiCall('EPSDTConditionCodeFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityCreate(array $query): object
    {
        return $this->apiCall('FacilityCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityDelete(array $query): object
    {
        return $this->apiCall('FacilityDelete',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('FacilityFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityFetchByExternalID(array $query): object
    {
        return $this->apiCall('FacilityFetchByExternalID',$query);
    }

    /**
     * @return object
     */
    public function FacilityInfoFetchAll(): object
    {
        return $this->apiCall('FacilityInfoFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityReferralContactsFetchByFacilityKey(array $query): object
    {
        return $this->apiCall('FacilityReferralContactsFetchByFacilityKey',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function FacilityUpdate(array $query): object
    {
        return $this->apiCall('FacilityUpdate',$query);
    }

    /**
     * @return object
     */
    public function FetchCurrentSecUser(): object
    {
        return $this->apiCall('FetchCurrentSecUser',[]);
    }

    /**
     * @return object
     */
    public function FunctionalAssessmentFetchAll(): object
    {
        return $this->apiCall('FunctionalAssessmentFetchAll',[]);
    }

    /**
     * @return object
     */
    public function GLAccountGroupsFetchAll(): object
    {
        return $this->apiCall('GLAccountGroupsFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ItemGroupFetchAll(): object
    {
        return $this->apiCall('ItemGroupFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ItemManufacturerFetchAll(): object
    {
        return $this->apiCall('ItemManufacturerFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ItemStatusFetchAll(): object
    {
        return $this->apiCall('ItemStatusFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ItemTypesFetchAll(): object
    {
        return $this->apiCall('ItemTypesFetchAll',[]);
    }

    /**
     * @return object
     */
    public function LocationInfoFetchAll(): object
    {
        return $this->apiCall('LocationInfoFetchAll',[]);
    }

    /**
     * @return object
     */
    public function MarketingRepFetchAll(): object
    {
        return $this->apiCall('MarketingRepFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function MarketingRepFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('MarketingRepFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function MarketingRepFetchByExternalID(array $query): object
    {
        return $this->apiCall('MarketingRepFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function MarketingRepUpdateExternalID(array $query): object
    {
        return $this->apiCall('MarketingRepUpdateExternalID',$query);
    }

    /**
     * @return object
     */
    public function MSPInsTypeFetchAll(): object
    {
        return $this->apiCall('MSPInsTypeFetchAll',[]);
    }

    /**
     * @return object
     */
    public function PatientNoteReasonFetchAll(): object
    {
        return $this->apiCall('PatientNoteReasonFetchAll',[]);
    }

    /**
     * @return object
     */
    public function PlaceOfServiceFetchAll(): object
    {
        return $this->apiCall('PlaceOfServiceFetchAll',[]);
    }

    /**
     * @return object
     */
    public function PolicyClaimCodeFetchAll(): object
    {
        return $this->apiCall('PolicyClaimCodeFetchAll',[]);
    }

    /**
     * @return object
     */
    public function PolicyTypeCodeFetchAll(): object
    {
        return $this->apiCall('PolicyTypeCodeFetchAll',[]);
    }

    /**
     * @return object
     */
    public function PractitionerInfoFetchAll(): object
    {
        return $this->apiCall('PractitionerInfoFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralContactCreate(array $query): object
    {
        return $this->apiCall('ReferralContactCreate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralContactFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('ReferralContactFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralContactFetchByExternalID(array $query): object
    {
        return $this->apiCall('ReferralContactFetchByExternalID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralContactSearch(array $query): object
    {
        return $this->apiCall('ReferralContactSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralContactUpdate(array $query): object
    {
        return $this->apiCall('ReferralContactUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('ReferralFetchByBrightreeID',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function ReferralSearch(array $query): object
    {
        return $this->apiCall('ReferralSearch',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function RemoveFacilityReferralContact(array $query): object
    {
        return $this->apiCall('RemoveFacilityReferralContact',$query);
    }

    /**
     * @return object
     */
    public function SalesOrderClassificationFetchAll(): object
    {
        return $this->apiCall('SalesOrderClassificationFetchAll',[]);
    }

    /**
     * @return object
     */
    public function SalesOrderManualHoldReasonFetchAll(): object
    {
        return $this->apiCall('SalesOrderManualHoldReasonFetchAll',[]);
    }

    /**
     * @return object
     */
    public function SalesOrderVoidReasonFetchAll(): object
    {
        return $this->apiCall('SalesOrderVoidReasonFetchAll',[]);
    }

    /**
     * @return object
     */
    public function SalesTypesFetchAll(): object
    {
        return $this->apiCall('SalesTypesFetchAll',[]);
    }

    /**
     * @return object
     */
    public function SecUsersFetchAll(): object
    {
        return $this->apiCall('SecUsersFetchAll',[]);
    }

    /**
     * @return object
     */
    public function ShippingCarriersFetchAll(): object
    {
        return $this->apiCall('ShippingCarriersFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function SiteInfoFetch(array $query): object
    {
        return $this->apiCall('SiteInfoFetch',$query);
    }

    /**
     * @return object
     */
    public function TaxZoneFetchAll(): object
    {
        return $this->apiCall('TaxZoneFetchAll',[]);
    }

    /**
     * @param array $query
     * @return object
     */
    public function VendorFetchByBrightreeID(array $query): object
    {
        return $this->apiCall('VendorFetchByBrightreeID',$query);
    }

    /**
     * @return object
     */
    public function VendorsFetchAll(): object
    {
        return $this->apiCall('VendorsFetchAll',[]);
    }

    /**
     * @return object
     */
    public function WIPStatesFetchAll(): object
    {
        return $this->apiCall('WIPStatesFetchAll',[]);
    }
}