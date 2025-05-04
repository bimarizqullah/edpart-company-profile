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
        'ukuran_id',
        'katalog_id',
        'namaProduk',
        'deskripsiProduk',
        'statusProduk'
    ];

    public static function addProduct(Request $request)
    {
        // Validasi sudah dilakukan di controller
        $data = [
            'user_id' => Auth::id(),
            'ukuran_id' => $request->ukuran_id ?? null,
            'katalog_id' => $request->katalog_id ?? null,
            'namaProduk' => $request->namaProduk,
            'deskripsiProduk' => $request->deskripsiProduk,
            'statusProduk' => $request->statusProduk
        ];

        // Jika ada file, simpan ke disk 'public' pada folder 'katalog'
        if ($request->hasFile('gambarProduk') && $request->file('gambarProduk')->isValid()) {
            $data['gambarProduk'] = $request
                ->file('gambarProduk')
                ->store('Produk', 'public');
        }

        return self::create($data);
    }

    public static function updateProduct($id, $data)
    {
        $produk = self::findOrFail($id);

        $produk->namaProduk      = $data['namaProduk'];
        $produk->deskripsiProduk = $data['deskripsiProduk'];
        $produk->katalog_id      = $data['katalog_id'];
        $produk->statusProduk = $data['statusProduk'];
        $produk->ukuran_id = $data['ukuran_id'];      
        $produk->user_id          = Auth::id();

        if (isset($data['gambarProduk']) && is_string($data['gambarProduk'])) {
            if ($produk->gambarProduk && Storage::disk('public')->exists($produk->gambarProduk)) {
                Storage::disk('public')->delete($produk->gambarProduk);
            }
            $produk->gambarProduk = $data['gambarProduk'];
        }

        return $produk->save();
    }

    public function ukuran() {
        return $this->belongsTo(Ukuran::class, 'ukuran_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function katalog() {
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }
}
