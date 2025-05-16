<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class KategoriController extends Controller
{
    // API
    
    public function getKatalog()
    {
       return response()->json([
            'data' => Kategori::getKatalog(), // jika kamu tetap ingin ambil dari model
        ]);
    }
    public function index()
    {
        $kategoris = Kategori::all();
        $totalProduk = Produk::count();
        $totalKatalog = Katalog::count();
        $totalKategori  = Kategori::count();
        $totalUsers = User::count();
        return view('masterdata.kategori.index',
         compact('kategoris',
         'totalUsers',
          'totalKategori',
           'totalKatalog',
           'totalProduk'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('masterdata.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambarKategori' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'namaKategori' => 'required|string',
            'deskripsiKategori' => 'required|string|max:300'
        ]);
        if ($request->hasFile('gambarKategori')) {
            $gambarPath = $request->file('gambarKategori')->store('kategori', 'public');
            $validated['gambarKategori'] = $gambarPath;
        }
        $validated['user_id'] = Auth::id();
        Kategori::create($validated);
        return redirect()->route('kategori.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('masterdata.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
{
    $kategori = Kategori::findOrFail($id);

    $validated = $request->validate([
        'gambarKategori' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        'namaKategori' => 'required|string',
        'deskripsiKategori' => 'required|string|max:300'
    ]);

    if ($request->hasFile('gambarKategori')) {
        if ($kategori->gambarKategori && Storage::exists('kategori/' . $kategori->gambarKategori)) {
            Storage::delete('kategori/' . $kategori->gambarKategori);
        }

        $gambarPath = $request->file('gambarKategori')->store('kategori', 'public');
        $validated['gambarKategori'] = $gambarPath;
    }

    $kategori->update($validated);
    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->gambarKategori && Storage::exists($kategori->gambarKategori)) {
            Storage::delete($kategori->gambarKategori);
        }
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

}
