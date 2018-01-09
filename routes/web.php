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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('hello/{name}', function ($name) {
    return "Hello $name";
});

//Route::get('/', 'FrontController@index');
//Route::get('dashboard', 'DashboardController@index')->name('dashboard');
//Route::resource('spending', 'SpendingController');
//Route::resource('user', 'UserController');
//Route::get('balance', 'DashboardController@balance')->name('balance');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('balance', 'DashboardController@balance')->name('balance');
    Route::resource('spending', 'SpendingController');
    Route::resource('user', 'UserController');

});
