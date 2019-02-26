<?php

namespace Nickcheek\Brightree\Service;

use SoapClient;

class Reference
{
	protected $reference;
	protected $reference_options;

	
	public function __construct()
	{
		DEFINE("BASE", dirname( __FILE__ ) ."/" );
		$config = include(BASE . '../config/config.php');
		$this->reference = $config->reference;
		$this->reference_options = array('login' => env('BT_USER'),'password' => env('BT_PASS'),'uri' => $this->reference,'location' => $this->reference,'trace' => 1);
	}
	
	public function apiCall($call,$query)
    {
        $client     = new SoapClient( $this->reference .'?singleWsdl', $this->reference_options);
        $response 	= $client->$call($query);
        return $response;
    }
    
	public function AccountGroupFetchAll()
    {
    	return $this->apiCall('AccountGroupFetchAll',[]);
    }

    public function AddFacilityReferralContact($query)
    {
        return $this->apiCall('AddFacilityReferralContact',$query);
    }

    public function BranchInfoFetchAll()
    {
        return $this->apiCall('BranchInfoFetchAll',[]);
    }

    public function BranchInfoFetchByBrightreeID($query)
    {
        return $this->apiCall('BranchInfoFetchByBrightreeID',$query);
    }

    public function ClaimNoteTypeFetchAll()
    {
        return $this->apiCall('ClaimNoteTypeFetchAll',[]);
    }

    public function ContactTypeCreate($query)
    {
        return $this->apiCall('ContactTypeCreate',$query);
    }

    public function ContactTypeDelete($query)
    {
        return $this->apiCall('ContactTypeDelete',$query);
    }

    public function ContactTypeFetchAll()
    {
        return $this->apiCall('ContactTypeFetchAll',[]);
    }

    public function ContactTypeFetchByBrightreeID($query)
    {
        return $this->apiCall('ContactTypeFetchByBrightreeID',$query);
    }

    public function ContactTypeUpdate($query)
    {
        return $this->apiCall('ContactTypeUpdate',$query);
    }

    public function DelivryTechnicianFetchAll()
    {
        return $this->apiCall('DelivryTechnicianFetchAll',[]);
    }

    public function DepreciationTypesFetchAll()
    {
        return $this->apiCall('DepreciationTypesFetchAll',[]);
    }

    public function EPSDTConditionCodeFetchAll()
    {
        return $this->apiCall('EPSDTConditionCodeFetchAll',[]);
    }

    public function FacilityCreate($query)
    {
        return $this->apiCall('FacilityCreate',$query);
    }

    public function FacilityDelete($query)
    {
        return $this->apiCall('FacilityDelete',$query);
    }

    public function FacilityFetchByBrightreeID($query)
    {
        return $this->apiCall('FacilityFetchByBrightreeID',$query);
    }

    public function FacilityFetchByExternalID($query)
    {
        return $this->apiCall('FacilityFetchByExternalID',$query);
    }

    public function FacilityInfoFetchAll()
    {
        return $this->apiCall('FacilityInfoFetchAll',[]);
    }
    
    public function FacilityReferralContactsFetchByFacilityKey($query)
    {
        return $this->apiCall('FacilityReferralContactsFetchByFacilityKey',$query);
    }

    public function FacilityUpdate($query)
    {
        return $this->apiCall('FacilityUpdate',$query);
    }

    public function FetchCurrentSecUser()
    {
        return $this->apiCall('FetchCurrentSecUser',[]);
    }

    public function FunctionalAssessmentFetchAll()
    {
        return $this->apiCall('FunctionalAssessmentFetchAll',[]);
    }

    public function GLAccountGroupsFetchAll()
    {
        return $this->apiCall('GLAccountGroupsFetchAll',[]);
    }

    public function ItemGroupFetchAll()
    {
        return $this->apiCall('ItemGroupFetchAll',[]);
    }

    public function ItemManufacturerFetchAll()
    {
        return $this->apiCall('ItemManufacturerFetchAll',[]);
    }

    public function ItemStatusFetchAll()
    {
        return $this->apiCall('ItemStatusFetchAll',[]);
    }

