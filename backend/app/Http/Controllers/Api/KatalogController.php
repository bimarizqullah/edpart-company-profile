<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(){
        return Katalog::with('produk')->get();
    }
}
