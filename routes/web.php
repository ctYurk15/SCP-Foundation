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

//auth routes 
Route::post('/auth/check', 'App\Http\Controllers\AuthController@check')->name('auth.check');
Route::post('/auth/save', 'App\Http\Controllers\AuthController@save')->name('auth.save');
Route::get('/auth/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
    Route::get('/auth/register', 'App\Http\Controllers\AuthController@register')->name('auth.register');

    //admin routes
    Route::get('/admin/add-user', 'App\Http\Controllers\AdminController@add_user');
    Route::get('/admin/dashboard', 'App\Http\Controllers\AuthController@dashboard')->name('admin.dashboard');
});