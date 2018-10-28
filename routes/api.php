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
Route::middleware('api')->resource('categories', 'CrudController');
Route::middleware('api')->get('vacancies/search', 'VacancyController@search');
Route::middleware('api')->resource('vacancies', 'CrudController');

