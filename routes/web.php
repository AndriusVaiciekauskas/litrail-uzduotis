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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController')->middleware('auth');
Route::resource('roles', 'RolesController')->middleware('auth');
Route::resource('services', 'ServicesController')->middleware('auth');
Route::resource('systems', 'SystemsController')->middleware('auth');
