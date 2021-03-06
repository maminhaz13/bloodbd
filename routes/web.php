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

//Home Controller routes
Route::get('/', 'HomeController@index')->name('dashboard')->middleware('auth');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

//Bloodgroup Controller routes
Route::resource('admin/bloodgroup', 'BloodgroupController', [
    'as' => 'bloodgroup'
])->middleware('auth');


