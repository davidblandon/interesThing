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
| '/' is de index, the root of the project
| '/create' the route for creating new auctions
| '/save' the post route, for the insertion on database
| '/auctions'  is the list of all the auctions
| '/auctions/{id}' is the specific information of an auction 
| '//auctions/{id}/delete' is the post url for deleting the insertions

*/

Route::get('/','App\Http\Controllers\UserController@index')->name("home.index");

Route::get('/auctions/create','App\Http\Controllers\AuctionController@create')->name('auction.create');

Route::post('/auctions/save','App\Http\Controllers\AuctionController@save')->name('auction.save');

Route::get('/auctions/auctions','App\Http\Controllers\AuctionController@list')->name('auction.list');

Route::get('/auctions/{id}','App\Http\Controllers\AuctionController@show')->name('auction.show');

Route::delete('/auctions/{id}','App\Http\Controllers\AuctionController@delete')->name('auction.delete');

Route::get('/user/{id}','App\Http\Controllers\UserController@profile')->name('user.profile');

Route::delete('/user/{id}','App\Http\Controllers\UserController@delete')->name('user.delete');

Auth::routes();

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");

Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

