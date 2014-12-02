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

//route to display company orders
Route::get('company/user/{id}',array('as'=>'companies', 'uses'=>'CompanyController@listusers'));

//route to display company ivoices
Route::get('company/invoice/{id}',array('as'=>'companies', 'uses'=>'CompanyController@listivoice'));

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

//display a summary of order
Route::get('order/screen/{id}',array('uses'=>'OrderController@show'));


//display a pdf report of a id check order
Route::get('order/pdf/{id}',array('uses'=>'OrderController@generatePdf'));

//display a list of orders ready for processing
Route::get('process/order',array('uses'=>'ProcessController@index'));

//display a list of orders waiting confirmation
Route::get('process/order/confirm',array('uses'=>'ProcessController@confirm'));

//display a list of published order
Route::get('order/published',array('uses'=>'OrderController@published'));

//display a list of declined  order
Route::get('order/declined',array('uses'=>'OrderController@declined'));

//declining of an a order
Route::post('order/unconfirm/{id}',array('uses'=>'ProcessController@unconfirm'));

//confirming of order
Route::post('order/confirm/{id}',array('uses'=>'ProcessController@confirmorder'));

//publishing a part of order
Route::post('order/publish/{id}',array('uses'=>'ProcessController@publishorder'));

//displayng a sumary of
Route::post('order/confirm/summary/{id}',array('uses'=>'ProcessController@selectforms'));

//display a form to fill in screening results
Route::get('order/fill/{id}',array('uses'=>'ProcessController@fillform'));

/////////////////////////////////////////////////////////////////////////////
/////submiting the forms
//////////////////////////////////////////////////////////////////////////////
//id check form
Route::post('form/submit/validity/{id}',array('uses'=>'ProcessFormController@idcheck'));

///Form check routes
Route::post('form/submit/validity/{id}',array('uses'=>'ProcessFormController@idcheck'));
//id gapanalysis form
Route::post('form/submit/gapvalidity/{id}',array('uses'=>'ProcessFormController@gapanalysis'));
//id professional form
Route::post('form/submit/professionvalidity/{id}',array('uses'=>'ProcessFormController@professional'));
//id cvanalysis form
Route::post('form/submit/cvvalidity/{id}',array('uses'=>'ProcessFormController@cvanalysis'));
//id criminal form
Route::post('form/submit/criminvalidity/{id}',array('uses'=>'ProcessFormController@criminal'));
//id academic form
Route::post('form/submit/academvalidity/{id}',array('uses'=>'ProcessFormController@academic'));
//id employeehistory form
Route::post('form/submit/emplvalidity/{id}',array('uses'=>'ProcessFormController@employeehistory'));
//id compliencecheck form
Route::post('form/submit/compvalidity/{id}',array('uses'=>'ProcessFormController@compliencecheck'));
//id adversecheck form
Route::post('form/submit/advalidity/{id}',array('uses'=>'ProcessFormController@adversecheck'));


