<?php

namespace Litecms\Employee\Policies;

use Litepie\User\Interfaces\UserPolicyInterface;
use Litecms\Employee\Models\Employee;

class EmployeePolicy
{

    /**
     * Determine if the given user can view the employee.
     *
     * @param UserPolicyInterface $authUser
     * @param Employee $employee
     *
     * @return bool
     */
    public function view(UserPolicyInterface $authUser, Employee $employee)
    {
        if ($authUser->canDo('employee.employee.view') && $authUser->isAdmin()) {
            return true;
        }

        return $employee->user_id == user_id() && $employee->user_type == user_type();
    }

    /**
     * Determine if the given user can create a employee.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function create(UserPolicyInterface $authUser)
    {
        return  $authUser->canDo('employee.employee.create');
    }

    /**
     * Determine if the given user can update the given employee.
     *
     * @param UserPolicyInterface $authUser
     * @param Employee $employee
     *
     * @return bool
     */
    public function update(UserPolicyInterface $authUser, Employee $employee)
    {
        if ($authUser->canDo('employee.employee.edit') && $authUser->isAdmin()) {
            return true;
        }

        return $employee->user_id == user_id() && $employee->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given employee.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function destroy(UserPolicyInterface $authUser, Employee $employee)
    {
        return $employee->user_id == user_id() && $employee->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given employee.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function verify(UserPolicyInterface $authUser, Employee $employee)
    {
        if ($authUser->canDo('employee.employee.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given employee.
     *
     * @param UserPolicyInterface $authUser
     *
     * @return bool
     */
    public function approve(UserPolicyInterface $authUser, Employee $employee)
    {
        if ($authUser->canDo('employee.employee.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $authUser    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($authUser, $ability)
    {
        if ($authUser->isSuperuser()) {
            return true;
        }
    }
}
