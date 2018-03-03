<?php

Route::group(['middleware' => 'web', 'prefix' => 'inventory', 'namespace' => 'Modules\Inventory\Http\Controllers'], function()
{
    Route::get('/', 'InventoryController@index');

    /*
     * Product Controller
     * */
    Route::resource('/product', 'ProductController');
    Route::post('/product/{product}/update', 'ProductController@update')->name('product.update');
    Route::get('/product/{product}/delete', 'ProductController@destroy')->name('product.delete');

    /*
     * Product Controller
     * */
    Route::resource('/product-type', 'ProductTypeController');
    Route::post('/product-type/{productType}/update', 'ProductTypeController@update')->name('product-type.update');
    Route::get('/product-type/{productType}/delete', 'ProductTypeController@destroy')->name('product-type.delete');

    /*
     * Product Controller
     * */
    Route::resource('/product-brand', 'ProductBrandController');
    Route::post('/product-brand/{productBrand}/update', 'ProductBrandController@update')->name('product-brand.update');
    Route::get('/product-brand/{productBrand}/delete', 'ProductBrandController@destroy')->name('product-brand.delete');

});
