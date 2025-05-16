<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{
    public function getKatalog(){
        return response()->json([
            'data' => Kategori::getKatalog(),
        ]);
    }
}
