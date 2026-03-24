<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Patient;

class PatientSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Patient $service)
	{
		parent::__construct($service, 'PatientSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function externalId(string $externalId): self
	{
		$externalId = trim($externalId);
		if ($externalId === '') {
			throw new BrightreeException('ExternalID is required', 1003);
		}

		return $this->where('ExternalID', $externalId);
	}

	public function firstName(string $firstName): self
	{
		$firstName = trim($firstName);
		if ($firstName === '') {
			throw new BrightreeException('FirstName is required', 1003);
		}

		return $this->where('FirstName', $firstName);
	}

	public function lastName(string $lastName): self
	{
		$lastName = trim($lastName);
		if ($lastName === '') {
			throw new BrightreeException('LastName is required', 1003);
		}

		return $this->where('LastName', $lastName);
	}

	public function accountNumber(string $accountNumber): self
	{
		$accountNumber = trim($accountNumber);
		if ($accountNumber === '') {
			throw new BrightreeException('AccountNumber is required', 1003);
		}

		return $this->where('AccountNumber', $accountNumber);
	}

	public function branch(?int $id = null, ?string $value = null): self
	{
		return $this->where('Branch', $this->lookup($id, $value));
	}

	public function accountGroup(?int $id = null, ?string $value = null): self
	{
		return $this->where('AccountGroup', $this->lookup($id, $value));
	}

	public function masterFacility(?int $id = null, ?string $value = null): self
	{
		return $this->where('MasterFacility', $this->lookup($id, $value));
	}

	public function deliveryPhone(string $phoneNumber): self
	{
		return $this->where('DeliveryPhone', $this->digitsOnly($phoneNumber));
	}

	public function deliveryFax(string $faxNumber): self
	{
		return $this->where('DeliveryFax', $this->digitsOnly($faxNumber));
	}

	public function ssn(string $ssn): self
	{
		return $this->where('SSN', $this->digitsOnly($ssn));
	}

	public function diabetic(bool $isDiabetic = true): self
	{
		return $this->where('IsDiabetic', $isDiabetic);
	}

	public function deceased(bool $isDeceased = true): self
	{
		return $this->where('IsDeceased', $isDeceased);
	}

	public function user1(string $value): self
	{
		return $this->where('User1', trim($value));
	}

	public function user2(string $value): self
	{
		return $this->where('User2', trim($value));
	}

	public function user3(string $value): self
	{
		return $this->where('User3', trim($value));
	}

	public function user4(string $value): self
	{
		return $this->where('User4', trim($value));
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
			$this->where('LastUpdateDateStart', $start);
		}
		if ($end !== null) {
			$this->where('LastUpdateDateEnd', $end);
		}

		return $this;
	}

	public function dobBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('DateOfBirthDateTimeStart', $start);
		}
		if ($end !== null) {
			$this->where('DateOfBirthDateTimeEnd', $end);
		}

		return $this;
	}

	public function customField(int $fieldStorageNumber, string $value): self
	{
		if (!isset($this->searchRequest['CustomFieldSearchParams'])) {
			$this->searchRequest['CustomFieldSearchParams'] = [];
		}

		$this->searchRequest['CustomFieldSearchParams'][] = [
			'FieldStorageNumber' => $fieldStorageNumber,
			'Value' => $value
		];

		return $this;
	}

	protected function normalizeFieldValue(string $field, $value)
	{
		if (in_array($field, ['DeliveryPhone', 'DeliveryFax', 'SSN'], true) && is_string($value)) {
			return $this->digitsOnly($value);
		}

		return $value;
	}

	protected function fieldAliases(): array
	{
		return [
			'brightreeid' => 'BrightreeID',
			'externalid' => 'ExternalID',
			'firstname' => 'FirstName',
			'lastname' => 'LastName',
			'accountnumber' => 'AccountNumber',
			'deliveryphone' => 'DeliveryPhone',
			'deliveryfax' => 'DeliveryFax',
			'masterfacility' => 'MasterFacility',
			'accountgroup' => 'AccountGroup',
		];
	}

	private function digitsOnly(string $value): string
	{
		$value = preg_replace('/\D+/', '', $value);

		if ($value === '') {
			throw new BrightreeException('A numeric value is required', 1003);
		}

		return $value;
	}
}
