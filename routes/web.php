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

Route::post('payment', 'PaymentController@pay')->name('pay');
Route::get('paypal/done', 'PaypalController@getDone')->name('paypalDone');
Route::get('paypal/cancel', 'PaypalController@getCancel')->name('paypalCancel');

Route::post('/stripe/create', 'StripeController@create_checkout_session')->name('stripe.create');
Route::get('/stripe/success', 'StripeController@success')->name('stripe.success');
Route::get('/stripe/cancel', 'StripeController@cancel')->name('stripe.cancel');
// Route::post('payment/{gateway}','PaymentController@pay')->name('paypal');
// Route::post('payment/{gateway}','PaymentController@pay')->name('stripe');


Auth::routes();
Route::get('assignedcourses', 'CourseToStudentController@assigned')->name('assigned')->middleware('auth.basic');

Route::get('/homepage', 'HomeController@index')->name('homepage');
Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', 'IndexController@index')->name('home');
    Route::post('assigncoursesToStuents', 'CourseToStudentController@store')->name('courseAssign');
    Route::resource('courses', 'CourseController');
    Route::resource('students', 'StudentController');
    Route::resource('users', 'UserController');
    Route::get('coursesToStuents/{student_id}', 'CourseToStudentController@create')->name('courseToStudent');
    Route::get('assignedcourses/{student_id}', 'CourseToStudentController@assignedcourses')->name('assignedcourses');
    Route::get('course_details/{course_id}', 'CourseToStudentController@course_details')->name('course_details');
});