<?php

namespace Litecms\Employee\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Litecms\Employee\Models\Employe;

class EmployePolicy
{


    /**
     * Determine if the given user can view the employe.
     *
     * @param Authenticatable $user
     * @param Employe $employe
     *
     * @return bool
     */
    public function view(Authenticatable $user, Employe $employe)
    {
        if ($authUser->canDo('employee.employe.view') && $authUser->isAdmin() || $user->isClient()) {
            return true;
        }

        return $employe->is_owner;
    }

    /**
     * Determine if the given user can create a employe.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function create(Authenticatable $user)
    {
        return  $authUser->canDo('employee.employe.create');
    }

    /**
     * Determine if the given user can update the given employe.
     *
     * @param Authenticatable $user
     * @param Employe $employe
     *
     * @return bool
     */
    public function update(Authenticatable $user, Employe $employe)
    {
        if ($user->canDo('employee.employe.edit') && $user->isAdmin()) {
            return true;
        }

        return $employe->is_owner;
    }

    /**
     * Determine if the given user can delete the given employe.
     *
     * @param Authenticatable $user
     *
     * @return bool
     */
    public function destroy(Authenticatable $user, Employe $employe)
    {
        return $employe->is_owner;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
