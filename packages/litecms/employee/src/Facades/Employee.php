<?php

namespace Litecms\Employee\Facades;

use Illuminate\Support\Facades\Facade;

class Employee extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'litecms.employee';
    }
}
