<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'report', 'namespace' => 'Modules\Report\Http\Controllers'], function()
{
    Route::get('/', 'ReportController@index');
});
