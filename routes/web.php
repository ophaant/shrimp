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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('post','DataController@postRequest');
Route::get('/','DataController@getRequest');
Route::get('/regency','DataController@getRegency');
Route::get('/details/{parameter}', 'DataController@detail');
Route::get('/show','DataController@getShow');
