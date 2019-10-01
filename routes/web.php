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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', function () {
    return view('employee');
});

Route::get('/company_index', function () {
    return view('company_index');
});

Auth::routes(); /* ['verify' => true] insert to turn on mail verification */

//Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('home', function () {

    $vall = DB::table('users')->get();

    return view('home', ['vall' => $vall]);
});*/


Route::resource('home', 'HomeController');

Route::post('home/update', 'HomeController@update')->name('home.update');

Route::get('home/destroy/{id}', 'HomeController@destroy');

Route::resource('company_index', 'CompanyController');

Route::post('company_index/update', 'CompanyController@update')->name('company_index.update');;

Route::resource('employee', 'EmployeeController');

Route::post('employee/update', 'EmployeeController@update')->name('employee.update');

Route::get('employee/destroy/{id}', 'EmployeeController@destroy');

Route::resource('e_index', 'EController');

Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');

Route::get('dynamic-field', 'DynamicFieldController@index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');
