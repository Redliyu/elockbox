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
    Route::get('/debug/create', 'RegistrationController@debugcreate');
    Route::post('/debug/create', ['as' => 'debugstore', 'uses' => 'RegistrationController@debugstore']);
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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function()
{
    Route::get('', ['as' => 'admin_dashboard', 'uses' => 'AdminController@getHome']);
    Route::get('case/create', 'CaseManagement\CaseController@create');
    Route::post('case/create', ['as' => 'admin.case.store', 'uses' => 'CaseManagement\CaseController@store']);
    Route::get('case/view', ['uses' => 'CaseManagement\CaseController@view']);
    Route::get('case/{id}/view', ['uses' => 'CaseManagement\CaseController@viewdetail']);
    Route::get('case/{id}/edit', ['uses' => 'CaseManagement\CaseController@editdetail']);
    Route::post('case/{id}/edit', ['as' => 'update', 'uses' => 'CaseManagement\CaseController@update']);
    Route::get('case/{id}/active', ['uses' => 'CaseManagement\CaseController@active']);
    Route::get('case/{id}/inactive', ['uses' => 'CaseManagement\CaseController@inactive']);
    Route::get('case/{id}/delete', ['uses' => 'CaseManagement\CaseController@delete']);
    Route::get('case/{id}/account', ['uses' => 'CaseManagement\CaseController@createaccount']);
    Route::post('case/{id}/account', ['as' => 'admin.case.create.account', 'uses' => 'CaseManagement\CaseController@storeaccount']);
    Route::get('user/view', ['uses' => 'UserManagement\UserController@view']);
    Route::post('case/upload', 'CaseManagement\FileuploadingController@showfileupload');
    Route::post('case/doc/{id}/edit', 'CaseManagement\CaseController@editfile');
    Route::get('case/doc/{id}/delete', 'CaseManagement\CaseController@deletefile');
////    Route::get('admin_logout', ['uses' => 'Admin\AdminController@logout']);
//    Route::get('/create', 'RegistrationController@create');
//    Route::post('/create', ['as' => 'store', 'uses' => 'RegistrationController@store']);
});
Route::group(['middleware' => ['manager']], function()
{
    Route::get('manager',['as' => 'manager_dashboard', 'uses' => 'Manager\ManagerController@getHome']);
//    Route::get('manager/case/create', 'CaseManagement\CaseController@create');
//    Route::get('manager_logout', ['uses' => 'Manager\ManagerController@logout']);
});
Route::group(['middleware' => ['staff']], function ()
{
    Route::get('staff',['as' => 'staff_dashboard', 'uses' => 'Staff\StaffController@getHome']);
//    Route::get('staff_logout', ['uses' => 'Staff\StaffController@logout']);
});
Route::group(['middleware' => ['youth']], function ()
{
    Route::get('youth',['as' => 'youth_dashboard', 'uses' => 'Youth\YouthController@getHome']);
//    Route::get('youth_logout', ['uses' => 'Youth\YouthController@logout']);
});
Route::get('/fail', function() {
    echo 'You do not have premission!';
});
Route::get('/logout', ['uses' => 'LoginController@logout']);

//Route::get('/uploadfile', 'FileuploadingController@index');
//Route::post('/uploadfile', 'FileuploadingController@showfileupload');
Route::get('/test', ['uses' => 'Admin\CaseManagement\CaseController@viewtest']);
