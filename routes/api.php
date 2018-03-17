<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
//    Route::get('user-search', 'UserSearchController')->name('user-search');

//    Route::get('/products', 'VueController@getProducts');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', 'VueController@getProducts');
Route::get('/products/{product}/price', 'VueController@getProductPrice');
Route::get('/products/{product}/type', 'VueController@getProductType');
