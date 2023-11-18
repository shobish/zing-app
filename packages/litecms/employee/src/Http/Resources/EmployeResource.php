<?php

namespace Litecms\Employee\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeResource extends JsonResource
{

    public function itemLink()
    {
        return guard_url('employee/employe') . '/' . $this->getRouteKey();
    }

    public function title()
    {
        if ($this->title != '') {
            return $this->title;
        }

        if ($this->name != '') {
            return $this->name;
        }

        return 'None';
    }

    public function toArray($request)
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'slug' => $this->slug,
            'Name' => $this->Name,
            'Email' => $this->Email,
            'Password' => $this->Password,
            'Employee_id' => $this->Employee_id,
            'Category' => $this->Category,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
                'workflow' => $this->workflows(),
                'actions' => $this->actions(),
            ],
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param     \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
                'workflow' => $this->workflows(),
                'actions' => $this->actions(),
            ],
        ];
    }

    /**
     * Get the workflows for the resource.
     *
     * @return array
     */
    private function workflows()
    {
        $arr = [];
                return $arr;

    }
    
    /**
     * Get the actions for the resource.
     *
     * @return array
     */
    private function actions()
    {

        $arr = [];
        
        return $arr;
    }
}
