<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Invoice extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'InvoiceItemUpdate' => true,
		'InvoiceUpdate' => true,
		'ResubmitInvoices' => true
	];

	protected array $specialMethods = [
		'InvoiceCreatePrintActivity' => ['BrightreeID'],
		'InvoiceFetchByBrightreeID' => ['BrightreeID'],
		'InvoiceFetchByInvoiceID' => ['InvoiceID'],
		'OpenInvoiceAgedBalanceFetchByPatient' => ['PatientBrightreeID'],
		'OpenInvoiceBalanceFetchByPatient' => ['PatientBrightreeID']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['invoice'])) {
				throw BrightreeException::configError('Invoice service URL not configured');
			}

			$this->wsdl = $this->info->config->service['invoice'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['invoice'],
				'location' => $this->info->config->service['invoice'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Invoice service: ' . $e->getMessage(), 0, $e);
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

	public function InvoiceFetchByBrightreeID(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('InvoiceFetchByBrightreeID', ['BrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'InvoiceFetchByBrightreeID', 'BrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching invoice by Brightree ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function InvoiceFetchByInvoiceID(int $InvoiceID): object
	{
		try {
			if ($InvoiceID <= 0) {
				throw new BrightreeException("Invalid Invoice ID: $InvoiceID", 1003);
			}
			return $this->apiCall('InvoiceFetchByInvoiceID', ['InvoiceID' => $InvoiceID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'InvoiceFetchByInvoiceID', 'InvoiceID' => $InvoiceID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching invoice by Invoice ID: " . $e->getMessage(), 0, $e);
		}
	}

	public function OpenInvoiceBalanceFetchByPatient(int $BrightreeID): object
	{
		try {
			if ($BrightreeID <= 0) {
				throw new BrightreeException("Invalid Patient Brightree ID: $BrightreeID", 1003);
			}
			return $this->apiCall('OpenInvoiceBalanceFetchByPatient', ['PatientBrightreeID' => $BrightreeID]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'OpenInvoiceBalanceFetchByPatient', 'PatientBrightreeID' => $BrightreeID]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching open invoice balance by patient: " . $e->getMessage(), 0, $e);
		}
	}
}