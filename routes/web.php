<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
Route::get('/profile/products/buyed', 'App\Http\Controllers\UserController@showProductsBuyed')->name('user.products.buyed');
Route::get('/profile/products/selled', 'App\Http\Controllers\UserController@showProductsSelled')->name('user.products.selled');
Route::get('/profile/products/onSale', 'App\Http\Controllers\UserController@showProductsOnSale')->name('user.products.onSale');
Route::get('/profile/auctions', 'App\Http\Controllers\UserController@showAuctions')->name('user.auctions');
Route::get('/profile/offers', 'App\Http\Controllers\UserController@showOffers')->name('user.offers');
Route::get('/profile/orders', 'App\Http\Controllers\UserController@showOrders')->name('user.orders');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
