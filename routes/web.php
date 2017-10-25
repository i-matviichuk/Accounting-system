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
    return view('home');
});


Route::get('/header', function() {
	return view('layouts/header');
});

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    // Route::resource('posts', 'PostController');
});

Route::get('/users', 'UserController@show')->middleware('role:admin');

Route::get('/groups', 'GroupController@showGroups')->name('showGroups')->middleware('role:admin');

Route::get('/group/{group}', 'GroupController@showGroupProfile')->name('showGroupProfile')->middleware('role:admin, operator, teacher');

Route::get('/groups/add', 'GroupController@showForm')->middleware('role:admin');

Route::post('/groups/add', 'GroupController@addGroup')->name('addGroup')->middleware('role:admin');

Route::post('/groups/{id}', 'GroupController@deleteGroup')->name('deleteGroup')->middleware('role:admin');

Route::get('new', 'RegisterUser@show')->middleware('role:admin');

Route::get('/marks/{discipline}', 'MarkController@index')->name('marks');

Route::get('/', 'UserController@index');

Route::get('/admin', 'AdminController@showProfile')->middleware('role:admin');

Route::get('new', 'UploadUsers@showForm')->name('new')->middleware('role:admin');

Route::post('new', 'UploadUsers@store')->name('new')->middleware('role:admin');

Route::get('/user/{user}/edit', 'UserController@show_edit')->name('edit');

Route::post('/user/{user}/edit', 'UserController@update')->name('update');

Route::post('/users/{id}', 'UserController@destroy')->name('delete');

Route::get('/profile/{user}', 'ProfileController@showProfile')->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
