<?php

Route::group(['middleware' => 'web', 'prefix' => 'inventory', 'namespace' => 'Modules\Inventory\Http\Controllers'], function()
{
    Route::get('/', 'InventoryController@index');
});
