<?php

namespace Nickcheek\Brightree\Tests;

use Nickcheek\Brightree\Brightree;
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    protected object $brightree;

    protected function setUp(): void
    {
        $this->brightree = new Brightree('Username','Password');
    }

    public function test_patient_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Patient());
    }

    public function test_doctor_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Doctor());
    }

    public function test_custom_field_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->CustomField());
    }

    public function test_pickup_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Pickup());
    }

    public function test_sales_order_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->SalesOrder());
    }

    public function test_pricing_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Pricing());
    }

    public function test_security_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Security());
    }

    public function test_documentation_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Documentation());
    }

    public function test_document_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Document());
    }

    public function test_insurance_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Insurance());
    }

    public function test_inventory_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Inventory());
    }

    public function test_reference_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Reference());
    }

    public function test_invoice_class_returns_object(): void
    {
        $this->assertIsObject($this->brightree->Invoice());
    }

}