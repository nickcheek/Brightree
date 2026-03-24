<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Document;

class DocumentSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Document $service, string $operation = 'DocumentSearch')
	{
		parent::__construct($service, $operation);
	}

	public function branchKey(int $value): self
	{
		return $this->where('BranchKey', $value);
	}

	public function documentBatchKey(int $value): self
	{
		return $this->where('DocumentBatchKey', $value);
	}

	public function documentReviewStatusKey(int $value): self
	{
		return $this->where('DocumentReviewStatusKey', $value);
	}

	public function documentTypeKey(int $value): self
	{
		return $this->where('DocumentTypeKey', $value);
	}

	public function externalDocumentId(string $value): self
	{
		return $this->where('ExternalDocumentID', trim($value));
	}

	public function patientAccountNumber(string $value): self
	{
		return $this->where('PatientAccountNumber', trim($value));
	}

	public function patientExternalId(string $value): self
	{
		return $this->where('PatientExternalID', trim($value));
	}

	public function patientId(int $value): self
	{
		return $this->where('PatientID', $value);
	}

	public function patientKey(int $value): self
	{
		return $this->where('PatientKey', $value);
	}

	public function salesOrderKey(int $value): self
	{
		return $this->where('SalesOrderKey', $value);
	}

	public function documentDateBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('DocumentDateFrom', $start);
		}
		if ($end !== null) {
			$this->where('DocumentDateTo', $end);
		}

		return $this;
	}

	public function scannedDateBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('ScannedDateFrom', $start);
		}
		if ($end !== null) {
			$this->where('ScannedDateTo', $end);
		}

		return $this;
	}
}
