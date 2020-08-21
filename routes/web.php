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


Route::get('/', 'ExamController@index');

Route::post('/question', 'ExamController@store');
Route::put('/question', 'ExamController@update');
Route::delete('/question/{id}', 'ExamController@destroy');