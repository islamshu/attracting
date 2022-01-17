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
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::resource('company', 'CompanyController');
    Route::resource('sliders', 'SliderController');
    Route::resource('services', 'ServiceController');
    Route::resource('workers', 'WorkerController');
    Route::resource('how_its_work','WorkController');
    Route::resource('pages','PageController');
    Route::resource('orders','OrderController');

    Route::get('company-update', 'CompanyController@change_status')->name('company.update.status');
    Route::get('slider-update', 'SliderController@change_status')->name('slider.update.status');
    Route::get('service-update', 'ServiceController@change_status')->name('service.update.status');
    Route::get('about','AboutController@index')->name('about.index');
    Route::post('about','AboutController@store')->name('about.store');
    Route::get('generalinfo','GeneralController@index')->name('generalinfo.index');
    Route::post('generalinfo','GeneralController@store')->name('generalinfo.store');
    Route::get('firstsection','FirstSectionController@index')->name('firstsection.index');
    Route::post('firstsection','FirstSectionController@store')->name('firstsection.store');
    Route::get('statistic','StatisticController@index')->name('statistic.index');
    Route::post('statistic','StatisticController@store')->name('statistic.store');
    
    Route::resource('menu','MenuController');
    Route::post('menu/update-order','MenuController@updateOrder')->name('menu_update'); 
    Route::post('work/update-order','WorkController@updateOrder')->name('work_update'); 
    Route::get('language_translate/{local}','GeneralController@show_translate')->name('show_translate');
    Route::post('/languages/key_value_store', 'GeneralController@key_value_store')->name('languages.key_value_store');
    Route::get('messagesLetter','MessageLetterController@index')->name('messageletter.index');
    Route::get('worker_status','WorkerController@update_status')->name('wroker.update_status');

    

    

});


Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'AdminController@get_login')->name('admin.get_login');
    Route::post('login', 'AdminController@post_login')->name('admin.post_login');
});
