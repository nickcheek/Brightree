<?php

namespace Nickcheek\Brightree\Tests;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Service\Doctor;
use Nickcheek\Brightree\Service\Patient;
use PHPUnit\Framework\TestCase;

class BrightreeTest extends TestCase
{
    protected object $brightree;
    protected array $arr;

    protected function setUp(): void
    {
       $this->brightree =  new Brightree('Username','Password');
       $this->arr = ['mySearch'=>'mySearch'];
    }

    public function test_class_receives_info_variable(): void
    {
        $this->assertObjectHasProperty('info',$this->brightree);
    }

    public function test_child_class_can_reach_info_variable(): void
    {
        $this->assertObjectHasProperty('info',$this->brightree->Patient());
    }

    public function test_array_builder_builds_sort_method(): void
    {
        $this->assertArrayHasKey('SortParams',$this->brightree->search($this->arr)->build());
    }

    public function test_array_builder_can_change_sort_name(): void
    {
        $sort = ['sortName'=>['sort'=>'bythis']];
        $this->assertArrayHasKey('sortName', $this->brightree->search($this->arr)->sort($sort)->build());
    }

    public function test_array_builder_builds_page_method(): void
    {
        $this->assertArrayHasKey('page', $this->brightree->search($this->arr)->build());
    }

    public function test_array_builder_builds_pageSize_method(): void
    {
        $this->assertArrayHasKey('pageSize', $this->brightree->search($this->arr)->build());
    }

    public function test_array_builder_returns_array()
    {
        $this->assertIsArray($this->brightree->search($this->arr)->build());
    }


	public function test_new_instance_initializes_properties() {
		$brightree = new Brightree('username', 'password');
		$this->assertInstanceOf(Brightree::class, $brightree);
		$this->assertObjectHasProperty('config', $brightree);
		$this->assertObjectHasProperty('info', $brightree);
	}

	public function test_calling_patient_returns_patient_instance() {
		$brightree = new Brightree('username', 'password');
		$patient = $brightree->Patient();
		$this->assertInstanceOf(Patient::class, $patient);
	}

	public function test_calling_doctor_returns_doctor_instance() {
		$brightree = new Brightree('username', 'password');
		$doctor = $brightree->Doctor();
		$this->assertInstanceOf(Doctor::class, $doctor);
	}

}
