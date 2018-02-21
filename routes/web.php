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
Route::get('/create', 'HomeController@new')->name('new');

Route::post('/new', 'HomeController@new')->name('new');
Route::post('/create', 'HomeController@create')->name('create');
Route::post('/edit', 'HomeController@edit')->name('edit');
Route::post('/change', 'HomeController@change')->name('change_status');
Route::post('/home', 'HomeController@update')->name('update');
Route::post('/delete', 'HomeController@delete')->name('delete');
