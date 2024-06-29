<?php

namespace Nickcheek\Brightree\Traits;

trait Custom {
    use ApiCall;

    public function Custom($service, $object) : object
    {
        return $this->ApiCall($service, $object);
    }
}