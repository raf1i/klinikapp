<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PoliController;

Route::resource('poli', PoliController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pasien', App\Http\Controllers\PasienController::class);

Route::middleware(['auth'])->group(function () {
   Route::resource('pasien', App\Http\Controllers\PasienController::class);
});
