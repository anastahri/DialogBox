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


Route::get('/', function () {
	if(Auth::check()) return redirect('/home');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('public_messages','Public_messageController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
	Route::get('/', ['uses' => 'AdminController@index']);
	Route::resource('roles', 'RolesController');
	Route::resource('permissions', 'PermissionsController');
	Route::resource('users', 'UsersController');
	Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
	Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('profile/{username}','ProfileController@profile');
	Route::get('profile/edit/{username}','ProfileController@edit');
	Route::post('profile/edit/{username}','ProfileController@update');
	Route::get('profile/password/edit/{username}','ProfileController@edit_password');
	Route::post('profile/password/edit/{username}','ProfileController@update_password');
});