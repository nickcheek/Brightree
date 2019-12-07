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
    
	public function AccountGroupFetchAll(): object
    {
    	return $this->apiCall('AccountGroupFetchAll',[]);
    }

    public function AddFacilityReferralContact($query): object
    {
        return $this->apiCall('AddFacilityReferralContact',$query);
    }

    public function BranchInfoFetchAll(): object
    {
        return $this->apiCall('BranchInfoFetchAll',[]);
    }

    public function BranchInfoFetchByBrightreeID($query): object
    {
        return $this->apiCall('BranchInfoFetchByBrightreeID',$query);
    }

    public function ClaimNoteTypeFetchAll(): object
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    public function ContactTypeCreate($query): object
    {
        return $this->apiCall('ContactTypeCreate',$query);
    }

    public function ContactTypeDelete($query): object
    {
        return $this->apiCall('ContactTypeDelete',$query);
    }

    public function ContactTypeFetchAll(): object
    {
        return $this->apiCall('ContactTypeFetchAll',[]);
    }

    public function ContactTypeFetchByBrightreeID($query): object
    {
        return $this->apiCall('ContactTypeFetchByBrightreeID',$query);
    }

    public function ContactTypeUpdate($query): object
    {
        return $this->apiCall('ContactTypeUpdate',$query);
    }

    public function DelivryTechnicianFetchAll(): object
    {
        return $this->apiCall('DelivryTechnicianFetchAll',[]);
    }

    public function DepreciationTypesFetchAll(): object
    {
        return $this->apiCall('DepreciationTypesFetchAll',[]);
    }

    public function EPSDTConditionCodeFetchAll(): object
    {
        return $this->apiCall('EPSDTConditionCodeFetchAll',[]);
    }

    public function FacilityCreate($query): object
    {
        return $this->apiCall('FacilityCreate',$query);
    }

    public function FacilityDelete($query): object
    {
        return $this->apiCall('FacilityDelete',$query);
    }

    public function FacilityFetchByBrightreeID($query): object
    {
        return $this->apiCall('FacilityFetchByBrightreeID',$query);
    }

    public function FacilityFetchByExternalID($query): object
    {
        return $this->apiCall('FacilityFetchByExternalID',$query);
    }

    public function FacilityInfoFetchAll(): object
    {
        return $this->apiCall('FacilityInfoFetchAll',[]);
    }
    
    public function FacilityReferralContactsFetchByFacilityKey($query): object
    {
        return $this->apiCall('FacilityReferralContactsFetchByFacilityKey',$query);
    }

    public function FacilityUpdate($query): object
    {
        return $this->apiCall('FacilityUpdate',$query);
    }

    public function FetchCurrentSecUser(): object
    {
        return $this->apiCall('FetchCurrentSecUser',[]);
    }

    public function FunctionalAssessmentFetchAll(): object
    {
        return $this->apiCall('FunctionalAssessmentFetchAll',[]);
    }

    public function GLAccountGroupsFetchAll(): object
    {
        return $this->apiCall('GLAccountGroupsFetchAll',[]);
    }

    public function ItemGroupFetchAll(): object
    {
        return $this->apiCall('ItemGroupFetchAll',[]);
    }

    public function ItemManufacturerFetchAll(): object
    {
        return $this->apiCall('ItemManufacturerFetchAll',[]);
    }

    public function ItemStatusFetchAll(): object
    {
        return $this->apiCall('ItemStatusFetchAll',[]);
    }

    public function ItemTypesFetchAll(): object
    {
        return $this->apiCall('ItemTypesFetchAll',[]);
    }

    public function LocationInfoFetchAll(): object
    {
        return $this->apiCall('LocationInfoFetchAll',[]);
    }

    public function MarketingRepFetchAll(): object
    {
        return $this->apiCall('MarketingRepFetchAll',[]);
    }

    public function MarketingRepFetchByBrightreeID($query): object
    {
        return $this->apiCall('MarketingRepFetchByBrightreeID',$query);
    }

    public function MarketingRepFetchByExternalID($query): object
    {
        return $this->apiCall('MarketingRepFetchByExternalID',$query);
    }

    public function MarketingRepUpdateExternalID($query): object
    {
        return $this->apiCall('MarketingRepUpdateExternalID',$query);
    }

    public function MSPInsTypeFetchAll(): object
    {
        return $this->apiCall('MSPInsTypeFetchAll',[]);
    }

    public function PatientNoteReasonFetchAll(): object
    {
        return $this->apiCall('PatientNoteReasonFetchAll',[]);
    }

    public function PlaceOfServiceFetchAll(): object
    {
        return $this->apiCall('PlaceOfServiceFetchAll',[]);
    }

    public function PolicyClaimCodeFetchAll(): object
    {
        return $this->apiCall('PolicyClaimCodeFetchAll',[]);
    }

    public function PolicyTypeCodeFetchAll(): object
    {
        return $this->apiCall('PolicyTypeCodeFetchAll',[]);
    }

    public function PractitionerInfoFetchAll(): object
    {
        return $this->apiCall('PractitionerInfoFetchAll',[]);
    }

    public function ReferralContactCreate($query): object
    {
        return $this->apiCall('ReferralContactCreate',$query);
    }

    public function ReferralContactFetchByBrightreeID($query): object
    {
        return $this->apiCall('ReferralContactFetchByBrightreeID',$query);
    }

    public function ReferralContactFetchByExternalID($query): object
    {
        return $this->apiCall('ReferralContactFetchByExternalID',$query);
    }

    public function ReferralContactSearch($query): object
    {
        return $this->apiCall('ReferralContactSearch',$query);
    }

    public function ReferralContactUpdate($query): object
    {
        return $this->apiCall('ReferralContactUpdate',$query);
    }

    public function ReferralFetchByBrightreeID($query): object
    {
        return $this->apiCall('ReferralFetchByBrightreeID',$query);
    }

    public function ReferralSearch($query): object
    {
        return $this->apiCall('ReferralSearch',$query);
    }

    public function RemoveFacilityReferralContact($query): object
    {
        return $this->apiCall('RemoveFacilityReferralContact',$query);
    }

    public function SalesOrderClassificationFetchAll(): object
    {
        return $this->apiCall('SalesOrderClassificationFetchAll',[]);
    }

    public function SalesOrderManualHoldReasonFetchAll(): object
    {
        return $this->apiCall('SalesOrderManualHoldReasonFetchAll',[]);
    }

    public function SalesOrderVoidReasonFetchAll(): object
    {
        return $this->apiCall('SalesOrderVoidReasonFetchAll',[]);
    }

    public function SalesTypesFetchAll(): object
    {
        return $this->apiCall('SalesTypesFetchAll',[]);
    }

    public function SecUsersFetchAll(): object
    {
        return $this->apiCall('SecUsersFetchAll',[]);
    }

    public function ShippingCarriersFetchAll(): object
    {
        return $this->apiCall('ShippingCarriersFetchAll',[]);
    }

    public function SiteInfoFetch($query): object
    {
        return $this->apiCall('SiteInfoFetch',$query);
    }

    public function TaxZoneFetchAll(): object
    {
        return $this->apiCall('TaxZoneFetchAll',[]);
    }

    public function VendorFetchByBrightreeID($query): object
    {
        return $this->apiCall('VendorFetchByBrightreeID',$query);
    }

    public function VendorsFetchAll(): object
    {
        return $this->apiCall('VendorsFetchAll',[]);
    }

    public function WIPStatesFetchAll(): object
    {
        return $this->apiCall('WIPStatesFetchAll',[]);
    }
}