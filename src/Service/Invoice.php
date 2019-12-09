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

    public function InvoiceCreatePrintActivity(int $BrightreeID): object
    {
        return $this->apiCall('InvoiceCreatePrintActivity',array('BrightreeID'=>$BrightreeID));
    }

    public function InvoiceFetchByBrightreeID(int $BrightreeID): object
    {
        return $this->apiCall('InvoiceFetchByBrightreeID',array('BrightreeID'=>$BrightreeID));
    }

    public function InvoiceFetchByInvoiceID(int $InvoiceID): object
    {
        return $this->apiCall('InvoiceFetchByInvoiceID',array('InvoiceID'=>$InvoiceID));
    }

    public function InvoiceItemUpdate(array $query): object
    {
        return $this->apiCall('InvoiceItemUpdate',$query);
    }

    public function InvoiceUpdate(array $query): object 
    {
        return $this->apiCall('InvoiceUpdate',$query);
    }

    public function OpenInvoiceAgedBalanceFetchByPatient($BrightreeID): object
    {
        return $this->apiCall('OpenInvoiceAgedBalanceFetchByPatient',array('PatientBrightreeID'=>$BrightreeID));
    }

    public function OpenInvoiceBalanceFetchByPatient($BrightreeID): object
    {
        return $this->apiCall('OpenInvoiceBalanceFetchByPatient',array('PatientBrightreeID'=>$BrightreeID));
    }

    public function ResubmitInvoices(array $query): object
    {
        return $this->apiCall('ResubmitInvoices',$query);
    }
}