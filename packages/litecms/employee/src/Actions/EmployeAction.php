<?php

namespace Litecms\Employee\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Litepie\Actions\Concerns\AsAction;
use Litecms\Employee\Models\Employe;


class EmployeAction
{
    use AsAction;

    protected $model;
    protected $namespace = 'litecms.employee.employe';
    protected $eventClass = \Litecms\Employee\Events\EmployeAction::class;
    protected $action;
    protected $function;
    protected $request;

    public function handle(string $action, Employe $employe, array $request = [])
    {
        $this->action = $action;
        $this->request = $request;
        $this->model = $employe;
        $this->function = Str::camel($action);
        $this->executeAction();
        return $this->model;

    }


    public function store(Employe $employe, array $request)
    {
        $attributes = $request;
        $attributes['user_id'] = user_id();
        $attributes['user_type'] = user_type();
        $employe = $employe->create($attributes);
        return $employe;
    }

    public function update(Employe $employe, array $request)
    {
        $attributes = $request;
        $employe->update($attributes);
        return $employe;
    }

    public function destroy(Employe $employe, array $request)
    {
        $employe->delete();
        return $employe;
    }

    public function copy(Employe $employe, array $request)
    {
        $count = $request['count'] ?: 1;

        if ($count == 1) {
            $employe = $employe->replicate();
            $employe->created_at = Carbon::now();
            $employe->save();
            return $employe;
        }

        for ($i = 1; $i <= $count; $i++) {
            $new = $employe->replicate();
            $new->created_at = Carbon::now();
            $new->save();
        }

        return $employe;
    }


}
