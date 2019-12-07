<?php

namespace Nickcheek\Brightree\Tests;

use Nickcheek\Brightree\Brightree;
use PHPUnit\Framework\TestCase;

class BrightreeTest extends TestCase
{
    protected object $brightree;

    protected function setUp(): void
    {
       $this->brightree =  new Brightree('Username','Password');
    }

    public function test_class_receives_info_variable()
    {
        $this->assertObjectHasAttribute('info',$this->brightree);
    }

    public function test_child_class_can_reach_info_variable()
    {
        $this->assertObjectHasAttribute('info',$this->brightree->Patient());
    }

}
