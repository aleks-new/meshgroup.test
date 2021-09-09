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
Route::get('upload', 'UploadExcelController@index')
    ->name('upload.index');
Route::resource('row', 'RowController');

Route::get('/', 'WelcomeController@index');