    public function ItemTypesFetchAll()
    {
        return $this->apiCall('ItemTypesFetchAll',[]);
    }

    public function LocationInfoFetchAll()
    {
        return $this->apiCall('LocationInfoFetchAll',[]);
    }

    public function MarketingRepFetchAll()
    {
        return $this->apiCall('MarketingRepFetchAll',[]);
    }

    public function MarketingRepFetchByBrightreeID($query)
    {
        return $this->apiCall('MarketingRepFetchByBrightreeID',$query);
    }

    public function MarketingRepFetchByExternalID($query)
    {
        return $this->apiCall('MarketingRepFetchByExternalID',$query);
    }

    public function MarketingRepUpdateExternalID($query)
    {
        return $this->apiCall('MarketingRepUpdateExternalID',$query);
    }

    public function MSPInsTypeFetchAll()
    {
        return $this->apiCall('MSPInsTypeFetchAll',[]);
    }

    public function PatientNoteReasonFetchAll()
    {
        return $this->apiCall('PatientNoteReasonFetchAll',[]);
    }

    public function PlaceOfServiceFetchAll()
    {
        return $this->apiCall('PlaceOfServiceFetchAll',[]);
    }

    public function PolicyClaimCodeFetchAll()
    {
        return $this->apiCall('PolicyClaimCodeFetchAll',[]);
    }

    public function PolicyTypeCodeFetchAll()
    {
        return $this->apiCall('PolicyTypeCodeFetchAll',[]);
    }

    public function PractitionerInfoFetchAll()
    {
        return $this->apiCall('PractitionerInfoFetchAll',[]);
    }

    public function ReferralContactCreate($query)
    {
        return $this->apiCall('ReferralContactCreate',$query);
    }

    public function ReferralContactFetchByBrightreeID($query)
    {
        return $this->apiCall('ReferralContactFetchByBrightreeID',$query);
    }

    public function ReferralContactFetchByExternalID($query)
    {
        return $this->apiCall('ReferralContactFetchByExternalID',$query);
    }

    public function ReferralContactSearch($query)
    {
        return $this->apiCall('ReferralContactSearch',$query);
    }

    public function ReferralContactUpdate($query)
    {
        return $this->apiCall('ReferralContactUpdate',$query);
    }

    public function ReferralFetchByBrightreeID($query)
    {
        return $this->apiCall('ReferralFetchByBrightreeID',$query);
    }

    public function ReferralSearch($query)
    {
        return $this->apiCall('ReferralSearch',$query);
    }

    public function RemoveFacilityReferralContact($query)
    {
        return $this->apiCall('RemoveFacilityReferralContact',$query);
    }

    public function SalesOrderClassificationFetchAll()
    {
        return $this->apiCall('SalesOrderClassificationFetchAll',[]);
    }

    public function SalesOrderManualHoldReasonFetchAll()
    {
        return $this->apiCall('SalesOrderManualHoldReasonFetchAll',[]);
    }

    public function SalesOrderVoidReasonFetchAll()
    {
        return $this->apiCall('SalesOrderVoidReasonFetchAll',[]);
    }

    public function SalesTypesFetchAll()
    {
        return $this->apiCall('SalesTypesFetchAll',[]);
    }

    public function SecUsersFetchAll()
    {
        return $this->apiCall('SecUsersFetchAll',[]);
    }

    public function ShippingCarriersFetchAll()
    {
        return $this->apiCall('ShippingCarriersFetchAll',[]);
    }

    public function SiteInfoFetch($query)
    {
        return $this->apiCall('SiteInfoFetch',$query);
    }

    public function TaxZoneFetchAll()
    {
        return $this->apiCall('TaxZoneFetchAll',[]);
    }

    public function VendorFetchByBrightreeID($query)
    {
        return $this->apiCall('VendorFetchByBrightreeID',$query);
    }

    public function VendorsFetchAll()
    {
        return $this->apiCall('VendorsFetchAll',[]);
    }

    public function WIPStatesFetchAll()
    {
        return $this->apiCall('WIPStatesFetchAll',[]);
    }
}