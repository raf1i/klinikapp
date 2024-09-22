<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pasien', App\Http\Controllers\PasienController::class);


