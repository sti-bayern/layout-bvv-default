<?php

namespace Sti\LayoutBvvDefault\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sti\LayoutBvvDefault\LayoutBvvDefault
 */
class LayoutBvvDefault extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'layout-bvv-default';
    }
}
