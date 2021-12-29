<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|->name('v3.')
*/
Route::group(['namespace' => 'Company', 'middleware' => 'auth:company'], function () {
    Route::get('/','CompanyController@dashboard')->name('dashboard');    
});


Route::group(['namespace' => 'Company', 'middleware' => 'guest:company'], function () {
    Route::get('login', 'CompanyController@get_login')->name('get_login');
    Route::post('login', 'CompanyController@post_login')->name('post_login');
});
