<?php

namespace Nickcheek\Brightree;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nickcheek\Brightree\Skeleton\SkeletonClass
 */
class BrightreeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'brightree';
    }
}
