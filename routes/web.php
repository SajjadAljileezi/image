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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image', 'ImagesController@index');

Auth::routes();
Route::post('/upload', 'ImagesController@store');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('/routing', 'ImagesController@routing');
Route::get('/printing', 'ImagesController@printing');
