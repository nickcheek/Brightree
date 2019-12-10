<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;

class Invoice extends Brightree
{
    use \Nickcheek\Brightree\Traits\ApiCall;

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
     * @param array $query
     * @return object
     */
    public function InvoiceItemUpdate(array $query): object
    {
        return $this->apiCall('InvoiceItemUpdate',$query);
    }

    /**
     * @param array $query
     * @return object
     */
    public function InvoiceUpdate(array $query): object 
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
     * @param array $query
     * @return object
     */
    public function ResubmitInvoices(array $query): object
    {
        return $this->apiCall('ResubmitInvoices',$query);
    }
}