<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard() {
        $totalKatalog = Katalog::count();
        $totalKategori = Kategori::count();
        $totalUsers = User::count();
        return view('layouts.dashboard', compact('totalUsers', 'totalKategori', 'totalKatalog'));
    }
    public function profile()
    {
        $users = User::all();
        return view('layouts.userProfile.profile', compact('users'));
    }
}
