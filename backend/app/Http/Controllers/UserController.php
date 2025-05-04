<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalKatalog = Katalog::count();
        $totalKategori = Kategori::count();
        $totalUsers = User::count();
        $users =User::all();
        return view('layouts.user.index',
         compact('users',
          'totalUsers',
           'totalKategori',
            'totalKatalog',
            'totalProduk'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string',
            'level' => 'required|in:admin,superadmin',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $validated['password'] = bcrypt($request->password);
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $validated['gambarUser'] = basename($fotoPath);
        }
        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }


    public function create()
    {
        return view('layouts.user.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id, // user table
            'alamat' => 'required|string',
            'level' => 'required|in:admin,superadmin',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'password' => 'nullable|string|min:8',
        ]);

        $user->updateUser($request->all());

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user){
        if ($user->gambarUser && Storage::exists($user->gambarUser)) {
            Storage::delete($user->gambarUser);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');

    }
}
