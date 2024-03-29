<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Publications\PostControllerApi;
use App\Http\Controllers\Api\Publications\LikesPostController;
use App\Http\Controllers\Api\Publications\PostClientsController;
use App\Http\Controllers\Api\Comments\ClientsController;
use App\Http\Controllers\Api\Publications\Shared\ClientsSharedController;


Route::apiResource('Publications',        PostControllerApi::class);
Route::apiResource('Likes_Publications',  LikesPostController::class);
Route::apiResource('ClientsPublications', PostClientsController::class);
Route::apiResource('comments/ApiCommentsClients',  ClientsController::class);
Route::apiResource('sharedPost',  ClientsSharedController::class);


Route::view('comments/{id}','auth.comments');


