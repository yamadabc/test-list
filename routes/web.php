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


Route::resource('files','FileController',['only'=>['index','create','store','edit','upload']]);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController',);
    Route::get('users/check/{id}','UsersController@delete_check')->name('delete_check');
    Route::get('users/{id}/edit_image','UsersController@edit_image')->name('edit_image');
    Route::put('users/{id}/update_image','UsersController@update_image')->name('update_image');
    Route::get('users/{id}/reset_password','UsersController@reset_password')->name('reset_password');
    Route::put('users/{id}/update_password','UsersController@update_password')->name('update_password');
    
    Route::get('users/{id}/mypage','UsersController@mypage')->name('mypage');

    Route::resource('properties','PropertiesController');
    });
