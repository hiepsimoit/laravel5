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
    Route::get('/home','AdminController@index');
    Route::get('setting','AdminSettingController@index');
    Route::post('setting','AdminSettingController@postSetting');

    Route::resource('admin_user', 'AdminUserController');
    Route::resource('blog', 'BlogController');
    Route::get('changePass','AdminUserController@change');
});

Route::group(['namespace'=>'User','middleware'=>'auth:web'],function (){
    Route::get('/home', function(){
        return View('frontend.home');
    });
});

Auth::routes();


Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

