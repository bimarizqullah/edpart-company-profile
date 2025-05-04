<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Ukuran extends Model
{
    use HasFactory;
    protected $table = 'ukuran';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'ukuran'
    ];

    public static function addUkuran($data)
    {
        return self::create([
            'users_id' => Auth::id(),
            'ukuran' => $data['ukuran']
        ]);
    }

    public static function updateUkuran($id, $data) {
        
        $ukuran = self::findOrFail($id);
        $ukuran->users_id = Auth::id();
        $ukuran->ukuran = $data['ukuran'];
        return $ukuran->save();
    }

    public function produk(){
        return $this->HasMany(Produk::class, 'ukuran_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
