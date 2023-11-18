<?php

namespace Litecms\Employee\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('litecms_employee_employes')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'litecms.employee.employe.view',
                'name'      => 'View Employe',
            ],
            [
                'slug'      => 'litecms.employee.employe.create',
                'name'      => 'Create Employe',
            ],
            [
                'slug'      => 'litecms.employee.employe.edit',
                'name'      => 'Update Employe',
            ],
            [
                'slug'      => 'litecms.employee.employe.delete',
                'name'      => 'Delete Employe',
            ],
            
            
                    ]);

        DB::table('menus')->insert([
        
            // Admin menu
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/employee/employe',
                'name'        => 'Employe',
                'description' => null,
                'icon'        => 'las la-scroll',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            
            // User menu.
            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/employee/employe',
                'name'        => 'Employe',
                'description' => null,
                'icon'        => 'las la-scroll',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            // Public menu.
            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'employe',
                'name'        => 'Employe',
                'description' => null,
                'icon'        => 'las la-scroll,
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
                'module'    => 'Employe',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'litecms.employee.employe.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
