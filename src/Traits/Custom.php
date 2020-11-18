<?php

namespace Nickcheek\Brightree\Traits;

trait Custom {
    use \Nickcheek\Brightree\Traits\ApiCall;

    public function Custom($service, $object) : object
    {
        return $this->ApiCall($service, $object);
    }
}