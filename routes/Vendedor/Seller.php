<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ApiSellerController;
use App\Http\Controllers\Seller\PostSellerController;


Route::apiResource('ApiUserSeller',   ApiSellerController::class);
Route::apiResource('ApiPostSeller',   PostSellerController::class);

Route::view('Myseller', 'seller.mybranch');
Route::view('ShowSeller/{id}', 'seller.show')->name('showSeller');





