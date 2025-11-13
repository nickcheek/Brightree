<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Reference extends BaseService
{
	protected array $methods = [
		'AccountGroupFetchAll' => [],
		'AddFacilityReferralContact' => true,
		'BranchInfoFetchAll' => [],
		'BranchInfoFetchByBrightreeID' => true,
		'ClaimNoteTypeFetchAll' => [],
		'ContactTypeCreate' => true,
		'ContactTypeDelete' => true,
		'ContactTypeFetchAll' => [],
		'ContactTypeFetchByBrightreeID' => true,
		'ContactTypeUpdate' => true,
		'DeliveryTechnicianFetchAll' => [],
		'DepreciationTypesFetchAll' => [],
		'EPSDTConditionCodeFetchAll' => [],
		'FacilityCreate' => true,
		'FacilityDelete' => true,
		'FacilityFetchByBrightreeID' => true,
		'FacilityFetchByExternalID' => true,
		'FacilityInfoFetchAll' => [],
		'FacilityReferralContactsFetchByFacilityKey' => true,
		'FacilityUpdate' => true,
		'FetchCurrentSecUser' => [],
		'FunctionalAssessmentFetchAll' => [],
		'GLAccountGroupsFetchAll' => [],
		'ItemGroupFetchAll' => [],
		'ItemManufacturerFetchAll' => [],
		'ItemStatusFetchAll' => [],
		'ItemTypesFetchAll' => [],
		'LocationInfoFetchAll' => [],
		'MarketingRepFetchAll' => [],
		'MarketingRepFetchByBrightreeID' => true,
		'MarketingRepFetchByExternalID' => true,
		'MarketingRepUpdateExternalID' => true,
		'MSPInsTypeFetchAll' => [],
		'PatientNoteReasonFetchAll' => [],
		'PlaceOfServiceFetchAll' => [],
		'PolicyClaimCodeFetchAll' => [],
		'PolicyTypeCodeFetchAll' => [],
		'PractitionerInfoFetchAll' => [],
		'ReferralContactCreate' => true,
		'ReferralContactFetchByBrightreeID' => true,
		'ReferralContactFetchByExternalID' => true,
		'ReferralContactSearch' => true,
		'ReferralContactUpdate' => true,
		'ReferralFetchByBrightreeID' => true,
		'ReferralSearch' => true,
		'RemoveFacilityReferralContact' => true,
		'SalesOrderClassificationFetchAll' => [],
		'SalesOrderManualHoldReasonFetchAll' => [],
		'SalesOrderVoidReasonFetchAll' => [],
		'SalesTypesFetchAll' => [],
		'SecUsersFetchAll' => [],
		'ShippingCarriersFetchAll' => [],
		'SiteInfoFetch' => true,
		'TaxZoneFetchAll' => [],
		'VendorFetchByBrightreeID' => true,
		'VendorsFetchAll' => [],
		'WIPStatesFetchAll' => []
	];

	public function FacilityFetchByBrightreeID(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("FacilityFetchByBrightreeID requires an iterable parameter", 1002);
			}

			if (!isset($query['BrightreeID'])) {
				throw new BrightreeException("BrightreeID is required for FacilityFetchByBrightreeID", 1003);
			}

			return $this->apiCall('FacilityFetchByBrightreeID', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'FacilityFetchByBrightreeID', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching facility by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function ReferralContactSearch(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("ReferralContactSearch requires an iterable parameter", 1002);
			}

			return $this->apiCall('ReferralContactSearch', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'ReferralContactSearch', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error searching referral contacts: " . $e->getMessage(), 0, $e);
		}
	}

	public function SecUsersFetchAll(): object
	{
		try {
			return $this->apiCall('SecUsersFetchAll', []);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'SecUsersFetchAll']);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching security users: " . $e->getMessage(), 0, $e);
		}
	}
}