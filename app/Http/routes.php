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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function() {
	// Authentication routes...
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
	// Registration routes...
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'password'], function() {
	// Password reset link request routes...
	Route::get('email', 'PasswordController@getEmail');
	Route::post('email', 'PasswordController@postEmail');
	// Password reset routes...
	Route::get('reset/{token}', 'PasswordController@getReset');
	Route::post('reset', 'PasswordController@postReset');
});

/**
 * Authenticated users only
 */
Route::group(['middleware' => 'auth'], function() {
	// User profile
	Route::get('profile/edit', 'ProfileController@edit');
	Route::put('profile/edit', 'ProfileController@update');
	// Password change
	Route::get('profile/password', 'ProfileController@passwordEdit');
	Route::post('profile/password', 'ProfileController@passwordUpdate');
});


