<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Route below is for dev purpose
 * will be deleted if deployed
 * */
Route::get('/landing-page', function(){
    $text = 'Welcome';

    return $text;
});

Route::get('today-profit', function () {
   $serviceReport = new \App\Services\Report\ServiceReport();

   return $serviceReport->todayProfit();
});

Route::get('selling-data-set', function () {
   $sellingChart = new \App\Services\Report\ServiceReportChart();

   return $sellingChart->customerDataLabel();
});

