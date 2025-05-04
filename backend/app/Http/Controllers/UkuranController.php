<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UkuranController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        $ukurans = Ukuran::all();
        $totalKatalog = Katalog::count();
        $totalSize = Ukuran::count();
        return view('masterdata.ukuran.index',
         compact(
            'ukurans',
             'totalUsers',
              'totalKategori',
               'totalKatalog',
                'totalSize',
                'totalProduk'
            ));
    }

    public function create()
    {
        $ukuran = Ukuran::all();
        return view('masterdata.ukuran.create',
         compact(
            'ukuran
            '));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ukuran' => 'required|string'
        ]);
        $validated['users_id'] = Auth::id();
        Ukuran::create($validated);
        return redirect()
        ->route('ukuran.index')
        ->with('success', 'Ukuran berhasil ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $ukuran = Ukuran::findOrFail($id);
        return view('masterdata.ukuran.edit',
         compact(
            'ukuran'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ukuran'      => 'required|string|max:255'
        ]);

        $data = $request->all();

        Ukuran::updateUkuran($id,  $data);
        return redirect()
        ->route('ukuran.index')
        ->with('success', 'Katalog berhasil diubah!');
    }

    public function destroy(Ukuran $ukuran)
    {
        $ukuran->delete();
        return redirect()
        ->route('ukuran.index')
        ->with('success', 'Ukuran berhasil dihapus!');
    }

    
}
