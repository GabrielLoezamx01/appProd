<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Categorias\CategoriasController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ResetPassword;



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
Route::post('/EmailReset',[ResetPassword::class , 'SendEmail'])->name('SendEmail');
Route::post('/Verify',[ResetPassword::class , 'Verify'])->name('Verify');
Route::post('/updatePassword',[ResetPassword::class , 'updatePassword'])->name('updatePassword');


Route::view('CodeInsert','auth.passwords.code')->name('CodeInsert');

Route::middleware(['auth'])->group(function () {
    Route::apiResource('categorias', CategoriasController::class);
    Route::apiResource('profile', ProfileController::class);
    Route::post('profileIMG', [ProfileController::class, 'update'])->name('profileIMG');

    Route::view('perfil','auth.profile');
    Route::view('MisPublicaciones','auth.Publications');

    /*
    *   CLIENTES RUTAS
    */
    Route::prefix('customer')->group(function () {
        require('Cliente/Master.php');
    });
});


