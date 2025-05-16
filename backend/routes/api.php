<?php

use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/kategori', [KategoriController::class, 'getKatalog']);
Route::get('/katalog', [KatalogController::class, 'getProduk']);
Route::get('/produk', [ProdukController::class, 'getAll']);
