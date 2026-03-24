<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Insurance;

class CommercialEligibilityPayerSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Insurance $service)
	{
		parent::__construct($service, 'CommercialEligibilityPayerSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('CommercialEligibilityPayerBrightreeID', $id);
	}

	public function payerMnemonic(string $value): self
	{
		return $this->where('PayerMnemonic', trim($value));
	}

	public function payerName(string $value): self
	{
		return $this->where('PayerName', trim($value));
	}
}
