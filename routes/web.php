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

//auth routes 
Route::post('/check', 'App\Http\Controllers\AuthController@check')->name('check');
Route::post('/save', 'App\Http\Controllers\AuthController@save')->name('save');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');

    //admin routes
    Route::get('/admin/users', 'App\Http\Controllers\AdminController@users')->name('admin-users');
    Route::get('/admin/publications', 'App\Http\Controllers\AdminController@publications')->name('admin-publications');
    Route::get('/admin/objects', 'App\Http\Controllers\AdminController@objects')->name('admin-objects');
    Route::get('/dashboard', 'App\Http\Controllers\AuthController@dashboard')->name('dashboard');
    Route::post('/admin/add-image', 'App\Http\Controllers\AdminController@addImage')->name('add-image');

    //adding records(from admin)
    Route::post('/admin/add-publication', 'App\Http\Controllers\PublicationController@save')->name('add-publication');
    Route::post('/admin/add-object', 'App\Http\Controllers\ObjectsController@save')->name('add-object');
    
    //testing db
    Route::get('/object-test', 'App\Http\Controllers\DBTestController@db_object_test');

    //main routes
    Route::get('/objects', 'App\Http\Controllers\MainController@objects')->name("objects");
    Route::get('/publications', 'App\Http\Controllers\MainController@publications')->name("publications");
    Route::get('/object/{number}', 'App\Http\Controllers\MainController@object')->name("object");
});