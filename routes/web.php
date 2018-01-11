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

Route::get('admin', function () {
	return redirect('admin/users');
});

Route::group(['prefix' => 'admin/users', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
	Route::get('/', ['uses' => 'Admin\AdminController@index']);
	Route::resource('roles', 'Admin\RolesController');
	Route::resource('permissions', 'Admin\PermissionsController');
	Route::resource('users', 'Admin\UsersController');
	//Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
	//Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
	Route::get('public_messages','Public_messageController@admin');
});
Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
	Route::get('/{username}','ProfileController@profile');
	Route::get('info/edit','ProfileController@edit');
	Route::post('info/edit','ProfileController@update');
	Route::get('password/edit','ProfileController@edit_password');
	Route::post('password/edit','ProfileController@update_password');
	Route::get('avatar/edit','ProfileController@edit_avatar');
	Route::post('avatar/edit','ProfileController@update_avatar');
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
	Route::resource('admin/users/groups','GroupsController')->middleware('auth');
});

Route::get('group/{name}', 'GroupsController@group');

Route::group(['prefix' => 'messages', 'middleware' => ['auth']], function () {
	Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::delete('/{thread}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);
});