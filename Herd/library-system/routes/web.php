<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama langsung ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route Tamu (Guest) - Hanya bisa diakses pengguna yang BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Route Logout - Hanya bisa diakses pengguna yang SUDAH login
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route Terlindungi (Auth) - Hanya bisa diakses setelah LOGIN
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});