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



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function() {    return view('auth/login');  });
Route::get('/registrants', 'RegistrantsController@all')->name('schools');
Route::get('/registrants/{school}', 'RegistrantsController@school');

Route::get('/generate/password', function(){    return bcrypt('starki@nchsedu');  });
Route::get('/count', 'HomeController@count');