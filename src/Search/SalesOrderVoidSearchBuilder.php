<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderVoidSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'searchParams';
	protected string $sortKey = 'sortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderVoidSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function salesOrderBrightreeId(int $id): self
	{
		return $this->where('SalesOrderBrightreeID', $id);
	}

	public function branch(?int $id = null, ?string $value = null): self
	{
		return $this->where('Branch', $this->lookup($id, $value));
	}

	public function deliveryTechnician(?int $id = null, ?string $value = null): self
	{
		return $this->where('DeliveryTechnician', $this->lookup($id, $value));
	}

	public function facility(?int $id = null, ?string $value = null): self
	{
		return $this->where('Facility', $this->lookup($id, $value));
	}

	public function patient(?int $id = null, ?string $value = null): self
	{
		return $this->where('Patient', $this->lookup($id, $value));
	}

	public function voidReason(?int $id = null, ?string $value = null): self
	{
		return $this->where('VoidReason', $this->lookup($id, $value));
	}

	public function voidedBy(?int $id = null, ?string $value = null): self
	{
		return $this->where('VoidedBy', $this->lookup($id, $value));
	}

	public function reference(string $value): self
	{
		return $this->where('Reference', trim($value));
	}

	public function type($value): self
	{
		return $this->where('Type', $value);
	}

	public function createdBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('CreateDateTimeStart', 'CreateDateTimeEnd', $start, $end);
	}

	public function printedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('PrintDateTimeStart', 'PrintDateTimeEnd', $start, $end);
	}

	public function scheduledDeliveryBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('ScheduledDeliveryDateTimeStart', 'ScheduledDeliveryDateTimeEnd', $start, $end);
	}

	public function voidedBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('VoidedDateTimeStart', 'VoidedDateTimeEnd', $start, $end);
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
			'salesorderbrightreeid' => 'SalesOrderBrightreeID',
			'deliverytechnician' => 'DeliveryTechnician',
			'voidreason' => 'VoidReason',
			'voidedby' => 'VoidedBy',
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
