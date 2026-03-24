<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderTemplateScheduleSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'searchParams';
	protected string $sortKey = 'sortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderTemplateScheduleSearch');
	}

	public function brightreeId(int $value): self { return $this->where('BrightreeID', $value); }
	public function soTemplateKey(int $value): self { return $this->where('SOTemplateKey', $value); }
	public function description(string $value): self { return $this->where('Description', trim($value)); }
	public function billScheduleType($value): self { return $this->where('BillScheduleType', $value); }
	public function monthFlags($value): self { return $this->where('MonthFlags', $value); }
	public function monthType(bool $value = true): self { return $this->where('MonthType', $value); }
	public function weekdayFlags($value): self { return $this->where('WeekdayFlags', $value); }
	public function isDisabled(bool $value = true): self { return $this->where('IsDisabled', $value); }
	public function endPeriod(int $value): self { return $this->where('EndPeriod', $value); }
	public function periodsRan(int $value): self { return $this->where('PeriodsRan', $value); }
	public function timeInterval(int $value): self { return $this->where('TimeInterval', $value); }
	public function lastRunDate(string $value): self { return $this->where('LastRunDate', $value); }
	public function nextRunDate(string $value): self { return $this->where('NextRunDate', $value); }
	public function startDate(string $value): self { return $this->where('StartDate', $value); }

	public function lastRunBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) { $this->where('LastRunDateRangeStart', $start); }
		if ($end !== null) { $this->where('LastRunDateRangeEnd', $end); }
		return $this;
	}

	public function nextRunBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) { $this->where('NextRunDateRangeStart', $start); }
		if ($end !== null) { $this->where('NextRunDateRangeEnd', $end); }
		return $this;
	}

	public function startDateBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) { $this->where('StartDateRangeStart', $start); }
		if ($end !== null) { $this->where('StartDateRangeEnd', $end); }
		return $this;
	}
}
