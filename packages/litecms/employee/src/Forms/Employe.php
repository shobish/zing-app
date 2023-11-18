<?php

namespace Litecms\Employee\Forms;

use Litepie\Form\FormInterpreter;

class Employe extends FormInterpreter
{

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public static function setAttributes()
    {

        self::$urls = config('litecms.employee.employe.urls');

        self::$search = config('litecms.employee.employe.search');

        self::$orderBy = config('litecms.employee.employe.order');

        self::$groups =  config('litecms.employee.employe.groups');

        self::$list =  config('litecms.employee.employe.list');

        self::$fields = config('litecms.employee.employe.form');

        return new static();
    }
}
