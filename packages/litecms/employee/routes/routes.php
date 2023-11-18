<?php

// Routes for employee.

// Guard routes for employe
Route::prefix('{guard}/employee')->group(function () {

    Route::resource('employe', 'EmployeResourceController');
});



// Public routes for employee
Route::get('employees/', 'EmployeePublicController@index');
Route::get('employee/{slug?}', 'EmployeePublicController@show');
