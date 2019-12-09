<?php

namespace Nickcheek\Brightree\Tests;

use Nickcheek\Brightree\Brightree;
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

    public function test_class_receives_info_variable()
    {
        $this->assertObjectHasAttribute('info',$this->brightree);
    }

    public function test_child_class_can_reach_info_variable()
    {
        $this->assertObjectHasAttribute('info',$this->brightree->Patient());
    }

    public function test_array_builder_response_is_array()
    {
        $array = $this->brightree->search($this->arr)->build();
        $this->assertIsArray($array);
    }

    public function test_array_builder_builds_sort_method()
    {
        $this->assertArrayHasKey('SortParams',$this->brightree->search($this->arr)->build());
    }

    public function test_array_builder_can_change_sort_name()
    {
        $sort = ['sortName'=>['sort'=>'bythis']];
        $this->assertArrayHasKey('sortName', $this->brightree->search($this->arr)->sort($sort)->build());
    }

    public function test_array_builder_builds_page_method()
    {
        $this->assertArrayHasKey('page', $this->brightree->search($this->arr)->build());
    }

    public function test_array_builder_builds_pageSize_method()
    {
        $this->assertArrayHasKey('pageSize', $this->brightree->search($this->arr)->build());
    }
}
