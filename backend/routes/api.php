<?php

use App\Http\Controllers\Api\ApiKategoriController;
use App\Http\Controllers\Api\ApiKatalogController;
use App\Http\Controllers\Api\ApiProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/kategori', [ApiKategoriController::class, 'getKatalog']);
Route::get('/katalog', [ApiKatalogController::class, 'getProduk']);
Route::get('/produk', [ApiProdukController::class, 'getAll']);
