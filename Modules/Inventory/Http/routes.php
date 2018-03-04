<?php

Route::group(['middleware' => 'web', 'prefix' => 'inventory', 'namespace' => 'Modules\Inventory\Http\Controllers'], function()
{
    Route::get('/', 'InventoryController@index');

    /*
     * Product Routes
     * */
    Route::resource('/product', 'ProductController')->except(['show']);
    Route::post('/product/{product}/update', 'ProductController@update')->name('product.update');
    Route::get('/product/{product}/delete', 'ProductController@destroy')->name('product.delete');
    Route::get('/product/add-stock', 'ProductController@addStock')->name('product.add-stock');
    Route::post('/product/add-stock/store', 'ProductController@storeAddStock')->name('product.store-add-stock');

    /*
     * Product Type Routes
     * */
    Route::resource('/product-type', 'ProductTypeController');
    Route::post('/product-type/{productType}/update', 'ProductTypeController@update')->name('product-type.update');
    Route::get('/product-type/{productType}/delete', 'ProductTypeController@destroy')->name('product-type.delete');

    /*
     * Product Brand Routes
     * */
    Route::resource('/product-brand', 'ProductBrandController');
    Route::post('/product-brand/{productBrand}/update', 'ProductBrandController@update')->name('product-brand.update');
    Route::get('/product-brand/{productBrand}/delete', 'ProductBrandController@destroy')->name('product-brand.delete');

});
