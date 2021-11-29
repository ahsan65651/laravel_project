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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/","HomeController@index");
Route::get("/company","HomeController@company_view");
Route::get("delete-company/{id}","HomeController@delete_company");
Route::get("/update-company-ajax","HomeController@update_company_ajax");



Route::post("/add-company","HomeController@addcompany");
Route::post("/update-company","HomeController@update_company");


Route::get("/employee","HomeController@employee_view");
Route::get("delete-employee/{id}","HomeController@delete_employee");
Route::get("/update-employee-ajax","HomeController@update_employee_ajax");



Route::post("/add-employee","HomeController@addemployee");
Route::post("/update-employee","HomeController@update_employee");
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


