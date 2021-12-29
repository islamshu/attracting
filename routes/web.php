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
|
*/


Route::middleware('lang')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('worker_deletes/{id}','HomeController@get_single_work')->name('get_single_work');
    Route::get('lang/{lang}','HomeController@change_lang')->name('change-lang');
    Route::get('page/{slug}','HomeController@page')->name('fron.page');
    Route::post('subscribe','HomeController@MessageLetter')->name('subscribe');
       
});
