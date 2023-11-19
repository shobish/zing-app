<?php

namespace Litecms\Employee;

use User;

class Employees
{
    /**
     * $employee object.
     */
    protected $employee;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->employee = $employee;
    }

    /**
     * Returns count of employee.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Find employee by slug.
     *
     * @param array $filter
     *
     * @return int
     */
    public function employee($slug)
    {
        return  $this->employee
            ->findBySlug($slig)
            ->toArray();
    }
}
