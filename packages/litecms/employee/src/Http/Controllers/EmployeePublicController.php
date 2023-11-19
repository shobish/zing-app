<?php

namespace Litecms\Employee\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use App\Http\Requests\PublicRequest;
use Litepie\Database\RequestScope;
use Litecms\Employee\Http\Resources\EmployeeResource;
use Litecms\Employee\Http\Resources\EmployeesCollection;
use Litecms\Employee\Scopes\EmployeePublicScope;
use Litecms\Employee\Models\Employee;

class EmployeePublicController extends BaseController
{

    /**
     * Show employee's list.
     *
     * @return response
     */
    protected function index(PublicRequest $request)
    {

        $search = $request->search;
        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $page = Employee::pushScope(new RequestScope())
            ->pushScope(new EmployeePublicScope())
            ->select('employees.*')
            ->paginate($pageLimit)
            ->withQueryString();

        $data = new EmployeesCollection($page);

        $categories = [];
        $tags = [];
        $recent = [];

        return $this->response->setMetaTitle(trans('employee::employee.names'))
            ->view('employee::public.employee.index')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

    /**
     * Show employee.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(PublicRequest $request, $slug)
    {
        $model = Employee::findBySlug($slug);
        $data = new EmployeeResource($model);

        $categories = [];
        $tags = [];
        $recent = [];

        return $this->response->setMetaTitle($data['title'] . trans('employee::employee.name'))
            ->view('employee::public.employee.show')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }
}
