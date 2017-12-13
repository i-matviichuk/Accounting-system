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

Route::get('/users', 'UserController@show')->name('users');

Route::get('/groups', 'GroupController@showGroups')->name('showGroups');

Route::get('/group/{group}', 'GroupController@showGroupProfile')->name('showGroupProfile');

Route::get('/group/{group}/edit', 'GroupController@showEdit')->name('showEdit');

Route::post('/group/{group}/edit', 'GroupController@updateGroup')->name('updateGroup');

Route::get('/groups/add', 'GroupController@showForm');

Route::post('/groups/add', 'GroupController@addGroup')->name('addGroup');

Route::post('/groups/{id}', 'GroupController@deleteGroup')->name('deleteGroup')->middleware('role:admin');

Route::get('/user/{user}/marks', 'MarkController@index')->name('marks');

Route::get('/group/{group}/add/mark', 'MarkController@showForm')->name('showAddMark');

Route::post('/group/{group}/add/mark', 'MarkController@addMark')->name('addMark');

Route::get('/mark/{mark}/edit', 'MarkController@editMark')->name('editMark');

Route::post('/mark/{mark}/edit', 'MarkController@updateMark')->name('updateMark');

Route::get('/', 'UserController@index');

Route::get('/admin', 'AdminController@showProfile');

Route::get('new', 'UploadUsers@showForm')->name('new');

Route::post('new', 'UploadUsers@store')->name('new');

Route::get('/user/{user}/edit', 'UserController@show_edit')->name('edit');

Route::post('/user/{user}/edit', 'UserController@update')->name('update');

Route::post('/users/{id}', 'UserController@destroy')->name('delete');

Route::get('/profile/{user}', 'ProfileController@showProfile')->name('profile');

Route::get('/professions', 'ProfessionsController@show')->name('showProfessions');

Route::get('/professions/add', 'ProfessionsController@showAdd')->name('showAddProfession');

Route::post('/professions/add', 'ProfessionsController@addProfession')->name('addProfession');

Route::get('/professions/{profession}/edit', 'ProfessionsController@showEdit')->name('editProfession');

Route::post('/professions/{profession}/edit', 'ProfessionsController@updateProfession')->name('updateProfession');

Route::get('/group/{group}/add/discipline', 'DisciplineController@showForm')->name('showDiscipline');

Route::post('/group/{group}/add/discipline', 'DisciplineController@addDiscipline')->name('addDiscipline');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
