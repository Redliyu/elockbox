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
Route::any('/verify', ['as' => 'generate', 'uses' => 'LoginController@authenticate']);
Route::post('/home', ['as' => 'vrfy', 'uses' => 'LoginController@vrfy']);
Route::get('/email', 'LoginController@basic_email');
//Route::post('/')
//    Route::get('/login', ['as' => 'code', 'uses' => 'LoginController@generatecode']);
//Route::resource('/vrfy', 'LoginController', ['only' => ['authenticate', 'vrfy']]);

Route::group(['middleware' => ['admin']], function()
{
    Route::get('admin', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
});
Route::group(['middleware' => ['manager']], function()
{
    Route::get('manager',['as' => 'manager_dashboard', 'uses' => 'Manager\ManagerController@getHome']);
});
Route::group(['middleware' => ['staff']], function ()
{
    Route::get('staff',['as' => 'staff_dashboard', 'uses' => 'Staff\StaffController@getHome']);
});
Route::group(['middleware' => ['youth']], function ()
{
    Route::get('youth',['as' => 'youth_dashboard', 'uses' => 'Youth\YouthController@getHome']);
});
Route::get('/fail', function() {
    echo 'You do not have premission!';
});