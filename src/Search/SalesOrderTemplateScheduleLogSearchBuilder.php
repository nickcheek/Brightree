<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderTemplateScheduleLogSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'searchParams';
	protected string $sortKey = 'sortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderTemplateScheduleLogSearch');
	}

	public function brightreeId(int $value): self { return $this->where('BrightreeID', $value); }
	public function createdSoKey(int $value): self { return $this->where('CreatedSOKey', $value); }
	public function errorMessage(string $value): self { return $this->where('ErrorMessage', trim($value)); }
	public function runDate(string $value): self { return $this->where('RunDate', $value); }
	public function soTemplateKey(int $value): self { return $this->where('SOTemplateKey', $value); }
	public function soTemplateScheduleKey(int $value): self { return $this->where('SOTemplateScheduleKey', $value); }

	public function runDateBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) { $this->where('RunDateRangeStart', $start); }
		if ($end !== null) { $this->where('RunDateRangeEnd', $end); }
		return $this;
	}
}
