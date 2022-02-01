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
    Route::post('get_state','Admin\WorkerController@get_state')->name('get_state');
    Route::get('fillter','HomeController@fillter')->name('fillter');
    Route::get('login','UserController@get_login')->name('get_login');
    Route::post('login','UserController@post_login')->name('post_login');
    Route::get('register','UserController@get_register')->name('get_register');
    Route::post('register','UserController@post_register')->name('post_register');
    Route::get('register-company','UserController@get_register_company')->name('get_register_company');
    Route::post('register-company','UserController@post_register_company')->name('post_company_register');
    Route::get('success_thawani/{id}','ThawaniController@successUrl')->name('thawani.done');
    Route::get('error_thawani','ThawaniController@errorUrl')->name('thawani.cancel');
    Route::get('send_message','SendMessageController@create')->name('user.message');
    Route::get('all_message','SendMessageController@all_message')->name('all.message');
    Route::get('all_message/show/{id}','SendMessageController@show_message')->name('show.message');
    Route::post('replay_front','HomeController@FrontReplay')->name('replay_front');

    
    
    Route::post('send_message','SendMessageController@store')->name('post_message');
    Route::get('contact_us','HomeController@contact_us')->name('get_contact_us');
    Route::post('countat_us','HomeController@post_contact_us')->name('post_contact_us');

    
    Route::get('approve/{id}','BookingController@approve')->name('approve.booking');
    Route::get('reset_password','UserController@reset_get')->name('get_rest');
    Route::get('reset-password/{token}', 'UserController@show_rest')->name('reset.password.get');
    Route::post('reset-password', 'UserController@submitResetPasswordForm')->name('reset.password.post');

    Route::post('reset_password_without_token', 'UserController@reset');
    
    Route::get('user-dashboard','UserController@dashboard');
    Route::middleware('auth')->group(function () {
        Route::post('booking','UserController@booking')->name('booking.user');
        Route::get('user-dashboard','UserController@dashboard')->name('user.dashboard');
        Route::get('user-orders','UserController@orders')->name('user.orders');

        Route::get('logout_user','UserController@logout_user')->name('logout_user');
        Route::get('edit_user/profile','UserController@get_profile');
        Route::post('edit_user/profile_post','UserController@post_profile')->name('profile.edituser');

    });
        
    Route::group(['middleware' => 'auth:company','prefix'=>'company-dashboard','namespace'=>'Company','as'=>'company.'], function () {

        Route::get('/','CompanyController@company_dashboard')->name('dashboard');
        Route::resource('workers', 'WorkerController');
        Route::resource('orders', 'OrderController');
        Route::get('logout', 'WorkerController@logout_company')->name('logout');
        Route::get('worker_status','WorkerController@update_status')->name('wroker.update_status');
        Route::get('profile','CompanyController@edit_profile')->name('profile.edit');
        Route::resource('comapny-message','SendMessageController');
        Route::post('replay', 'SendMessageController@replay')->name('replay.message');

        
        
        Route::post('profile', 'CompanyController@update_profile')->name('profile.post');


    });

    
    

});
