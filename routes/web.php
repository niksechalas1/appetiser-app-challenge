<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodosController;

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

Route::view('/', 'home');
Route::group(['prefix' => 'event', 'namespace' => 'App\Http\Controllers'], function () {
    Route::post('/add', 'EventController@store');
    Route::get('/', 'EventController@getAllEvents');
    Route::post('/delete-all', 'EventController@destroyAll');
});
