<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Patient;

class PatientPhoneSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Patient $service)
	{
		parent::__construct($service, 'PatientPhoneNumberSearch');
	}

	public function brightreeId(int $id): self
	{
		return $this->where('BrightreeID', $id);
	}

	public function externalId(string $externalId): self
	{
		return $this->where('ExternalID', trim($externalId));
	}

	public function fullName(string $fullName): self
	{
		return $this->where('FullName', trim($fullName));
	}

	public function phoneNumber(string $phoneNumber): self
	{
		return $this->where('PhoneNumber', $this->digitsOnly($phoneNumber));
	}

	public function phoneType($phoneType): self
	{
		return $this->where('PhoneType', $phoneType);
	}

	protected function normalizeFieldValue(string $field, $value)
	{
		if ($field === 'PhoneNumber' && is_string($value)) {
			return $this->digitsOnly($value);
		}

		return $value;
	}

	protected function fieldAliases(): array
	{
		return [
			'brightreeid' => 'BrightreeID',
			'externalid' => 'ExternalID',
			'fullname' => 'FullName',
			'phonenumber' => 'PhoneNumber',
			'phonetype' => 'PhoneType',
		];
	}

	private function digitsOnly(string $value): string
	{
		$value = preg_replace('/\D+/', '', $value);

		if ($value === '') {
			throw new BrightreeException('PhoneNumber is required', 1003);
		}

		return $value;
	}
}
