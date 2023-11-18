<?php

namespace Litecms\Employee\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use App\Http\Requests\PublicRequest;
use Litepie\Database\RequestScope;
use Litecms\Employee\Http\Resources\EmployeeResource;
use Litecms\Employee\Http\Resources\EmployeesCollection;
use Litecms\Employee\Scopes\EmployePublicScope;
use Litecms\Employee\Models\Employe;

class EmployePublicController extends BaseController
{

    /**
     * Show employe's list.
     *
     * @return response
     */
    protected function index(PublicRequest $request)
    {

        $search = $request->search;
        $pageLimit = $request->input('pageLimit', config('database.pagination.limit'));
        $page = Employe::pushScope(new RequestScope())
            ->pushScope(new EmployePublicScope())
            ->paginate($pageLimit)
            ->withQueryString();

        $employes = new EmployesCollection($page);

        $categories = [];
        $tags = [];
        $recent = [];

        return $this->response->setMetaTitle(trans('employee::employe.names'))
            ->view('employee::public.employe.index')
            ->data(compact('employes', 'categories', 'tags', 'recent'))
            ->output();
    }

    /**
     * Show employe.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(PublicRequest $request, $slug)
    {
        $model = Employe::findBySlug($slug);
        $data = new EmployeResource($model);

        $categories = [];
        $tags = [];
        $recent = [];
    
        return $this->response->setMetaTitle($data['title'] . trans('employee::employe.name'))
            ->view('employee::public.employe.show')
            ->data(compact('data', 'categories', 'tags', 'recent'))
            ->output();
    }

}
