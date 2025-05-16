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

    public function getAll(){
       return response()->json([
            'data' => Produk::getAll(),
       ]);
    }
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKatalog = Katalog::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        $produks = Produk::all();
        $katalogs = Katalog::all();
        return view('masterdata.produk.show', compact(
            'produks',
            'katalogs',
            'totalUsers',
            'totalKatalog',
            'totalProduk',
            'totalKategori'
        ));
    }

    public function show($id)
    {
        // Tampilkan produk berdasarkan katalog yang dipilih
        $katalog = Katalog::findOrFail($id);
        $produks = Produk::getByKatalog($id);

        // Jika ingin tetap tampil totalnya
        $totalProduk = $produks->count();
        $totalKatalog = Katalog::count();
        $totalKategori = Kategori::count();
        $totalUsers = User::count();

        return view('masterdata.produk.index', compact(
            'produks',
            'katalog',
            'totalProduk',
            'totalKatalog',
            'totalKategori',
            'totalUsers'
        ));
    }


    public function create()
    {
        $katalog = Katalog::all();
        return view(
            'masterdata.produk.create',
            compact(
                'katalog',
            )
        );
    }

    public function store(Request $request)
    {
        Produk::validateData($request, false);
        Produk::addProduct($request);
        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $katalog = Katalog::all();
        return view(
            'masterdata.produk.edit',
            compact(
                'produk',
                'katalog'
            )
        );
    }

    public function update(Request $request, $id)
    {
        Produk::validateData($request, true);
        Produk::updateProduct($request, $id);
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
