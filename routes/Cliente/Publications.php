<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Publications\PostControllerApi;

Route::apiResource('Publications', PostControllerApi::class);
