<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/offers/list', 'App\Http\Controllers\OfferController@list')->name('offer.list');
Route::get('/offers/create', 'App\Http\Controllers\OfferController@create')->name('offer.create');
Route::post('/offers/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');
Route::get('/offers/delete-{id}', 'App\Http\Controllers\OfferController@delete')->name('offer.delete');
Route::get('/offers/{id}', 'App\Http\Controllers\OfferController@show')->name('offer.show');



