<?php

namespace Litecms\Employee\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Litecms\Employee\Models\Employe;

class EmployesCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return ['data' => $this->collection];
    }


    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'actions' => $this->actions(),
        ];
    }

    private function actions()
    {

        $arr = [];
                return $arr;
    }
}