# Installation

The instructions below will help you to properly installand run the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/litecms/employee/`

## Composer

Add the below entries in the `composer.json`.


```json

...
     "repositories": {
        ...

        {
            "type": "path",
            "url": "packages/litecms/employee"
        }

        ...
    },
...

```
Then run `composer require litecms/employee`


## Migration and seeds

```
    php artisan migrate
    php artisan db:seed --class=Litecms\\Employee\\Seeders\\EmployeeTableSeeder
```

## Publishing

* Configuration
```
    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="config"
```
* Language
```
    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="lang"
```
* Views
```
    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="view"
```

## URLs and APIs

### Web Urls

* Admin
```
    http://path-to-route-folder/admin/employee/{modulename}
```

* User
```
    http://path-to-route-folder/user/employee/{modulename}
```

* Public
```
    http://path-to-route-folder/employees
```


### API endpoints

These endpoints can be used with or without `/api/`
And also the user can be varied depend on the type of users, eg user, client, admin etc.

#### Resource

* List
```
    http://path-to-route-folder/api/user/employee/{modulename}
    METHOD: GET
```

* Create
```
    http://path-to-route-folder/api/user/employee/{modulename}
    METHOD: POST
```

* Edit
```
    http://path-to-route-folder/api/user/employee/{modulename}/{id}
    METHOD: PUT
```

* Delete
```
    http://path-to-route-folder/api/user/employee/{modulename}/{id}
    METHOD: DELETE
```

#### Public

* List
```
    http://path-to-route-folder/api/employee/{modulename}
    METHOD: GET
```

* Single Item
```
    http://path-to-route-folder/api/employee/{modulename}/{slug}
    METHOD: GET
```

#### Others

* Report
```
    http://path-to-route-folder/api/user/employee/{modulename}/report/{report}
    METHOD: GET
```

* Export/Import
```
    http://path-to-route-folder/api/user/employee/{modulename}/exim/{exim}
    METHOD: POST
```

* Action
```
    http://path-to-route-folder/api/user/employee/{modulename}/action/{id}/{action}
    METHOD: PATCH
```

* Actions
```
    http://path-to-route-folder/api/user/employee/{modulename}/actions/{action}
    METHOD: PATCH
```

* Workflow
```
    http://path-to-route-folder/api/user/employee/{modulename}/workflow/{id}/{transition}
    METHOD: PATCH
```
