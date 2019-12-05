<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function()
{
   Route::get('details', 'UserController@details');
   Route::post('details', 'UserController@details');
  
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Route::resource('/company_index', 'CompanyController');

//Route::post('/company_index/update', 'CompanyController@update')->name('company_index.update');;

// Route::resource('/employee', 'EmployeeController');

// Route::post('/employee/update', 'EmployeeController@update')->name('employee.update');

// Route::delete('/employee/destroy/{id}', 'EmployeeController@destroy');

Route::resource('/e_index', 'EController');

Route::resource('/ajax-crud', 'AjaxCrudController');

Route::post('/ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::delete('/ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');

Route::get('/dynamic-field', 'DynamicFieldController@index');

Route::post('/dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');

Route::get('/employee', 'EmployeeController2@index');
Route::get('/employee/{id}', 'EmployeeController2@show');
Route::post('/employee', 'EmployeeController2@store');
Route::post('/employee/{id}/answers', 'EmployeeController2@answer');
Route::delete('/employee/{id}', 'EmployeeController2@delete');
Route::delete('/employee/{id}/answers', 'EmployeeController2@resetAnswers');



Route::get('/company_index', 'CompanyController2@index');
Route::get('/company_index/{id}', 'CompanyController2@show');
Route::post('/company_index', 'CompanyController2@store');
Route::post('/company_index/{id}/answers', 'CompanyController2@answer');
Route::delete('/company_index/{id}', 'CompanyController2@delete');
Route::delete('/company_index/{id}/answers', 'CompanyController2@resetAnswers');