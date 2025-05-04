<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Katalog extends Model
{
    use HasFactory;
    protected $table = 'katalog';

    public $timestamps = false;

    protected $fillable = [
        'gambarKatalog',
        'user_id',
        'kategori_id',
        'namaKatalog',
        'deskripsiKatalog'
    ];

    public static function addKatalog(Request $request)
    {
        // Validasi sudah dilakukan di controller
        $data = [
            'user_id'         => Auth::id(),
            'kategori_id'     => $request->kategori_id,
            'ukuran_id'       => $request->ukuran_id ?? null,
            'namaKatalog'     => $request->namaKatalog,
            'deskripsiKatalog' => $request->deskripsiKatalog,
        ];

        // Jika ada file, simpan ke disk 'public' pada folder 'katalog'
        if ($request->hasFile('gambarKatalog') && $request->file('gambarKatalog')->isValid()) {
            $data['gambarKatalog'] = $request
                ->file('gambarKatalog')
                ->store('katalog', 'public');
        }

        return self::create($data);
    }

    public static function updateKatalog($data, $id)
    {
        $katalog = self::findOrFail($id);

        $katalog->namaKatalog      = $data['namaKatalog'];
        $katalog->deskripsiKatalog = $data['deskripsiKatalog'];
        $katalog->kategori_id      = $data['kategori_id'];
        $katalog->user_id          = Auth::id();

        if (isset($data['gambarKatalog']) && is_string($data['gambarKatalog'])) {
            if ($katalog->gambarKatalog && Storage::disk('public')->exists($katalog->gambarKatalog)) {
                Storage::disk('public')->delete($katalog->gambarKatalog);
            }
            $katalog->gambarKatalog = $data['gambarKatalog'];
        }

        return $katalog->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'katalog_id');
    }
}
