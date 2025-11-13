<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Exceptions\BrightreeException;

class Invoice extends BaseService
{
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