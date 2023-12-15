<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ApiSellerController;

Route::apiResource('ApiUserSeller',   ApiSellerController::class);
Route::view('Myseller', 'seller.mybranch');



