<?php

namespace Litecms\Employee\Forms;

use Litepie\Form\FormInterpreter;

class Employee extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = config('litecms.employee.employee.urls');

        self::$search = config('litecms.employee.employee.search');

        self::$orderBy = config('litecms.employee.employee.order');

        self::$groups =  config('litecms.employee.employee.groups');

        self::$list =  config('litecms.employee.employee.list');

        self::$fields = config('litecms.employee.employee.form');

        return new static();
    }
}
