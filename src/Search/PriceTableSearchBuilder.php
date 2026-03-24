<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Insurance;

class PriceTableSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Insurance $service)
	{
		parent::__construct($service, 'PriceTableSearch');
	}

	public function priceTableType($value): self
	{
		return $this->where('PriceTableType', $value);
	}

	public function state(string $value): self
	{
		return $this->where('State', trim($value));
	}
}
