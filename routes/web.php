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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin', 'namespace'=>'admin', 'middleware'=> ['auth']], function (){
 Route::get('/', 'DashboardController@dashboard')->name('admin.index');
 Route::resource('/product', 'ProductController',['as'=>'admin']);
 Route::resource('/sale', 'SaleController',['as'=>'admin']);
 Route::resource('/saleproduct', 'SaleProductController',['as'=>'admin']);
 Route::resource('/manufacturer', 'ManufacturerController',['as'=>'admin']);

});





