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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('user/{id}/role', ['as' => 'user.role', 'uses' => 'App\Http\Controllers\UserController@changeRole']);
	Route::resource('project', 'App\Http\Controllers\ProjectController', ['except' => ['show']]);
	Route::resource('task', 'App\Http\Controllers\TaskController', ['except' => ['show']]);
	Route::get('/task/{project_id}', ['as' => 'task.list','uses' => 'App\Http\Controllers\TaskController@list']);
	Route::put('/task/{task_id}/status', ['as' => 'task.status', 'uses' => 'App\Http\Controllers\TaskController@changeStatus']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

