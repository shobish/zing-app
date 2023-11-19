Lavalite package that provides employee management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/employee`.

    "litecms/employee": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Litecms\Employee\Providers\EmployeeServiceProvider::class,

And also add it to alias

    'Employee'  => Litecms\Employee\Facades\Employee::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\Employee\\Seeders\\EmployeeTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Employee\Providers\EmployeeServiceProvider" --tag="view"


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