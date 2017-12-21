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

Route::get('/', 'PagesController@index')->name('index');

Route::resource('posts', 'PostsController');

Route::get('/profil', 'ProfileController@index')->name('profil');

Route::prefix('company')->group(function () {
    Route::get('/', 'CompaniesController@index')->name('companies.index');
    Route::get('/{company}', 'CompaniesController@show')->name('companies.show');
});

// User Auth
Auth::routes();

// Admin Auth
Route::prefix('admin')->group(function () {
    Route::get('/login', 'AdminsController@showLoginForm')->name('admin.login');
    Route::post('/login', 'CompaniesController@show');
});