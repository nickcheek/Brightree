<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Doctor extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'DoctorCreate' => true,
		'DoctorNoteCreate' => true,
		'DoctorNoteUpdate' => true,
		'DoctorSearch' => true,
		'DoctorUpdate' => true,
		'DoctorGroupFetchAll' => [],
		'FacilityFetchAll' => [],
		'FacilityGroupFetchAll' => [],
		'MarketingRepFetchAll' => []
	];

	protected array $specialMethods = [
		'AddDoctorReferralContact' => ['DoctorBrightreeID', 'ReferralContactBrightreeID'],
		'DoctorFetchByBrightreeID' => ['BrightreeID'],
		'DoctorFetchByExternalID' => ['ExternalID'],
		'DoctorNoteFetchByKey' => ['brightreeID'],
		'DoctorNoteFetchByDoctor' => ['brightreeID'],
		'DoctorReferralContactsFetchByDoctorKey' => ['DoctorBrightreeID'],
		'RemoveDoctorReferralContact' => ['DoctorBrightreeID', 'ReferralContactBrightreeID']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['doctor'])) {
				throw BrightreeException::configError('Doctor service URL not configured');
			}

			$this->wsdl = $this->info->config->service['doctor'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['doctor'],
				'location' => $this->info->config->service['doctor'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Doctor service: ' . $e->getMessage(), 0, $e);
		}
	}

	public function __call(string $name, array $arguments): object
	{
		try {
			if (isset($this->methods[$name])) {
				$params = $this->methods[$name] === true ? ($arguments[0] ?? []) : [];

				if ($this->methods[$name] === true && !is_iterable($params)) {
					throw new BrightreeException(sprintf("Method %s requires an iterable parameter", $name), 1002);
				}

				return $this->apiCall($name, $params);
			}

			if (isset($this->specialMethods[$name])) {
				$params = [];
				foreach ($this->specialMethods[$name] as $index => $paramName) {
					if (!isset($arguments[$index])) {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index];
				}
				return $this->apiCall($name, $params);
			}

			throw new \BadMethodCallException("Method $name does not exist");
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => $name, 'params' => $params ?? $arguments]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error calling $name: " . $e->getMessage(), 0, $e);
		}
	}

	public function AddDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
	{
		try {
			return $this->apiCall('AddDoctorReferralContact', [
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'AddDoctorReferralContact',
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error adding doctor referral contact: " . $e->getMessage(), 0, $e);
		}
	}

	public function DoctorCreate(iterable $query): object
	{
		try {
			if (!is_iterable($query)) {
				throw new BrightreeException("DoctorCreate requires an iterable parameter", 1002);
			}
			return $this->apiCall('DoctorCreate', $query);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'DoctorCreate', 'query' => $query]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error creating doctor: " . $e->getMessage(), 0, $e);
		}
	}

	public function DoctorFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			return $this->apiCall('DoctorFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'DoctorFetchByBrightreeID', 'BrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching doctor by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function RemoveDoctorReferralContact(int $DocBrightreeID, int $ReferralBrightreeID): object
	{
		try {
			return $this->apiCall('RemoveDoctorReferralContact', [
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => 'RemoveDoctorReferralContact',
				'DoctorBrightreeID' => $DocBrightreeID,
				'ReferralContactBrightreeID' => $ReferralBrightreeID
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error removing doctor referral contact: " . $e->getMessage(), 0, $e);
		}
	}
}