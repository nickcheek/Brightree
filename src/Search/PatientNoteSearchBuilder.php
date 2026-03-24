<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Service\Patient;

class PatientNoteSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Patient $service)
	{
		parent::__construct($service, 'PatientNoteSearch');
	}

	public function patient(int $patientId): self
	{
		return $this->where('Patient', $patientId);
	}

	public function patientNoteKey(int $patientNoteKey): self
	{
		return $this->where('PatientNoteKey', $patientNoteKey);
	}

	public function branch(int $branch): self
	{
		return $this->where('Branch', $branch);
	}

	public function assignedTo(int $userId): self
	{
		return $this->where('AssignedTo', $userId);
	}

	public function createdBy(int $userId): self
	{
		return $this->where('CreatedBy', $userId);
	}

	public function reason(int $reason): self
	{
		return $this->where('Reason', $reason);
	}

	public function status(int $status): self
	{
		return $this->where('Status', $status);
	}

	public function userDefined1(string $value): self
	{
		return $this->where('UserDefined1', trim($value));
	}

	public function userDefined2(string $value): self
	{
		return $this->where('UserDefined2', trim($value));
	}

	public function actualBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('ActualDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('ActualDateTimeEnd', $end);
		}

		return $this;
	}

	public function closedBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('ClosedDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('ClosedDateTimeEnd', $end);
		}

		return $this;
	}

	public function createdBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('CreateDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('CreateDateTimeEnd', $end);
		}

		return $this;
	}

	public function updatedBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('LastUpdateDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('LastUpdateDateTimeEnd', $end);
		}

		return $this;
	}

	public function needBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('NeedDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('NeedDateTimeEnd', $end);
		}

		return $this;
	}

	protected function fieldAliases(): array
	{
		return [
			'assignedto' => 'AssignedTo',
			'createdby' => 'CreatedBy',
			'patientnotekey' => 'PatientNoteKey',
			'userdefined1' => 'UserDefined1',
			'userdefined2' => 'UserDefined2',
		];
	}
}
