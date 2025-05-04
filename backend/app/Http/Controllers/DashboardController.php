<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard() {
        $totalProduk = Produk::count();
        $totalKatalog = Katalog::count();
        $totalKategori = Kategori::count();
        $totalUsers = User::count();
        return view('layouts.dashboard',
         compact('users',
         'katalogs',
         'kategoris',
         'produks',
         'totalUsers',
          'totalKategori',
           'totalKatalog',
           'totalProduk'
        ));
    }
    public function profile()
    {
        $users = User::all();
        return view('layouts.userProfile.profile',
         compact(
            'users'
        ));
    }
}
