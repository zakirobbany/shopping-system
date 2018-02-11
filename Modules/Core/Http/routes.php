<?php

Route::group(['middleware' => 'web', 'prefix' => 'core', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
    Route::get('/', 'CoreController@index');
    Route::resource('/company-profile', 'CompanyProfileController');
    Route::resource('/customer', 'CustomerController');
    Route::resource('/employee', 'EmployeeController');
    Route::resource('/supplier', 'SupplierController');
    Route::resource('/courier', 'CourierController');
    Route::resource('/courier-type', 'CourierTypeController');
});
