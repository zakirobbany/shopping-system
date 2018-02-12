<?php

Route::group(['middleware' => 'web', 'prefix' => 'core', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
    Route::get('/', 'CoreController@index');
    Route::resource('/company-profile', 'CompanyProfileController');
    Route::resource('/customer', 'CustomerController');

    /*
     * Employee Routes
     * */
    Route::resource('/employee', 'EmployeeController');
    Route::post('/employee/{employee}/update', 'EmployeeController@update')->name('employee.update');
    Route::get('/employee/{employee}/delete', 'EmployeeController@delete')->name('employee.delete');

    Route::resource('/supplier', 'SupplierController');

    /*
     * Courier Routes
     * */
    Route::resource('/courier', 'CourierController');
    Route::post('/courier/{courier}/update', 'CourierController@update')->name('courier.update');
    Route::get('/courier/{courier}/delete', 'CourierController@delete')->name('courier.delete');

    Route::resource('/courier-type', 'CourierTypeController');
});
