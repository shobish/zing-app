<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLitecmsEmployeeEmployesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: litecms_employee_employes
         */
        Schema::create('litecms_employee_employes', function ($table) {
            $table->increments('id');
            $table->string('Name', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Password', 50)->nullable();
            $table->string('Employee_id', 50)->nullable();
            $table->string('Category', 50)->nullable();
            $table->text('marking', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('litecms_employee_employes');
    }
}
