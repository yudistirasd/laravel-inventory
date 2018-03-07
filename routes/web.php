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

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::group(['prefix'  => 'admin','middleware' =>  'admin'], function(){
  Route::get('/', 'Admin\DashboardController@index');
  Route::resource('/supliers', 'Admin\SupliersController');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
