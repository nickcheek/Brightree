<?php

namespace Nickcheek\Brightree;

use Nickcheek\Brightree\Service\Invoice;
use Nickcheek\Brightree\Service\Patient;
use Nickcheek\Brightree\Service\Doctor;
use Nickcheek\Brightree\Service\Document;
use Nickcheek\Brightree\Service\Documentation;
use Nickcheek\Brightree\Service\CustomField;
use Nickcheek\Brightree\Service\Insurance;
use Nickcheek\Brightree\Service\Inventory;
use Nickcheek\Brightree\Service\Pricing;
use Nickcheek\Brightree\Service\Reference;
use Nickcheek\Brightree\Service\Pickup;
use Nickcheek\Brightree\Service\SalesOrder;
use Nickcheek\Brightree\Service\Security;
use Nickcheek\Brightree\Helpers\arrayHelper;

class Brightree extends arrayHelper
{
    protected string $wsdl;
    public object $info;
    protected object $config;
    protected array $options;

    public function __construct(string $username, string $password)
    {
        $this->config = include('Config/config.php');
        $this->info = (object)['username'=>$username,'password'=>$password,'Config'=>$this->config];
    }

    public function Patient(): object
    {
        return new Patient($this->info);
    }

    public function Doctor(): object
    {
        return new Doctor($this->info);
    }

    public function Document(): object
    {
        return new Document($this->info);
    }

    public function Documentation(): object
    {
        return new Documentation($this->info);
    }

    public function CustomField(): object
    {
        return new CustomField($this->info);
    }

    public function Insurance(): object
    {
        return new Insurance($this->info);
    }

    public function Inventory(): object
    {
        return new Inventory($this->info);
    }

    public function Pickup(): object
    {
        return new Pickup($this->info);
    }

    public function Reference(): object
    {
        return new Reference($this->info);
    }

    public function SalesOrder(): object
    {
        return new SalesOrder($this->info);
    }

    public function Pricing(): object
    {
        return new Pricing($this->info);
    }

    public function Security(): object
    {
        return new Security($this->info);
    }

    public function Invoice(): object
    {
        return new Invoice($this->info);
    }

}
