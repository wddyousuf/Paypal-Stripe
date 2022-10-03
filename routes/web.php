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
Route::get('coursesToStuents/{student_id}','CourseToStudentController@create')->name('courseToStudent');
Route::get('assignedcourses/{student_id}','CourseToStudentController@assignedcourses')->name('assignedcourses');
Route::post('payment','PaymentController@pay')->name('pay');
Route::get('paypal/done','PaypalController@getDone')->name('paypalDone');
Route::get('paypal/cancel','PaypalController@getCancel')->name('paypalCancel');

Route::post('/stripe/create', 'StripeController@create_checkout_session')->name('stripe.create');
Route::get('/stripe/success', 'StripeController@success')->name('stripe.success');
Route::get('/stripe/cancel', 'StripeController@cancel')->name('stripe.cancel');
// Route::post('payment/{gateway}','PaymentController@pay')->name('paypal');
// Route::post('payment/{gateway}','PaymentController@pay')->name('stripe');
Route::post('assigncoursesToStuents','CourseToStudentController@store')->name('courseAssign');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homepage');
Route::group(['middleware'=>'auth.basic'],function(){
    Route::get('/home', 'IndexController@index')->name('home');
});

