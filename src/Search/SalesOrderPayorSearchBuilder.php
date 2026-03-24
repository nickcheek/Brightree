<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\SalesOrder;

class SalesOrderPayorSearchBuilder extends AbstractSearchBuilder
{
	protected string $searchKey = 'searchParams';
	protected string $sortKey = 'sortParams';

	public function __construct(SalesOrder $service)
	{
		parent::__construct($service, 'SalesOrderPayorSearch');
	}

	public function soKey(int $value): self
	{
		return $this->where('SOKey', $value);
	}

	public function soPayorKey(int $value): self
	{
		return $this->where('SOPayorKey', $value);
	}

	public function payorKey(int $value): self
	{
		return $this->where('PayorKey', $value);
	}

	public function payorLevelKey(int $value): self
	{
		return $this->where('PayorLevelKey', $value);
	}

	public function policyNumber(string $value): self
	{
		$value = trim($value);
		if ($value === '') {
			throw new BrightreeException('PolicyNumber is required', 1003);
		}

		return $this->where('PolicyNumber', $value);
	}

	public function insuranceCompanyName(string $value): self
	{
		return $this->where('InsuranceCompanyName', trim($value));
	}

	public function insuranceCompanyPhone(string $value): self
	{
		$digits = preg_replace('/\D+/', '', $value);
		if ($digits === '') {
			throw new BrightreeException('InsuranceCompanyPhone is required', 1003);
		}

		return $this->where('InsuranceCompanyPhone', $digits);
	}

	public function verified(bool $value = true): self
	{
		return $this->where('Verified', $value);
	}

	public function between(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('StartDateTime', $start);
		}
		if ($end !== null) {
			$this->where('EndDateTime', $end);
		}

		return $this;
	}

	protected function fieldAliases(): array
	{
		return [
			'sokey' => 'SOKey',
			'sopayorkey' => 'SOPayorKey',
			'payorkey' => 'PayorKey',
			'payorlevelkey' => 'PayorLevelKey',
			'policynumber' => 'PolicyNumber',
			'insurancecompanyname' => 'InsuranceCompanyName',
			'insurancecompanyphone' => 'InsuranceCompanyPhone',
			'startdatetime' => 'StartDateTime',
			'enddatetime' => 'EndDateTime',
		];
	}
}
