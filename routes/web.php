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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');


Route::get('/company', 'Company\CompanyController@show');
Route::get('/company/create', 'Company\CompanyController@create');
Route::post('/company/store', 'Company\CompanyController@store');
Route::get('/company/list', 'Company\CompanyController@listCompanies');

Route::get('/company/show/{id}', 'Company\CompanyController@show');


Route::get('/company/show/{id?}/worker/create', 'Worker\WorkerController@create')->name('create_worker_route');
Route::post('/company/show/{id?}/worker/create', 'Worker\WorkerController@store');


Route::get('/worker/list/{id?}', 'Worker\WorkerController@listWorkers');


//Route::get('/firebase', 'Firebase\FirebaseController@index');
Route::get('/firebase-v2', 'Firebase\FirebaseControllerV2@index');

Route::get('/android/token/{token}/{checkapptoken}', 'Android\TokenController@checkIfTokenShouldBeStored');

//.env('ANDROID_SAVE_TOKEN_SAFE', null)