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

Auth::routes(); /* ['verify' => true] insert to turn on mail verification */

//Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('home', function () {

    $vall = DB::table('users')->get();

    return view('home', ['vall' => $vall]);
});*/


Route::resource('home', 'HomeController');

Route::post('home/update', 'HomeController@update')->name('home.update');

Route::get('home/destroy/{id}', 'HomeController@destroy');

Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

//Route::post('ajax-crud/joins', 'AjaxCrudController@joins')->name('ajax-crud.joins');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');

Route::get('dynamic-field', 'DynamicFieldController@index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');
