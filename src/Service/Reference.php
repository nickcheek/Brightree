<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;

class Reference extends Brightree
{
    use ApiCall;
    use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

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
     * @param iterable $query
     * @return object
     */
    public function AddFacilityReferralContact(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function BranchInfoFetchByBrightreeID(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function ContactTypeCreate(iterable $query): object
    {
        return $this->apiCall('ContactTypeCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ContactTypeDelete(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function ContactTypeFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('ContactTypeFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ContactTypeUpdate(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function FacilityCreate(iterable $query): object
    {
        return $this->apiCall('FacilityCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FacilityDelete(iterable $query): object
    {
        return $this->apiCall('FacilityDelete',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FacilityFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('FacilityFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FacilityFetchByExternalID(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function FacilityReferralContactsFetchByFacilityKey(iterable $query): object
    {
        return $this->apiCall('FacilityReferralContactsFetchByFacilityKey',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function FacilityUpdate(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function MarketingRepFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('MarketingRepFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function MarketingRepFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('MarketingRepFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function MarketingRepUpdateExternalID(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function ReferralContactCreate(iterable $query): object
    {
        return $this->apiCall('ReferralContactCreate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralContactFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('ReferralContactFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralContactFetchByExternalID(iterable $query): object
    {
        return $this->apiCall('ReferralContactFetchByExternalID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralContactSearch(iterable $query): object
    {
        return $this->apiCall('ReferralContactSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralContactUpdate(iterable $query): object
    {
        return $this->apiCall('ReferralContactUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralFetchByBrightreeID(iterable $query): object
    {
        return $this->apiCall('ReferralFetchByBrightreeID',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ReferralSearch(iterable $query): object
    {
        return $this->apiCall('ReferralSearch',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function RemoveFacilityReferralContact(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function SiteInfoFetch(iterable $query): object
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
     * @param iterable $query
     * @return object
     */
    public function VendorFetchByBrightreeID(iterable $query): object
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