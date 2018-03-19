<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'core', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
    Route::get('/', 'CoreController@index');

    /*
     * Company Profile Routes
     * */
    Route::resource('/company-profile', 'CompanyProfileController');
    Route::post('/company-profile/{companyProfile}/update', 'CompanyProfileController@update')->name('company-profile.update');

    /*
     * Customer Routes
     * */
    Route::resource('/customer', 'CustomerController');
    Route::post('/customer/{customer}/update', 'CustomerController@update')->name('customer.update');
    Route::get('/customer/{customer}/delete', 'CustomerController@destroy')->name('customer.delete');

    /*
     * Employee Routes
     * */
    Route::resource('/employee', 'EmployeeController');
    Route::post('/employee/{employee}/update', 'EmployeeController@update')->name('employee.update');
    Route::get('/employee/{employee}/delete', 'EmployeeController@delete')->name('employee.delete');

    /*
     * Supplier Controller
     * */
    Route::resource('/supplier', 'SupplierController');
    Route::post('/supplier/{supplier}/update', 'SupplierController@update')->name('supplier.update');
    Route::get('/supplier/{supplier}/delete', 'SupplierController@destroy')->name('supplier.delete');

    /*
     * Courier Routes
     * */
    Route::resource('/courier', 'CourierController');
    Route::post('/courier/{courier}/update', 'CourierController@update')->name('courier.update');
    Route::get('/courier/{courier}/delete', 'CourierController@delete')->name('courier.delete');

    /*
     * CourierType Routes
     * */
    Route::resource('/courier-type', 'CourierTypeController');
    Route::post('/courier-type/{courierType}/update', 'CourierTypeController@update')->name('courier-type.update');
    Route::get('/courier-type/{courierType}/delete', 'CourierTypeController@destroy')->name('courier-type.delete');
});
