<?php

namespace Litecms\Employee\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EmployeResourceScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @param   \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */a
    public function apply(Builder $builder, Model $model)
    {
        $builder = $this->applyStatus($builder);

        if (user()->isSuperuser()) {
            return $this->onlyShowDeletedForSuperuser($builder, $model);
        }

        if (user()->isAdmin()) {
            return $this->onlyShowUsersAndTeams($builder, $model);
        }

        if (user()->isClient()) {
            return $this->onlyShowClients($builder, $model);
        }

        if (user()->isUser()) {
            return $this->onlyShowUsers($builder, $model);
        }

    }

    /**
     * Only show deleted records for superuser.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @param   \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function onlyShowDeletedForSuperuser(Builder $builder, Model $model)
    {
        return $builder->withTrashed();
    }

    /**
     * Only show records for clients.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @param   \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function onlyShowClients(Builder $builder, Model $model)
    {
        return $builder->where('client_id', user_id());
    }

    /**
     * Only show records for users.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @param   \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function onlyShowUsers(Builder $builder, Model $model)
    {
        return $builder
            ->where('user_id', user_id())
            ->where(User::class, user_type());
    }

    /**
     * Only show records for users and teams.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @param   \Illuminate\Database\Eloquent\Model  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function onlyShowUsersAndTeams(Builder $builder, Model $model)
    {
        $teams = user()->teams()->get()->pluck('id')->toArray();
        return $builder->where(
            function ($query) use ($teams) {
                return $query
                    ->whereIn('team_id', $teams)
                    ->orWhere('user_id', user_id());
            }
        );
    }

    /**
     * Apply the status filter to the query builder.
     *
     * @param   \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function applyStatus($builder)
    {
        $status = request()->status;

        if (empty($status)) {
            return $builder;
        }

        switch ($status) {
            case 'draft':
                $builder = $builder->whereIn('status', ['Draft', 'Pending']);
                break;
            case 'approved':
                $builder = $builder->where('status', 'Approved');
                break;
            case 'completed':
                $builder = $builder->where('status', 'completed');
                break;
            case 'archived':
                $builder = $builder->where('status', 'Archived');
                break;
        }

        return $builder;
    }
}