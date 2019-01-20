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

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/company', 'Company\CompanyController@show');
Route::get('/company/create', 'Company\CompanyController@create');
Route::post('/company/store', 'Company\CompanyController@store');
Route::get('/company/list', 'Company\CompanyController@listCompanies');