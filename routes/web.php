<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Categorias\CategoriasController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ResetPassword;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\Home\SearchController;
use App\Http\Middleware\DataUser;


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

/*
*
* Para visualizar los errores de una manera mas eficiente...
*/

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(DataUser::class);

#Update password users
Route::post('/EmailReset',[ResetPassword::class , 'SendEmail'])->name('SendEmail');
Route::post('password/Verify',[ResetPassword::class , 'Verify'])->name('Verify');
Route::post('/updatePassword',[ResetPassword::class , 'updatePassword'])->name('updatePassword');
Route::view('password/CodeInsert','auth.passwords.code')->name('CodeInsert');
Route::get('closeUser', [LoginController::class, 'logout'])->name('closeUser');



Route::middleware(['auth'])->group(function () {

    Route::apiResource('categorias', CategoriasController::class);
    Route::apiResource('profile', ProfileController::class);
    Route::apiResource('search_branch', SearchController::class);

    Route::post('profileIMG', [ProfileController::class, 'update'])->name('profileIMG');

    Route::view('perfil','auth.profile');
    Route::view('MisPublicaciones','auth.Publications')->middleware(DataUser::class);;

    /*
    *   CLIENTES RUTAS API
    */
    Route::prefix('customer')->group(function () {
        require('Cliente/Master.php');
    });
    Route::prefix('seller')->group(function () {
        require('Vendedor/Master.php');
    });
});


