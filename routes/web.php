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
Route::get('/registrants/confirm/{school}', 'RegistrantsController@confirm');
Route::post('/registrants/add/participants', 'RegistrantsController@addParticipants')->name('add_participant');
Route::post('/registrants/add/competitors', 'RegistrantsController@addCompetitors')->name('add_competitors');
Route::get('/registrants/add/registered/{school}', 'RegistrantsController@addRegistered');
Route::get('/registrants/add/participants/{school}', function($school) {
    return view('registrants/addParticipants', ['school'=>$school]);
});

Route::get('/registrants/add/competitors/{school}', function($school) {
    return view('registrants/addCompetitors', ['school'=>$school]);
});

Route::get('/generate/password', function(){    return bcrypt('starki@nchsedu');  });
Route::get('/count', 'HomeController@count');