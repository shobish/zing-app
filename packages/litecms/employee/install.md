# Installation

The instructions below will help you to properly install the generated package to the lavalite project.

## Location

Extract the package contents to the folder 

`/packages/litecms/employee/`

## Composer

Add the below entries in the `composer.json` file's autoload section and run the command `composer dump-autoload` in terminal.

```json

...
     "autoload": {

        "psr-4": {
            ... ,
            "Litecms\\Employee\\": "packages/litecms/employee/src",
            "Litecms\\Employee\\Seeders\\": "packages/litecms/employee/database/seeders"
            
            ...
        }
    },
...

```

## Config

Add the entries in service provider in `config/app.php`

```php

...
    'providers'       => [
        ...
        
        Litecms\Employee\Providers\EmployeeServiceProvider::class,
        
        ...
    ],

    ...

    'alias'             => [
        ...
        
        'Employee'  => Litecms\Employee\Facades\Employee::class,
        
        ...
    ]
...

```

## Migrate

After service provider is set run the commapnd to migrate and seed the database.


    php artisan migrate
    php artisan db:seed --class=Litecms\\Employee\\Seeders\\EmployeeTableSeeder

## Publishing


**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="view"


## URLs and APIs


### Web Urls

**Admin**

    http://path-to-route-folder/admin/employee/{modulename}

**User**

    http://path-to-route-folder/user/employee/{modulename}

**Public**

    http://path-to-route-folder/employees


### API endpoints

**List**
 
    http://path-to-route-folder/api/user/employee/{modulename}
    METHOD: GET

**Create**

    http://path-to-route-folder/api/user/employee/{modulename}
    METHOD: POST

**Edit**

    http://path-to-route-folder/api/user/employee/{modulename}/{id}
    METHOD: PUT

**Delete**

    http://path-to-route-folder/api/user/employee/{modulename}/{id}
    METHOD: DELETE

**Public List**

    http://path-to-route-folder/api/employee/{modulename}
    METHOD: GET

**Public Single**

    http://path-to-route-folder/api/employee/{modulename}/{slug}
    METHOD: GET