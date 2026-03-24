<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Insurance;

class CommercialPayerSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Insurance $service)
	{
		parent::__construct($service, 'CommercialPayerSearch');
	}

	public function payerId(string $value): self
	{
		return $this->where('PayerID', trim($value));
	}

	public function payerName(string $value): self
	{
		return $this->where('PayerName', trim($value));
	}

	public function lineOfBusinesses($value): self
	{
		return $this->where('LineOfBusinesses', $value);
	}
}
