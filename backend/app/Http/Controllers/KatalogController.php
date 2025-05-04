<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;


class KatalogController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        $katalogs = Katalog::all();
        $totalKatalog = Katalog::count();
        return view('masterdata.katalog.index',
         compact(
            'katalogs',
             'totalKategori',
              'totalUsers',
               'totalKatalog',
               'totalProduk'
            ));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('masterdata.katalog.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKatalog'      => 'required|string|max:255',
            'deskripsiKatalog' => 'required|string',
            'kategori_id'      => 'required|exists:kategori,id',
            'gambarKatalog'    => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        Katalog::addKatalog($request);
        return redirect()->route('katalog.index')->with('succes', 'Katalog berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $katalog = Katalog::findOrFail($id);
        return view('masterdata.katalog.edit', compact('katalog', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKatalog'      => 'required|string',
            'deskripsiKatalog' => 'required|string',
            'kategori_id'      => 'required|exists:kategori,id',
            'gambarKatalog'    => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = $request->all();

        if ($file = $request->file('gambarKatalog')) {
            // simpan dan ambil path
            $data['gambarKatalog'] = $file->store('katalog', 'public');
        }

        Katalog::updateKatalog($data,  $id);
        return redirect()->route('katalog.index')->with('success', 'Katalog berhasil diubah!');
    }

    public function destroy(Katalog $katalog)
    {
        $katalog->delete();
        return redirect()->route('katalog.index')->with('success', 'Katalog berhasil dihapus!');
    }
}
