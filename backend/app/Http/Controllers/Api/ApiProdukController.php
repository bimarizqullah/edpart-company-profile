<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ApiProdukController extends Controller
{
    public function getAll(){
        return response()->json([
            'data' => Produk::getAll(),
        ]);
    }
}
