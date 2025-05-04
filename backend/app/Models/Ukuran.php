<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ukuran extends Model
{
    use HasFactory;
    protected $table = 'ukuran';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'katalog_id',
        'ukuran',
        'harga'
    ];

    public static function addUkuran($data)
    {
        return self::create([
            'users_id' => Auth::id(),
            'katalog_id' => $data['katalog_id'],
            'ukuran' => $data['ukuran'],
            'harga' => $data['harga']

        ]);
    }

    public static function updateUkuran($id, $data) {
        
        $ukuran = self::findOrFail($id);
        $ukuran->users_id = Auth::id();
        $ukuran->katalog_id = $data['katalog_id'];
        $ukuran->ukuran = $data['ukuran'];
        $ukuran->harga = $data['harga'];
        return $ukuran->save();
    }

    public function produk(){
        return $this->HasMany(Produk::class, 'ukuran_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function katalog(){
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }
}
