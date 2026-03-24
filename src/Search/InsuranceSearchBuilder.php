<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Insurance;

class InsuranceSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Insurance $service, string $operation = 'InsuranceSearch')
	{
		parent::__construct($service, $operation);
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function insuranceId(int $id): self
	{
		return $this->where('InsuranceID', $id);
	}

	public function externalId(string $value): self
	{
		$value = trim($value);
		if ($value === '') {
			throw new BrightreeException('ExternalID is required', 1003);
		}

		return $this->where('ExternalID', $value);
	}

	public function insuranceName(string $value): self
	{
		return $this->where('InsuranceName', trim($value));
	}

	public function address(string $value): self
	{
		return $this->where('Address', trim($value));
	}

	public function city(string $value): self
	{
		return $this->where('City', trim($value));
	}

	public function inactive(bool $value = true): self
	{
		return $this->where('Inactive', $value);
	}

	public function company(?int $id = null, ?string $value = null): self
	{
		return $this->where('Company', $this->lookup($id, $value));
	}

	public function group(?int $id = null, ?string $value = null): self
	{
		return $this->where('Group', $this->lookup($id, $value));
	}

	public function planType(?int $id = null, ?string $value = null): self
	{
		return $this->where('PlanType', $this->lookup($id, $value));
	}

	public function priceTable(?int $id = null, ?string $value = null): self
	{
		return $this->where('PriceTable', $this->lookup($id, $value));
	}

	public function state(?int $id = null, ?string $value = null): self
	{
		return $this->where('State', $id === null && $value !== null ? $value : $this->lookup($id, $value));
	}

	public function coverageType($value): self
	{
		return $this->where('CoverageType', $value);
	}
}
