<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Publications\PostControllerApi;
use App\Http\Controllers\Api\Publications\LikesPostController;


Route::apiResource('Publications',       PostControllerApi::class);
Route::apiResource('Likes_Publications', LikesPostController::class);

