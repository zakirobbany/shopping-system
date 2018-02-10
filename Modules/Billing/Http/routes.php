<?php

Route::group(['middleware' => 'web', 'prefix' => 'billing', 'namespace' => 'Modules\Billing\Http\Controllers'], function()
{
    Route::get('/', 'BillingController@index');
});
