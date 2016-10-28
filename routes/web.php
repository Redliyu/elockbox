<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/create', 'RegistrationController@create');
    Route::post('/create', ['as' => 'store', 'uses' => 'RegistrationController@store']);
});
Route::get('/login', 'LoginController@login');
Route::post('/login', ['as' => 'generate', 'uses' => 'LoginController@authenticate']);
Route::post('/vrfy', ['as' => 'vrfy', 'uses' => 'LoginController@vrfy']);
//Route::post('/')
//    Route::get('/login', ['as' => 'code', 'uses' => 'LoginController@generatecode']);