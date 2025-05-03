<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ukuran extends Model
{
    use HasFactory;
    protected $table = 'ukuran';

    public $timestamps = false;

    protected $fillable = [
        'ukuran'
    ];

    public static function addUkuran($data)
    {
        return self::create([
            'ukuran' => $data['ukuran']
        ]);
    }

    public static function updateUkuran($id, $data) {
        
        $ukuran = self::findOrFail($id);
        $ukuran->ukuran = $data['ukuran'];
        return $ukuran->save();
    }

    public function produk(){
        return $this->HasMany(Produk::class, 'ukuran_id');
    }
}
