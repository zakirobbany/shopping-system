<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'billing', 'namespace' => 'Modules\Billing\Http\Controllers'], function()
{
    Route::get('/', 'BillingController@index');

    Route::resource('payment', 'PaymentController');
});
