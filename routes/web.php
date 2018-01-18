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

// Static
Route::get('/', 'PagesController@index')->name('index');
Route::get('/profil', 'ProfileController@index')->name('profil');
Route::get('/logout', 'PagesController@logout');

// User Auth
Auth::routes();

// Resources
Route::resource('posts', 'PostsController');
Route::resource('stages', 'JobController');

// Prefix groups
Route::prefix('company')->group(function () {
    //Route::get('/create', 'CompaniesController@create')->name('companies.create');
    Route::get('/{company}', 'CompaniesController@show')->name('companies.show');
    Route::get('/', 'CompaniesController@index')->name('companies.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminsController@index')->name('admin.profil');
    // Admin Auth
    Route::get('/reset-password', 'AdminsController@resetPasswordForm')->name('admin.reset-password');
    Route::post('/reset-password', 'AdminsController@resetPassword');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login');
    Route::get('/create', 'AdminsController@create')->name('admin.create');
    Route::post('/create', 'AdminsController@store')->name('admin.store');
});

Route::prefix('student')->group(function(){
    Route::get('/', 'ProfileController@index');
    Route::get('/update', 'UserController@edit')->name('user.edit');
    Route::post('/update', 'UserController@update')->name('user.update');
});