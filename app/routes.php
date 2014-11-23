<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route: Route::controller('password', 'RemindersController');


Route::get('/', function()
{
    return View::make('login');
});


Route::get('home', function()
{
    return View::make('dashboard');
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing user actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//validating user during login
Route::post('login',array('as'=>'login', 'uses'=>'UserController@validate'));

//logging a user out
Route::get('logout',array('as'=>'logout', 'uses'=>'UserController@logout'));

//display a form to add new user
Route::get('user/add',array('as'=>'adduser', 'uses'=>'UserController@create'));

//display a list of users
Route::get('user/list',array('uses'=>'UserController@userlist'));

//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('users',array('as'=>'listuser', 'uses'=>'UserController@index'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

//check for a regions district...
Route::post('user/region_check/{id}',array('uses'=>'UserController@check_region'));

//check for a regions district...
Route::post('user/region_check1/{id}',array('uses'=>'UserController@check_region1'));

////////////////////////////////////////////////////////////////////////////////////////
////manage profile routes
///////////////////////////////////////////////////////////////////////////////////////

//route to display profile
Route::get('profile',array('as'=>'profile', 'uses'=>'UserController@profile'));

//route to display profile info
Route::get('profileInfo',array('as'=>'profileInfo', 'uses'=>'UserController@profileInfo'));

//route to display profile edit
Route::get('profileEdit',array('as'=>'profileEdit', 'uses'=>'UserController@profileEdit'));

//////////////////////////////////////////////////////////////////////////////////////////
//////manage companies
//////////////////////////////////////////////////////////////////////////////////////////
//route to display company
Route::get('companies',array('as'=>'companies', 'uses'=>'CompanyController@index'));

//route to display company
Route::get('company/{id}/dashboard',array('as'=>'companboard', 'uses'=>'CompanyController@show'));

//display a form to add new company
Route::get('company/add',array('as'=>'addcompany', 'uses'=>'CompanyController@create'));

//display a list of companies
Route::get('company/list',array('uses'=>'CompanyController@companylist'));

//adding new company
Route::post('company/add',array('as'=>'addcompany1', 'uses'=>'CompanyController@store'));

//display a form to edit company information
Route::get('company/edit/{id}',array('as'=>'editcompany', 'uses'=>'CompanyController@edit'));

//editng company information
Route::post('company/edit/{id}',array('as'=>'editcompany', 'uses'=>'CompanyController@update'));

//deleting company information
Route::post('company/delete/{id}',array('as'=>'deletecompany', 'uses'=>'CompanyController@destroy'));

//adding company user information
Route::get('company/user/add/{id}',array('as'=>'companyuser', 'uses'=>'CompanyController@adduser'));

//listing users for a company
Route::get('company/user/list/{id}',array('as'=>'listcompusers', 'uses'=>'CompanyController@listuser'));

////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////Order Placement
///////////////////////////////////////////////////////////////////////////////////////////////////////
//display a form to create new order
Route::get('order/new',array('as'=>'neworder', 'uses'=>'OrderController@create'));

//create a new order
Route::post('order/new/{id}',array('as'=>'neworder1', 'uses'=>'OrderController@store'));

//route to display company orders
Route::get('company/order/{id}',array('as'=>'companies', 'uses'=>'OrderController@index'));

//route to display company users
Route::get('company/order/{id}/list',array('as'=>'companyorders', 'uses'=>'OrderController@listorders'));

//display a list of companies
Route::post('order/summary/{id}',array('uses'=>'OrderController@summarylist'));

//display a list of companies
Route::get('order/screen/{id}',array('uses'=>'OrderController@show'));


//display a list of companies
Route::get('order/pdf/{id}',array('uses'=>'OrderController@generatePdf'));

