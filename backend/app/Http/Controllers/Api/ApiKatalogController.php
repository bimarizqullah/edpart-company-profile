<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class ApiKatalogController extends Controller
{
    public function getProduk(){
        return response()->json([
            'data' => Katalog::getProduk(),
        ]);
    }
}
