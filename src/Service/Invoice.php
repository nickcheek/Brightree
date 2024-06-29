<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;

class Invoice extends Brightree
{
    use ApiCall;
    use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

    public function __construct(object $info)
    {
        $this->info = $info;
        $this->wsdl = $this->info->config->service['invoice'] .'?singleWsdl';
        $this->options = array('login' => $this->info->username,'password' => $this->info->password,'uri' => $this->info->config->service['invoice'],'location' => $this->info->config->service['invoice'],'trace' => 1);
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function InvoiceCreatePrintActivity(int $BrightreeID): object
    {
        return $this->apiCall('InvoiceCreatePrintActivity',array('BrightreeID'=>$BrightreeID));
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function InvoiceFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('InvoiceFetchByBrightreeID',array('BrightreeID'=>$BrightreeID));
    }

    /**
     * @param int $InvoiceID
     * @return object
     */
    public function InvoiceFetchByInvoiceID(int $InvoiceID): object
    {
        return $this->apiCall('InvoiceFetchByInvoiceID',array('InvoiceID'=>$InvoiceID));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InvoiceItemUpdate(iterable $query): object
    {
        return $this->apiCall('InvoiceItemUpdate',$query);
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function InvoiceUpdate(iterable $query): object 
    {
        return $this->apiCall('InvoiceUpdate',$query);
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function OpenInvoiceAgedBalanceFetchByPatient(int $BrightreeID): object
    {
        return $this->apiCall('OpenInvoiceAgedBalanceFetchByPatient',array('PatientBrightreeID'=>$BrightreeID));
    }

    /**
     * @param int $BrightreeID
     * @return object
     */
    public function OpenInvoiceBalanceFetchByPatient(int $BrightreeID): object
    {
        return $this->apiCall('OpenInvoiceBalanceFetchByPatient',array('PatientBrightreeID'=>$BrightreeID));
    }

    /**
     * @param iterable $query
     * @return object
     */
    public function ResubmitInvoices(iterable $query): object
    {
        return $this->apiCall('ResubmitInvoices',$query);
    }
}