<?php

namespace Litecms\Employee\Http\Controllers;

use Exception;
use Litepie\Http\Controllers\ResourceController as BaseController;
use Litecms\Employee\Forms\Employe as EmployeForm;
use Litecms\Employee\Http\Requests\EmployeResourceRequest;
use Litecms\Employee\Http\Resources\EmployeResource;
use Litecms\Employee\Http\Resources\EmployesCollection;
use Litecms\Employee\Models\Employe;
use Litecms\Employee\Actions\EmployeAction;
use Litecms\Employee\Actions\EmployeActions;


/**
 * Resource controller class for employe.
 */
class EmployeResourceController extends BaseController
{

    /**
     * Initialize employe resource controller.
     *
     *
     * @return null
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->form = EmployeForm::grouped(false)
                            ->setAttributes()
                            ->toArray();
            $this->modules = $this->modules(config('litecms.employee.modules'), 'employee', guard_url('employee'));
            return $next($request);
        });
    }

    /**
     * Display a list of employe.
     *
     * @return Response
     */
    public function index(EmployeResourceRequest $request)
    {
        $request = $request->all();
        $page = EmployeActions::run('paginate', $request);

        $data = new EmployesCollection($page);

        $form = $this->form;
        $modules = $this->modules;

        return $this->response->setMetaTitle(trans('employee::employe.names'))
            ->view('employee::employe.index')
            ->data(compact('data', 'modules', 'form'))
            ->output();

    }

    /**
     * Display employe.
     *
     * @param Request $request
     * @param Model   $employe
     *
     * @return Response
     */
    public function show(EmployeResourceRequest $request, Employe $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeResource($model);
        return $this->response
            ->setMetaTitle(trans('app.view') . ' ' . trans('employee::employe.name'))
            ->data(compact('data', 'form', 'modules'))
            ->view('employee::employe.show')
            ->output();
    }

    /**
     * Show the form for creating a new employe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(EmployeResourceRequest $request, Employe $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeResource($model);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('employee::employe.name'))
            ->view('employee::employe.create')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Create new employe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(EmployeResourceRequest $request, Employe $model)
    {
        try {
            $request = $request->all();
            $model = EmployeAction::run('store', $model, $request);
            $data = new EmployeResource($model);
            return $this->response->message(trans('messages.success.created', ['Module' => trans('employee::employe.name')]))
                ->code(204)
                ->data(compact('data'))
                ->status('success')
                ->url(guard_url('employee/employe/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/employee/employe'))
                ->redirect();
        }

    }

    /**
     * Show employe for editing.
     *
     * @param Request $request
     * @param Model   $employe
     *
     * @return Response
     */
    public function edit(EmployeResourceRequest $request, Employe $model)
    {
        $form = $this->form;
        $modules = $this->modules;
        $data = new EmployeResource($model);
        // return view('employee::employe.edit', compact('data', 'form', 'modules'));

        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('employee::employe.name'))
            ->view('employee::employe.edit')
            ->data(compact('data', 'form', 'modules'))
            ->output();

    }

    /**
     * Update the employe.
     *
     * @param Request $request
     * @param Model   $employe
     *
     * @return Response
     */
    public function update(EmployeResourceRequest $request, Employe $model)
    {
        try {
            $request = $request->all();
            $model = EmployeAction::run('update', $model, $request);
            $data = new EmployeResource($model);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('employee::employe.name')]))
                ->code(204)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('employee/employe/' . $model->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('employee/employe/' .  $model->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the employe.
     *
     * @param Model   $employe
     *
     * @return Response
     */
    public function destroy(EmployeResourceRequest $request, Employe $model)
    {
        try {

            $request = $request->all();
            $model = EmployeAction::run('destroy', $model, $request);
            $data = new EmployeResource($model);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('employee::employe.name')]))
                ->code(202)
                ->status('success')
                ->data(compact('data'))
                ->url(guard_url('employee/employe/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('employee/employe/' .  $model->getRouteKey()))
                ->redirect();
        }

    }
}
