<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'SearchParams';
	protected string $sortKey = 'SortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function brightreeReferralId(int $id): self
	{
		return $this->where('BrightreeReferralID', $id);
	}

	public function externalId(string $externalId): self
	{
		$externalId = trim($externalId);
		if ($externalId === '') {
			throw new BrightreeException('ExternalID is required', 1003);
		}

		return $this->where('ExternalID', $externalId);
	}

	public function poNumber(string $poNumber): self
	{
		return $this->where('PONumber', trim($poNumber));
	}

	public function reference(string $reference): self
	{
		return $this->where('Reference', trim($reference));
	}

	public function fulfillmentAccountNumber(string $value): self
	{
		return $this->where('FulfillmentAccountNumber', trim($value));
	}

	public function branch(?int $id = null, ?string $value = null): self
	{
		return $this->where('Branch', $this->lookup($id, $value));
	}

	public function classification(?int $id = null, ?string $value = null): self
	{
		return $this->where('Classification', $this->lookup($id, $value));
	}

	public function createdBy(?int $id = null, ?string $value = null): self
	{
		return $this->where('CreatedBy', $this->lookup($id, $value));
	}

	public function deliveryTechnician(?int $id = null, ?string $value = null): self
	{
		return $this->where('DeliveryTechnician', $this->lookup($id, $value));
	}

	public function dropShipStatus(?int $id = null, ?string $value = null): self
	{
		return $this->where('DropShipStatus', $this->lookup($id, $value));
	}

	public function facility(?int $id = null, ?string $value = null): self
	{
		return $this->where('Facility', $this->lookup($id, $value));
	}

	public function fulfillmentShipByVendor(?int $id = null, ?string $value = null): self
	{
		return $this->where('FulfillmentShipByVendor', $this->lookup($id, $value));
	}

	public function fulfillmentVendor(?int $id = null, ?string $value = null): self
	{
		return $this->where('FulfillmentVendor', $this->lookup($id, $value));
	}

	public function patient(?int $id = null, ?string $value = null): self
	{
		return $this->where('Patient', $this->lookup($id, $value));
	}

	public function shippingStatus(?int $id = null, ?string $value = null): self
	{
		return $this->where('SOShippingStatus', $this->lookup($id, $value));
	}

	public function wipAssignedTo(?int $id = null, ?string $value = null): self
	{
		return $this->where('WIPAssignedTo', $this->lookup($id, $value));
	}

	public function wipUserTaskReason(?int $id = null, ?string $value = null): self
	{
		return $this->where('WIPUserTaskReason', $this->lookup($id, $value));
	}

	public function status($status): self
	{
		return $this->where('Status', $status);
	}

	public function type($type): self
	{
		return $this->where('Type', $type);
	}

	public function fulfillmentStatus($status): self
	{
		return $this->where('FulfillmentStatus', $status);
	}

	public function excludeConfirmed(bool $value = true): self
	{
		return $this->where('ExcludeConfirmedSalesOrder', $value);
	}

	public function wipDaysInState(int $days): self
	{
		return $this->where('WIPDaysInState', $days);
	}

	public function actualDeliveryBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('ActualDeliveryDateTimeStart', 'ActualDeliveryDateTimeEnd', $start, $end);
	}

	public function confirmedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('ConfirmDateTimeStart', 'ConfirmDateTimeEnd', $start, $end);
	}

	public function createdBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('CreateDateTimeStart', 'CreateDateTimeEnd', $start, $end);
	}

	public function fulfillmentBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('FulfillmentDateTimeStart', 'FulfillmentDateTimeEnd', $start, $end);
	}

	public function updatedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('LastUpdateDateStart', 'LastUpdateDateEnd', $start, $end);
	}

	public function printedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('PrintDateTimeStart', 'PrintDateTimeEnd', $start, $end);
	}

	public function scheduledDeliveryBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('ScheduledDeliveryDateTimeStart', 'ScheduledDeliveryDateTimeEnd', $start, $end);
	}

	public function wipClosedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('WIPClosedDateStart', 'WIPClosedDateEnd', $start, $end);
	}

	public function wipCreatedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('WIPCreateDateStart', 'WIPCreateDateEnd', $start, $end);
	}

	public function wipNeedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('WIPNeedDateStart', 'WIPNeedDateEnd', $start, $end);
	}

	public function customField(int $fieldStorageNumber, string $value): self
	{
		if (!isset($this->searchRequest['CustomFieldSearchParams'])) {
			$this->searchRequest['CustomFieldSearchParams'] = [];
		}

		$this->searchRequest['CustomFieldSearchParams'][] = [
			'FieldStorageNumber' => $fieldStorageNumber,
			'Value' => $value
		];

		return $this;
	}

	protected function fieldAliases(): array
	{
		return [
			'brightreeid' => 'BrightreeID',
			'brightreereferralid' => 'BrightreeReferralID',
			'externalid' => 'ExternalID',
			'ponumber' => 'PONumber',
			'createdby' => 'CreatedBy',
			'deliverytechnician' => 'DeliveryTechnician',
			'dropshipstatus' => 'DropShipStatus',
			'fulfillmentaccountnumber' => 'FulfillmentAccountNumber',
			'fulfillmentstatus' => 'FulfillmentStatus',
			'fulfillmentvendor' => 'FulfillmentVendor',
			'soshippingstatus' => 'SOShippingStatus',
			'wipassignedto' => 'WIPAssignedTo',
			'wipdaysinstate' => 'WIPDaysInState',
			'wipusertaskreason' => 'WIPUserTaskReason',
		];
	}

	private function setRange(string $startField, string $endField, ?string $start, ?string $end): self
	{
		if ($start !== null) {
			$this->where($startField, $start);
		}
		if ($end !== null) {
			$this->where($endField, $end);
		}

		return $this;
	}
}
