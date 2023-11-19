<?php

namespace Litecms\Employee\Seeders;

use DB;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'employee.employee.view',
                'name'      => 'View Employee',
            ],
            [
                'slug'      => 'employee.employee.create',
                'name'      => 'Create Employee',
            ],
            [
                'slug'      => 'employee.employee.edit',
                'name'      => 'Update Employee',
            ],
            [
                'slug'      => 'employee.employee.delete',
                'name'      => 'Delete Employee',
            ],
            
            
        ]);

        DB::table('menus')->insert([
        
            // Admin menu
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/employee/employee',
                'name'        => 'Employee',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            
            // User menu.
            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/employee/employee',
                'name'        => 'Employee',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            // Public menu.
            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'employee',
                'name'        => 'Employee',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Employee',
                'module'    => 'Employee',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'employee.employee.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
