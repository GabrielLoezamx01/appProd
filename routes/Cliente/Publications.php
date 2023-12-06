<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Publications\PostControllerApi;
use App\Http\Controllers\Api\Publications\LikesPostController;
use App\Http\Controllers\Api\Publications\PostClientsController;

Route::apiResource('Publications',        PostControllerApi::class);
Route::apiResource('Likes_Publications',  LikesPostController::class);
Route::apiResource('ClientsPublications', PostClientsController::class);



