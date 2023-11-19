<?php

namespace Litecms\Employee\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeesCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return ['data' => $this->collection];
    }
}
