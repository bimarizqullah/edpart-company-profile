<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProduk = Produk::all();
        $totalKatalog = Katalog::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        $produk = Produk::all();
        return view('masterdata.produk.index', compact('produk', 'totalKatalog', 'totalProduk', 'totalKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:user,id',
            'ukuran_id' => 'nullable|exists:ukuran,id',
            'katalog_id' => 'required|exists:katalog,id',
            'gambarProduk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'namaProduk' => 'required|string|max:25',
            'deskripsiProduk' => 'required|string|max:300',
            'hargaProduk' =>'required|integer',
            'statusProduk'=> 'enum|'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('masterdata.produk.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
