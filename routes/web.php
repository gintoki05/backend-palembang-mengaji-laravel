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

Route::get('/', 'JadwalController@index');
Route::resource('jadwal', 'JadwalController');
Route::get('jadwal-api', 'JadwalController@jadwal');

Route::resource('info', 'InfoController');
Route::get('info-api', 'InfoController@info');

Auth::routes();

