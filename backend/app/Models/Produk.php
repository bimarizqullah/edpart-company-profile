<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';  // Menyesuaikan dengan nama tabel 'user'

    public $timestamps = false;

    protected $fillable = [
        'gambarProduk',
        'user_id',
        'katalog_id',
        'ukuran',
        'harga',
        'namaProduk',
        'deskripsiProduk',
        'statusProduk'
    ];

    public static function getByKatalog($katalog_id)
    {
        return self::where('katalog_id', $katalog_id)->get();
    }

    public static function addProduct(Request $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'katalog_id' => $request->katalog_id ?? null,
            'namaProduk' => $request->namaProduk,
            'deskripsiProduk' => $request->deskripsiProduk,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'statusProduk' => $request->statusProduk
        ];

        if ($request->hasFile('gambarProduk') && $request->file('gambarProduk')->isValid()) {
            $data['gambarProduk'] = $request
                ->file('gambarProduk')
                ->store('Produk', 'public');
        }

        return self::create($data);
    }

    public static function updateProduct(Request $request, $id)
    {
        $produk = self::findOrFail($id);

        $produk->namaProduk      = $request->namaProduk;
        $produk->deskripsiProduk = $request->deskripsiProduk;
        $produk->ukuran = $request->ukuran;
        $produk->harga = $request->harga;
        $produk->katalog_id      = $request->katalog_id;
        $produk->statusProduk = $request->statusProduk;

        $produk->user_id          = Auth::id();

        if ($request->hasFile('gambarProduk') && $request->file('gambarProduk')->isValid()) {
            if ($produk->gambarProduk && Storage::disk('public')->exists($produk->gambarProduk)) {
                Storage::disk('public')->delete($produk->gambarProduk);
            }
            $produk->gambarProduk = $request->file('gambarProduk')->store('Produk', 'public');
        }


        return $produk->save();
    }

    public static function validateData(Request $request, $isUpdate = false)
    {
        $rules = [
            'namaProduk'      => 'required|string',
            'deskripsiProduk' => 'required|string',
            'katalog_id'      => 'required|exists:katalog,id',
            'ukuran'           => 'required|string',
            'harga'            => 'required|integer',
            'statusProduk'     => 'required|in:aktif,nonaktif'
        ];

        if (!$isUpdate) {
            $rules['gambarProduk'] = 'required|image|mimes:jpeg,png,jpg|max:10240';
        } else {
            $rules['gambarProduk'] = 'nullable|image|mimes:jpeg,png,jpg|max:10240';
        }
        return $request->validate($rules);
    }

    public static function getAll(){
        return self::all();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }
}
