<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'PagesController@index']);
Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'PagesController@subscribe']);

// Authentication routes...
Route::get('auth/login',['as' => 'login_path', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => '/admin', 'middleware' => ['auth','role:admin']], function () {
	Route::post('/create-new-category', ['as' => 'create-new-category', 'uses' => 'AdminController@create']);
	Route::post('/create-new-event', ['as' => 'create-new-event', 'uses' => 'AdminController@store']);
	Route::get('/show-subscribers', ['as' => 'show-subscribers', 'uses' => 'AdminController@subscribers']);
});