<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\Doctor;

class DoctorSearchBuilder extends AbstractSearchBuilder
{
	public function __construct(Doctor $service)
	{
		parent::__construct($service, 'DoctorSearch');
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
		return $this->where('FirstName', trim($firstName));
	}

	public function lastName(string $lastName): self
	{
		$lastName = trim($lastName);
		if ($lastName === '') {
			throw new BrightreeException('LastName is required', 1003);
		}

		return $this->where('LastName', $lastName);
	}

	public function fullName(string $fullName): self
	{
		$fullName = trim($fullName);
		if ($fullName === '') {
			throw new BrightreeException('FullName is required', 1003);
		}

		return $this->where('FullName', $fullName);
	}

	public function deaNumber(string $value): self
	{
		return $this->where('DEANumber', trim($value));
	}

	public function licenseNumber(string $value): self
	{
		return $this->where('LicenseNumber', trim($value));
	}

	public function npi(string $value): self
	{
		return $this->where('NPI', preg_replace('/\D+/', '', $value));
	}

	public function upin(string $value): self
	{
		return $this->where('UPIN', trim($value));
	}

	public function phoneNumber(string $value): self
	{
		return $this->where('PhoneNumber', preg_replace('/\D+/', '', $value));
	}

	public function faxNumber(string $value): self
	{
		return $this->where('FaxNumber', preg_replace('/\D+/', '', $value));
	}

	public function address1(string $value): self
	{
		return $this->where('Address1', trim($value));
	}

	public function address2(string $value): self
	{
		return $this->where('Address2', trim($value));
	}

	public function city(string $value): self
	{
		return $this->where('City', trim($value));
	}

	public function zipCode(string $value): self
	{
		return $this->where('ZipCode', trim($value));
	}

	public function inactive(bool $value = true): self
	{
		return $this->where('Inactive', $value);
	}

	public function doctorGroup(?int $id = null, ?string $value = null): self
	{
		return $this->where('DoctorGroup', $this->lookup($id, $value));
	}

	public function facility(?int $id = null, ?string $value = null): self
	{
		return $this->where('Facility', $this->lookup($id, $value));
	}

	public function marketingRep(?int $id = null, ?string $value = null): self
	{
		return $this->where('MarketingRep', $this->lookup($id, $value));
	}

	public function state(?int $id = null, ?string $value = null): self
	{
		return $this->where('State', $this->lookup($id, $value));
	}

	public function user1(string $value): self
	{
		return $this->where('User1', trim($value));
	}

	public function user2(string $value): self
	{
		return $this->where('User2', trim($value));
	}

	public function licenseExpirationBetween(?string $start = null, ?string $end = null): self
	{
		if ($start !== null) {
			$this->where('LicenseExpirationStart', $start);
		}
		if ($end !== null) {
			$this->where('LicenseExpirationEnd', $end);
		}

		return $this;
	}
}
