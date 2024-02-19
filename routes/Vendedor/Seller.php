<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ApiSellerController;
use App\Http\Controllers\Seller\PostSellerController;
use App\Http\Controllers\Api\Comments\SellerController as CommentsPost;


Route::apiResource('ApiUserSeller',   ApiSellerController::class);
Route::apiResource('ApiPostSeller',   PostSellerController::class);
Route::apiResource('ApiCommentsPost', CommentsPost::class);


Route::view('Myseller', 'seller.mybranch');
Route::view('ShowSeller/{id}', 'seller.show')->name('showSeller');





