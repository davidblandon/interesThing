<?php

/**
 * Created by: David Blandón, Juan Martin Espitia, Laura Ortiz
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
| '/auctions/name'  is the list of all the auctions searched by a name
| '/auctions/{id}' is the specific information of an auction
| '/auctions/{id}' is the post url for deleting the insertions
| '/user' is the profile page for users
| '/user/{id}' the route for deleting user accounts
| '/cart' is where you can see the
| '/cart/add/{id}'  is for adding nnew products to the cart
| '/cart/removeAll/' for removing all the producst from the cart
| '/orders' is where the user can see all his orders
| '/orders/{id}' is where the user can see all the specific data of 1 order
| '/offers/{id}' Show the list of offers of an auction
| '/offers/create' Create offer
| '/offers/save', Save order in database
| '/products/create' the route for creating new products
| '/products/save' the post route, for the insertion on database
| '/products'  is the list of all the products
| '/products/{id}' is the specific information of an auction
| '/products/name'  is the list of all the prosucts searched by a name
| '/products/category'  is the list of all the prosucts searched by a category
| '/products/{id}' is the post url for deleting the insertions
*/

Route::get('/', 'App\Http\Controllers\UserController@index')->name('home.index');

Route::get('/admin', 'App\Http\Controllers\UserController@admin')->name('admin');

Route::get('/auctions/create', 'App\Http\Controllers\AuctionController@create')->name('auction.create');

Route::post('/auctions/save', 'App\Http\Controllers\AuctionController@save')->name('auction.save');

Route::get('/auctions', 'App\Http\Controllers\AuctionController@list')->name('auction.list');

Route::get('/auctions/name', 'App\Http\Controllers\ProductController@name')->name('auction.name');

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

Route::get('/orders/PDF/{id}', 'ProductController@generatePDF')->name('order.pdf');

Route::get('/offers/{id}', 'App\Http\Controllers\OfferController@list')->name('offer.list');

Route::get('/offers/create', 'App\Http\Controllers\OfferController@create')->name('offer.create');

Route::post('/offers/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');

Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');

Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');

Route::get('/products', 'App\Http\Controllers\ProductController@list')->name('product.list');

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/products/name', 'App\Http\Controllers\ProductController@name')->name('product.name');

Route::get('/products/category', 'App\Http\Controllers\ProductController@category')->name('product.category');

Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@delete')->name('product.delete');



