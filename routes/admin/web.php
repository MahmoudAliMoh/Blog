<?php

/*
|--------------------------------------------------------------------------
| AdminMiddleware Admin Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


/**
 * Admin Index route
 */
Route::get('/', 'AdminController@index')->name('dashboard.index');

/**
 * Categories route
 */
Route::resource('categories', 'CategoriesController');

/**
 * Blog route
 */
Route::resource('blog', 'BlogController');
