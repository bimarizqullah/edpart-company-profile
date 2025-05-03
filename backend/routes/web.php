<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/', 'annaounce');

// Route untuk Login dan Sessions
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route setelah User melakukan Login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('/users', UserController::class);
    Route::resource('/profile', ProfileController::class);
    Route::put('/profile', [ProfileController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/katalog', KatalogController::class);
});

