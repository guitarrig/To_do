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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{id}', 'UserController@show')->name('show_user');

Route::post('/change', 'HomeController@change')->name('change_status');
Route::get('/list_create/{id}', 'HomeController@list_create')->name('list_create');
Route::post('/list_store', 'HomeController@list_store')->name('list_store');

Route::resource('todos', 'HomeController', ['except' =>['edit']]);
Route::resource('lists', 'ListController', ['only' => ['edit', 'update', 'show', 'index', 'destroy', 'create', 'store']]);
