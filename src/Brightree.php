<?php

namespace Nickcheek\Brightree;

use Nickcheek\Brightree\Service\Patient;
use Nickcheek\Brightree\Service\Doctor;
use Nickcheek\Brightree\Service\Document;
use Nickcheek\Brightree\Service\DocumentManagement;
use Nickcheek\Brightree\Service\CustomField;
use Nickcheek\Brightree\Service\Insurance;
use Nickcheek\Brightree\Service\Inventory;
use Nickcheek\Brightree\Service\Pricing;
use Nickcheek\Brightree\Service\Reference;
use Nickcheek\Brightree\Service\Pickup;
use Nickcheek\Brightree\Service\SalesOrder;
use Nickcheek\Brightree\Service\Security;

class Brightree
{
    protected $config;

    public function __construct()
    {
        $this->config = include('config/config.php');
    }

    public function Patient()
    {
    	return new Patient();
    }
	
	public function Document()
    {
    	return new Document();
    }
    
	public function DocumentManagement()
    {
    	return new DocumentManagement();
    }
    
    public function CustomField()
    {
    	return new CustomField();
    }
    
    public function Insurance()
    {
    	return new Insurance();
    }

    public function Doctor()
    {
    	return new Doctor();
    }

    public function Inventory()
    {
    	return new Inventory();
    }

    public function Pickup()
    {
    	return new Pickup();
    }

    public function Reference()
    {
    	return new Reference();
    }

    public function SalesOrder()
    {
    	return new SalesOrder();
    }

    public function Pricing()
    {
        return new Pricing();
    }

    public function Security()
    {
        return new Security();
    }
        
}
