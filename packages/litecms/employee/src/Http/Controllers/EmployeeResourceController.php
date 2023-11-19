<?php

namespace Litecms\Employee\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litepie\Database\RequestScope;
use Litecms\Employee\Forms\Employee as EmployeeForm;
use Litecms\Employee\Http\Requests\EmployeeRequest;
use Litecms\Employee\Http\Resources\EmployeeResource;
use Litecms\Employee\Http\Resources\EmployeesCollection;
use Litecms\Employee\Models\Employee;
use Litecms\Employee\Scopes\EmployeeResourceScope;


/**
 * Resource controller class for employee.
 */
class EmployeeResourceController extends BaseController
{

    /**
     * Initialize employee resource controller.
     *
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        // $this->form = EmployeeForm::grouped(false)
        //     ->setAttributes()
        //     ->toArray();
        $this->modules = $this->modules(config('litecms.employee.modules'), 'employee', guard_url('employee'));
    }

    /**
     * Display a list of employee.
     *
     * @return Response
     */
    public function index(EmployeeRequest $request)
    {

        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $page = Employee::pushScope(new RequestScope())
            ->pushScope(new EmployeeResourceScope())
            ->simplePaginate($pageLimit);

        $data = new EmployeesCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('employee::employee.names'))
            ->view('employee::employee.index')
            ->data(compact('data', 'modules', 'form'))
            ->output();
    }

    /**
     * Display employee.
     *
     * @param Request $request
     * @param Model   $employee
     *
     * @return Response
     */
    public function show(EmployeeRequest $request, Employee $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeeResource($model);

        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('employee::employee.name'))
            ->data(compact('data', 'form', 'modules'))
            ->view('employee::employee.show')
            ->output();
    }

    /**
     * Show the form for creating a new employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(EmployeeRequest $request, Employee $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeeResource($model);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('employee::employee.name'))
            ->view('employee::employee.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();
    }

    /**
     * Create new employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(EmployeeRequest $request, Employee $model)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $model = $model->create($attributes);
            $data = new EmployeeResource($model);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('employee::employee.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('employee/employee/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/employee/employee'))
                ->redirect();
        }
    }

    /**
     * Show employee for editing.
     *
     * @param Request $request
     * @param Model   $employee
     *
     * @return Response
     */
    public function edit(EmployeeRequest $request, Employee $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeeResource($model);

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('employee::employee.name'))
            ->view('employee::employee.edit')
            ->data(compact('data', 'form', 'modules'))
            ->output();
    }

    /**
     * Update the employee.
     *
     * @param Request $request
     * @param Model   $employee
     *
     * @return Response
     */
    public function update(EmployeeRequest $request, Employee $model)
    {
        try {
            $attributes = $request->all();
            $model = $model->update($attributes);
            $data = new EmployeeResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('employee::employee.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('employee/employee/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('employee/employee/' .  $model->getRouteKey()))
                ->redirect();
        }
    }

    /**
     * Remove the employee.
     *
     * @param Model   $employee
     *
     * @return Response
     */
    public function destroy(EmployeeRequest $request, Employee $model)
    {
        try {
            $model->delete();
            $data = new EmployeeResource($model);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('employee::employee.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('employee/employee/0'))
                ->redirect();
        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('employee/employee/' .  $model->getRouteKey()))
                ->redirect();
        }
    }
    public function indexView()
    {
        return $this->response
            ->view('employee::default.employee.employee')
            ->theme('employee')
            ->layout('home')
            ->output();
    }
    public function addProduct(Request $request)
    {
        dd($request->all());
    }
}
