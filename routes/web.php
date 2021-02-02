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

Route::get('admin/login','Auth\LoginController@showAdminLoginForm');
Route::post('admin/login', 'Auth\LoginController@adminLogin');

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::get('','AdminController@index');
    Route::get('setting','AdminSettingController@index');
    Route::post('setting','AdminSettingController@postSetting');



    Route::resource('admin_user', 'AdminUserController');
    Route::get('changePass','AdminUserController@change');
});

Route::group(['namespace'=>'User','middleware'=>'auth:web'],function (){
    Route::get('','UserController@index');
});

Auth::routes();

