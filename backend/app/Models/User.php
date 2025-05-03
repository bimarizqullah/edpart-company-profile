<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Menggunakan Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable  // Pastikan model mewarisi dari Authenticatable
{
    use HasFactory;

    protected $table = 'users';  // Menyesuaikan dengan nama tabel 'user'

    public $timestamps = false;

    protected $fillable = [
        'gambarUser',
        'nama',
        'username',
        'password',
        'alamat',
        'level',
        'status'
    ];

    protected $casts = [
        'level' => 'string',
        'status' => 'string',
    ];

    public static function levels()
    {
        return ['superadmin', 'admin'];
    }

    public static function statuses()
    {
        return ['aktif', 'nonaktif'];
    }

    /**
     * Fungsi untuk mendapatkan total pengguna
     */
    public static function getTotalUsers()
    {
        return self::count();
    }

    public static function addUser($data)
    {
        return self::create([
            'gambarUser' => $data['gambarUser'] ?? null,
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],
            'level' => $data['level'] ?? 'superadmin',
            'status' => $data['status'] ?? 'aktif',
        ]);
    }
    public function updateFoto($file)
    {

        // Hapus foto lama jika ada
        if ($this->gambarUser && Storage::exists('profile/' . $this->gambarUser)) {
            Storage::delete('profile/' . $this->gambarUser);
        }

        // Simpan foto baru
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('profile', $filename);

        // Update ke database
        $this->gambarUser = $filename;
        $this->save();
    }

    public function updateUser($data)
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if (isset($data['foto'])) {
            $fotoPath = $data['foto']->store('public/fotos');
            $data['gambarUser'] = basename($fotoPath);
            unset($data['foto']);
        }

        $this->update($data);
    }

    #Relation

    public function kategori() {
        return $this->hasMany(Kategori::class, 'user_id');
    }

    public function katalog() {
        return $this->hasMany(Katalog::class, 'user_id');
    }


}
