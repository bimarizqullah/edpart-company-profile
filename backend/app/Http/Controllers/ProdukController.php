<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProdukController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKatalog = Katalog::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        $produks = Produk::all();
        $katalog = Katalog::all();
        return view('masterdata.produk.index', compact(
            'produks',
            'katalog',
             'totalUsers',
             'totalKatalog',
              'totalProduk',
               'totalKategori'
            ));
    }

    public function create()
    {
        $katalog = Katalog::all();
        $ukuran = Ukuran::all();
        $produk = Produk::all();
        return view('masterdata.produk.create',
         compact(
            'produk',
            'katalog',
            'ukuran',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ukuran_id' => 'required|exists:ukuran,id',
            'katalog_id' => 'required|exists:katalog,id',
            'gambarProduk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'namaProduk' => 'required|string|max:25',
            'deskripsiProduk' => 'required|string|max:300',
            'hargaProduk' =>'required|integer',
            'statusProduk'=> 'required|in:aktif,nonaktif'
        ]);
        Produk::addProduct($request);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
        
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $katalog = Katalog::all();
        $ukuran = Ukuran::all();
        return view('masterdata.produk.edit',
         compact(
            'produk',
            'katalog',
            'ukuran'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ukuran_id' => 'required|exists:ukuran,id',
            'katalog_id' => 'required|exists:katalog,id',
            'namaProduk' => 'required|string|max:25',
            'deskripsiProduk' => 'required|string|max:300',
            'hargaProduk' =>'required|integer',
            'statusProduk'=> 'required|in:aktif,nonaktif'
        ]);

        $data = $request->all();

        if ($file = $request->file('gambarProduk')) {
            $data['gambarProduk'] = $file->store('produk', 'public');
        }
        Produk::updateProduct($id, $data);
        return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil diperbarui!');
        
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
