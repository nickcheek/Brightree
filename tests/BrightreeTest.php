<?php

namespace Nickcheek\Brightree\Tests;

use Nickcheek\Brightree\Brightree;
use PHPUnit\Framework\TestCase;

class BrightreeTest extends TestCase
{
    protected object $bt;

    protected function setUp(): void
    {
       $this->bt =  new Brightree('Username','Password');
    }

    public function test_child_class_receives_info_variable()
    {
        $this->assertObjectHasAttribute('info',$this->bt->Patient());
    }


}
