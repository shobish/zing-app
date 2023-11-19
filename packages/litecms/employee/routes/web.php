<?php

// Web routes  for employee.

// include('routes.php');


// if (Trans::isMultilingual()) {
//     Route::group(
//         [
//             'prefix' => '{trans}',
//             'where'  => ['trans' => Trans::keys('|')],
//         ],
//         function () {
//             include('routes.php');

//         }
//     );
// }

Route::prefix('{guard}/')->group(function () {
    Route::get('index', 'EmployeeResourceController@indexView');
    Route::post('product', 'EmployeeResourceController@addProduct');
});