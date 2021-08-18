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

//testing db
Route::get('/object-test', 'App\Http\Controllers\DBTestController@db_object_test');

//main routes
Route::get('/objects', 'App\Http\Controllers\MainController@objects')->name("objects");
Route::get('/object/{number}', 'App\Http\Controllers\MainController@object')->name("object");

//admin routes
Route::get('/admin/add-user', 'App\Http\Controllers\AdminController@add_user');