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

Route::get('/system/admin', 'Auth\LoginController@systemLogin')->name('systemLogin');
Route::post('/system/admin', 'Auth\LoginController@system_Login')->name('system.login');
Route::resource('courses','CourseController')->middleware('auth.basic');
Route::resource('students','StudentController');
Route::resource('users','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homepage');
Route::group(['middleware'=>'auth.basic'],function(){
    Route::get('/home', 'IndexController@index')->name('home');
});

