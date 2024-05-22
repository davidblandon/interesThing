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

Route::get('/products/avaliable', 'App\Http\Controllers\ProductController@avaliable')->name('product.avaliable');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/auctions/avaliable', 'App\Http\Controllers\AuctionController@available')->name('auction.avaliable');
Route::get('/auctions/create', 'App\Http\Controllers\AuctionController@create')->name('auction.create');
Route::post('/auctions/save', 'App\Http\Controllers\AuctionController@save')->name('auction.save');
Route::get('/auctions/{id}', 'App\Http\Controllers\AuctionController@show')->name('auction.show');

Route::get('/offers/create/{auctionId}', 'App\Http\Controllers\OfferController@create')->name('offer.create');
Route::post('/offers/save/{auctionId}', 'App\Http\Controllers\OfferController@save')->name('offer.save');

Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
Route::get('/profile/products/buyed', 'App\Http\Controllers\UserController@showProductsBuyed')->name('user.buyed');
Route::get('/profile/products/selled', 'App\Http\Controllers\UserController@showProductsSelled')->name('user.selled');
Route::get('/profile/products/onSale', 'App\Http\Controllers\UserController@showProductsOnSale')->name('user.onSale');
Route::get('/profile/auctions', 'App\Http\Controllers\UserController@showAuctions')->name('user.auctions');
Route::get('/profile/offers', 'App\Http\Controllers\UserController@showOffers')->name('user.offers');
Route::get('/profile/orders', 'App\Http\Controllers\UserController@showOrders')->name('user.orders');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

Route::post('/order/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
Route::get('/order/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
Route::get('/order/{id}/pdf/', 'App\Http\Controllers\OrderController@pdf')->name('order.pdf');
Route::post('/order/{id}/downloads/', 'App\Http\Controllers\OrderController@download')->name('order.download');

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/open/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    Route::get('/admin/auctions', 'App\Http\Controllers\Admin\AdminAuctionController@index')->name('admin.auction.index');
    Route::post('/admin/auctions/store', 'App\Http\Controllers\Admin\AdminAuctionController@store')->name('admin.auction.store');
    Route::get('/admin/auctions/{id}/edit', 'App\Http\Controllers\Admin\AdminAuctionController@edit')->name('admin.auction.edit');
    Route::put('/admin/auctions/{id}/update', 'App\Http\Controllers\Admin\AdminAuctionController@update')->name('admin.auction.update');
    Route::delete('/admin/auctions/{id}/delete', 'App\Http\Controllers\Admin\AdminAuctionController@delete')->name('admin.auction.delete');
});
