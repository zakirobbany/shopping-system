<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'report', 'namespace' => 'Modules\Report\Http\Controllers'], function()
{
    Route::get('/', 'ReportController@index');
    Route::get('/stock', 'ReportController@stock')->name('report.stock');
    Route::get('/sell', 'ReportController@sell')->name('report.sell');
});
