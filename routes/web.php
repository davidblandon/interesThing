<?php

/**
 * Created by: David Blandón
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| '/' is the index, the root of the project
| '/admin' is the index,but for the admins
| '/auctions/create' the route for creating new auctions
| '/auctions/save' the post route, for the insertion on database
| '/auctions'  is the list of all the auctions
| '/auctions/{id}' is the specific information of an auction
| '/auctions/{id}' is the post url for deleting the insertions
| '/user' is the profile page for users
| '/user/{id}' the route for deleting user accounts
| '/cart' is where you can see the
| '/cart/add/{id}'  is for adding nnew products to the cart
| '/cart/removeAll/' for removing all the producst from the cart
| '/orders' is where the user can see all his orders
| '/orders/{id}' is where the user can see all the specific data of 1 order


*/

Route::get('/', 'App\Http\Controllers\UserController@index')->name('home.index');

Route::get('/admin', 'App\Http\Controllers\UserController@admin')->name('admin');

Route::get('/auctions/create', 'App\Http\Controllers\AuctionController@create')->name('auction.create');

Route::post('/auctions/save', 'App\Http\Controllers\AuctionController@save')->name('auction.save');

Route::get('/auctions', 'App\Http\Controllers\AuctionController@list')->name('auction.list');

Route::get('/auctions/{id}', 'App\Http\Controllers\AuctionController@show')->name('auction.show');

Route::delete('/auctions/{id}', 'App\Http\Controllers\AuctionController@delete')->name('auction.delete');

Route::get('/user', 'App\Http\Controllers\UserController@profile')->name('user.profile');

Route::delete('/user/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');

Auth::routes();

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');

Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

Route::get('/orders', 'App\Http\Controllers\OrderController@removeAll')->name('orders.list');

Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@removeAll')->name('orders.show');
