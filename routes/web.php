<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'indexregister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Page Route
Route::get('/', function () {
    return view('userpage.welcome');
})->name('userpage');

Route::middleware(['auth', 'admin',])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::resource('buku', BukuController::class);
    Route::resource('kategori_buku', KategoriBukuController::class);
    Route::resource('users', UserController::class);
    Route::resource('jenis_user', JenisUserController::class);
});
