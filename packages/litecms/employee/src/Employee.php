<?php

namespace Litecms\Employee;

use Litecms\Employee\Actions\EmployeActions;


class Employee
{
    /**
     * Return select options employee for the module.
     *
     * @param string $module
     * @param array $request
     *
     * @return array
     */
    public function options($module = 'employee', $request = []) :array
    {
        if ($module == 'employee') {
            return EmployeeActions::run('options', $request);
        }

    }
}
