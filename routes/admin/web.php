<?php

/*
|--------------------------------------------------------------------------
| AdminMiddleware Web Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::get('/', 'AdminController@index')->name('dashboard.index');
