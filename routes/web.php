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

Route::get('admin/login','Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Auth\LoginController@adminLogin');

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin_user'],function (){
    Route::get('home','HomeController@index');
    Route::group(['prefix'=>'user'],function (){
        Route::get('edit','AdminUserController@edit');
        Route::post('edit','AdminUserController@postEdit');
    });
    Route::get('logout','AdminUserController@adminLogout');

    Route::group(['prefix'=>'slider'],function (){
        Route::get('','AdminSliderController@index');
        Route::get('add','AdminSliderController@add');
        Route::post('add','AdminSliderController@postAdd');
        Route::get('edit/{id}','AdminSliderController@edit');
        Route::post('edit/{id}','AdminSliderController@postEdit');
        Route::get('delete/{id}','AdminSliderController@delete');
        Route::get('active','AdminSliderController@active');
    });
    Route::group(['prefix'=>'order'],function (){
        Route::get('','AdminOrderController@index');
        Route::get('add','AdminOrderController@add');
        Route::post('add','AdminOrderController@postAdd');
        Route::get('edit/{id}','AdminOrderController@edit');
        Route::post('edit/{id}','AdminOrderController@postEdit');
        Route::get('delete/{id}','AdminOrderController@delete');
        Route::get('active','AdminOrderController@active');
    });
    Route::group(['prefix'=>'blog'],function (){
        Route::get('','AdminBlogController@index');
        Route::get('add','AdminBlogController@add');
        Route::post('add','AdminBlogController@postAdd');
        Route::get('edit/{id}','AdminBlogController@edit');
        Route::post('edit/{id}','AdminBlogController@postEdit');
        Route::get('delete/{id}','AdminBlogController@delete');
        Route::get('active','AdminBlogController@active');
    });
    Route::group(['prefix'=>'news'],function (){
        Route::get('','AdminNewsController@index');
        Route::get('add','AdminNewsController@add');
        Route::post('add','AdminNewsController@postAdd');
        Route::get('edit/{id}','AdminNewsController@edit');
        Route::post('edit/{id}','AdminNewsController@postEdit');
        Route::get('delete/{id}','AdminNewsController@delete');
        Route::get('active','AdminNewsController@active');
    });
    Route::group(['prefix'=>'event'],function (){
        Route::get('','AdminEventController@index');
        Route::get('add','AdminEventController@add');
        Route::post('add','AdminEventController@postAdd');
        Route::get('edit/{id}','AdminEventController@edit');
        Route::post('edit/{id}','AdminEventController@postEdit');
        Route::get('delete/{id}','AdminEventController@delete');
        Route::get('active','AdminEventController@active');
    });
    Route::group(['prefix'=>'page'],function (){
        Route::get('','AdminPageController@index');
        Route::get('add','AdminPageController@add');
        Route::post('add','AdminPageController@postAdd');
        Route::get('edit/{id}','AdminPageController@edit');
        Route::post('edit/{id}','AdminPageController@postEdit');
        Route::get('delete/{id}','AdminPageController@delete');
        Route::get('active','AdminPageController@active');
    });

    Route::resource('admin_user', 'AdminUserController');
});


Route::group(['middleware' => 'locale'], function() {
    Route::get('lang/{lang}','LangController@lang')->name('lang');
});
