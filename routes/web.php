<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');

//Route::get('/company', 'Company\CompanyController@show');
Route::get('/company/create', 'App\Http\Controllers\Company\CompanyController@create');
Route::post('/company/store', 'App\Http\Controllers\Company\CompanyController@store');
Route::get('/company/list', 'App\Http\Controllers\Company\CompanyController@listCompanies');

Route::get('/company/show/{id}', 'App\Http\Controllers\Company\CompanyController@show');
Route::get('/company/delete/{id}', 'App\Http\Controllers\Company\CompanyController@delete');

Route::get('/company/show/{id?}/worker/create', 'App\Http\Controllers\Worker\WorkerController@create')->name('create_worker_route');
Route::post('/company/show/{id?}/worker/create', 'App\Http\Controllers\Worker\WorkerController@store');


Route::get('/worker/show/{id}', 'App\Http\Controllers\Worker\WorkerController@show');
Route::get('/company/show/{company_id}/worker/{id}/edit', 'App\Http\Controllers\Worker\WorkerController@edit');
Route::post('/company/show/{company_id}/worker/{id}/edit', 'App\Http\Controllers\Worker\WorkerController@update');
Route::get('/company/show/{company_id}/worker/{id}/delete', 'App\Http\Controllers\Worker\WorkerController@delete');

Route::get('/worker/list/{id?}', 'App\Http\Controllers\Worker\WorkerController@listWorkers');

//Route::get('/firebase', 'Firebase\FirebaseController@index');
//Route::get('/firebase-v2', 'Firebase\FirebaseControllerV2@index');


Route::get('/fb/sendnotifications', 'App\Http\Controllers\Firebase\FirebaseBrozotController@sendNotifications');
Route::get('/worker/unactivateworkers', 'App\Http\Controllers\Worker\WorkerController@unactivateWorkers');


//Route::get('/firebase-v2', 'Firebase\FirebaseControllerV2@index');

// URI to save token sent from android device: token - sent from android device, checkapptoken: string saved in .env file and in android app (must match)
Route::get('/android/token/{token}/{checkapptoken}', 'App\Http\Controllers\Android\TokenController@checkIfTokenShouldBeStored');


Route::get("tt", function () {
   return 'ok, test';
});


