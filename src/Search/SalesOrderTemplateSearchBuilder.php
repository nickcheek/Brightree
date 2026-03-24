<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderTemplateSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'SearchParams';
	protected string $sortKey = 'SortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderTemplateSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function externalId(string $value): self
	{
		return $this->where('ExternalID', trim($value));
	}

	public function reference(string $value): self
	{
		return $this->where('Reference', trim($value));
	}

	public function branch(?int $id = null, ?string $value = null): self
	{
		return $this->where('Branch', $this->lookup($id, $value));
	}

	public function patient(?int $id = null, ?string $value = null): self
	{
		return $this->where('Patient', $this->lookup($id, $value));
	}

	public function status($value): self
	{
		return $this->where('Status', $value);
	}

	public function stopType($value): self
	{
		return $this->where('StopType', $value);
	}

	public function type($value): self
	{
		return $this->where('Type', $value);
	}

	public function lastRunHasError(bool $value = true): self
	{
		return $this->where('LastRunHasError', $value);
	}

	public function createdBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('CreateDateStart', 'CreateDateEnd', $start, $end);
	}

	public function nextRunBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('NextRunDateStart', 'NextRunDateEnd', $start, $end);
	}

	public function previousRunBetween(?string $start = null, ?string $end = null): self
	{
		return $this->setRange('PreviousRunDateStart', 'PreviousRunDateEnd', $start, $end);
	}

	public function salesOrderCustomField(int $fieldStorageNumber, string $value): self
	{
		if (!isset($this->searchRequest['CustomFieldSalesOrderParams'])) {
			$this->searchRequest['CustomFieldSalesOrderParams'] = [];
		}

		$this->searchRequest['CustomFieldSalesOrderParams'][] = [
			'FieldStorageNumber' => $fieldStorageNumber,
			'Value' => $value
		];

		return $this;
	}

	public function templateCustomField(int $fieldStorageNumber, string $value): self
	{
		if (!isset($this->searchRequest['CustomFieldSalesOrderTemplateParams'])) {
			$this->searchRequest['CustomFieldSalesOrderTemplateParams'] = [];
		}

		$this->searchRequest['CustomFieldSalesOrderTemplateParams'][] = [
			'FieldStorageNumber' => $fieldStorageNumber,
			'Value' => $value
		];

		return $this;
	}

	protected function fieldAliases(): array
	{
		return [
			'brightreeid' => 'BrightreeID',
			'externalid' => 'ExternalID',
			'lastrunhaserror' => 'LastRunHasError',
			'stoptype' => 'StopType',
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
