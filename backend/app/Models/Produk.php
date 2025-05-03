<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'hargaProduk',
        'statusProduk'
    ];
}
