<?php


return  
    [
        'model' => [
            'model' => \Litecms\Employee\Models\Employe::class,
            'table' => 'litecms_employee_employes',
            'hidden'=> [],
            'visible' => [],
            'guarded' => ['*'],
            'slugs' => ['slug' => 'name'],
            'dates' => ['deleted_at', 'created_at', 'updated_at'],
            'appends' => [],
            'fillable' => ['Name',  'Email',  'Password',  'Employee_id',  'Category'],
            'translatables' => [],
            'upload_folder' => 'employee/employe',
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
                'url' => 'employee/employe/new',
                'method' => 'GET',
            ],
            'create' => [
                'url' => 'employee/employe/create',
                'method' => 'GET',
            ],
            'store' => [
                'url' => 'employee/employe',
                'method' => 'POST',
            ],
            'update' => [
                'url' => 'employee/employe',
                'method' => 'PUT',
            ],
            'list' => [
                'url' => 'employee/employe',
                'method' => 'GET',
            ],
            'delete' => [
                'url' => 'employee/employe',
                'method' => 'DELETE',
            ],
        ],

        'order' => [
            'created_at' => 'employee::employe.label.created_at',
            'name' => 'employee::employe.label.name',
            'status' => 'employee::employe.label.status',
        ],

        'groups' => [
            [
                'icon' => "mdi:account-supervisor-outline",
                'name' => "employee::employe.groups.main",
                'group' => "main.main",
                'title' => "employee::employe.groups.main",
            ],
            [
                'icon' => "fe:home",
                'name' => "employee::employe.groups.details",
                'group' => "main.details",
                'title' => "employee::employe.groups.details",
            ],
            'images' => [
                'icon' => "fe:home",
                'name' => "employee::employe.groups.images",
                'group' => "main.images",
                'title' => "employee::employe.groups.images",
            ],
            'settings' => [
                'icon' => "fe:home",
                'name' => "employee::employe.groups.settings",
                'group' => "main.settings",
                'title' => "employee::employe.groups.settings",
            ]
        ],

        'controller' => [
            'provider' => 'Litecms',
            'package' => 'Employee',
            'module' => 'Employe',
        ],

        
        
    ];
