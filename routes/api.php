<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/avaliable', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product.index');
Route::get('/products/avaliable/{id}', 'App\Http\Controllers\Api\ProductApiController@show')->name('api.product.show');

Route::get('/weather', 'App\Http\Controllers\Api\WeatherApiController@index')->name('api.weather');

Route::get('/timeTravel', 'App\Http\Controllers\Api\TimeTravelApiController@index')->name('api.timeTravel');
