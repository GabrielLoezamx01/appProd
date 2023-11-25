<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Categorias\CategoriasController;
use App\Http\Controllers\User\ProfileController;


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




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('categorias', CategoriasController::class);

Route::apiResource('profile', ProfileController::class);
Route::view('perfil','auth.profile');


/*
*   CLIENTES RUTAS
*/
Route::prefix('customer')->group(function () {
    require('Cliente/Master.php');
});

