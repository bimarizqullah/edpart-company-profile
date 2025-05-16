<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUsersLevel;
use App\Http\Middleware\CheckUsersLogout;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/', 'annaounce');

// Route untuk Login dan Sessions
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// API
Route::get('kategori', [KategoriController::class, 'getKatalog']);
Route::get('katalog', [KatalogController::class, 'getProduk']);
Route::get('produk', [ProdukController::class, 'getAll']);

// Route setelah User melakukan Login
Route::middleware(['auth', CheckUsersLevel::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('/profile', ProfileController::class);
    Route::put('/profile', [ProfileController::class, 'updateFoto'])->name('profile.updateFoto');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/katalog', KatalogController::class);
    Route::resource('/produk', ProdukController::class);
});

// Route Users (Admin) ketika mencoba akses halaman /users
Route::middleware(['auth', CheckUsersLevel::class])->group(function () {
    Route::resource('/users', UserController::class);
});
