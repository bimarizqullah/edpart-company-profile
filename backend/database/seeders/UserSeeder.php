<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'gambarUser' => 'default.png',
            'nama' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),  // Pastikan password terenkripsi dengan bcrypt
            'alamat' => 'Jln. Diponegoro No. 7 RT02/RW02 Kel. Manisrejo, Kec. Karangrejo, Kab. Magetan',
            'level' => 'admin',  // Menetapkan level ke admin
            'status' => 'aktif',  // Menetapkan status ke aktif
        ]);
    }
}
