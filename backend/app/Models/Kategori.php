<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';  // Menyesuaikan dengan nama tabel 'user'

    public $timestamps = false;

    protected $fillable = [
        'gambarKategori',
        'user_id',
        'namaKategori',
        'deskripsiKategori'
    ];

    public static function getKatalog(){
        return self::all();
    }

    public function katalog() {
        return $this->hasMany(Katalog::class, 'katalog_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
