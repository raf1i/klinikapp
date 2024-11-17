<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;

Route::get('/daftar/create', [DaftarController::class, 'create'])->name('daftar.create');
Route::get('/daftar/{id}', [DaftarController::class, 'show'])->name('daftar.show');
// Route Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Auth::routes();

// Home Route (Setelah Login)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes with Authentication
Route::middleware(['auth'])->group(function () {
    // Pasien Resource Routes
    Route::resource('pasien', App\Http\Controllers\PasienController::class);

    // Poli Resource Routes
    Route::resource('poli', App\Http\Controllers\PoliController::class);

    // Daftar Resource Routes
    Route::resource('daftar', App\Http\Controllers\DaftarController::class);
});
