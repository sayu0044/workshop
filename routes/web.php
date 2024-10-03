<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'indexregister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('userpage.index');
})->name('userpage');

Route::middleware(['auth', 'admin', 'check.menu.access'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menu', MenuController::class);
        Route::resource('setting_menus', SettingMenuController::class);
        Route::resource('buku', BukuController::class);
        Route::resource('kategori_buku', KategoriBukuController::class);
        Route::resource('users', UserController::class);
        Route::resource('jenis_user', JenisUserController::class);
  Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
Route::get('/sent', [MessageController::class, 'sent'])->name('sent');
Route::get('/sent/create', [MessageController::class, 'create'])->name('sent.create');
Route::post('/sent', [MessageController::class, 'store'])->name('sent.store');
Route::get('/inbox/{id}', [MessageController::class, 'show'])->name('inbox.show');  // Menggunakan show untuk balas pesan juga
Route::post('/inbox/{id}/reply', [MessageController::class, 'sendReply'])->name('inbox.sendReply');
Route::delete('/inbox/{id}', [MessageController::class, 'destroy'])->name('inbox.destroy');
    });

});
