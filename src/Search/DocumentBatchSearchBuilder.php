<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Document;

class DocumentBatchSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Document $service)
	{
		parent::__construct($service, 'DocumentBatchSearch');
	}

	public function brightreeId(int $value): self
	{
		return $this->where('BrightreeID', $value);
	}

	public function batchDescription(string $value): self
	{
		return $this->where('BatchDescription', trim($value));
	}

	public function batchName(string $value): self
	{
		return $this->where('BatchName', trim($value));
	}

	public function batchOwnerBrightreeId(int $value): self
	{
		return $this->where('BatchOwnerBrightreeID', $value);
	}

	public function batchOwnerFullName(string $value): self
	{
		return $this->where('BatchOwnerFullName', trim($value));
	}

	public function closed(bool $value = true): self
	{
		return $this->where('Closed', $value);
	}

	public function createdDate(string $value): self
	{
		return $this->where('CreatedDate', $value);
	}
}
