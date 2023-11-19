<?php


return  
    [
        'model' => [
            'model' => \Litecms\Employee\Models\Employee::class,
            'repository' => \Litecms\Employee\Repositories\Eloquent\EmployeeRepository::class,
            'table' => 'employees',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'createdat', 'updated_at'],
            'appends' => [],
            'fillable' => [],
            'translatables' => [],
            'upload_folder' => 'employee/employee',
            'uploads' => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts' => [
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision' => [],
            'perPage' => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'search' => [
            
        ],

        'list' => [
            
        ],

        'form' => [
            
        ],

        'urls' => [
            'new' => [
                'url' => 'employee/employee/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'employee/employee/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'employee/employee',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'employee/employee',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'employee/employee',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'employee/employee',
                'method' => 'DELETE',
            ],
        ],
        'order' => [
            'created_at' => 'employee::employee.label.created_at',
            'name' => 'employee::employee.label.name',
            'status' => 'employee::employee.label.status',
        ],
        'groups' => [
            'main' => 'employee::employee.groups.main',
            'details' => 'employee::employee.groups.details',
            'images' => 'employee::employee.groups.images',
            'settings' => 'employee::employee.groups.settings',
        ],
        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Employee',
            'module' => 'Employee',
        ],
    ];
