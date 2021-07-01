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

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');
Route::get('/roles', 'PagesController@roles')->name('roles');

// PROJECT INTERN POST ROUTES

Route::prefix('config/')->group(function () {
    
    Route::post('update-rol', 'ConfigController@update_rol');

});