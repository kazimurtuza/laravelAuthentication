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

Route::get('/','sendemailcontroller@index')->name('sendemail');
Route::post('sendtoemail','sendemailcontroller@sendtoemail')->name('sendtoemail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::get('changepass','changepasscontroller@index')->name('changepass');
 Route::post('password_change_in_database','changepasscontroller@change')->name('change');
 Route::post('customeEmail','OrderController@order')->name('customeEmail');
 Route::get('verifyemail/{token}','emailvarifycontroller@index')->name('verifyemail');
