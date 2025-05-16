<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ProfileController extends Controller
{
    public function index()
    {
        return view('layouts.userProfile.profile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layouts.userProfile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id, // user table
            'alamat' => 'required|string',
            'level' => 'required|in:admin,superadmin',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'password' => 'nullable|string|min:8',
        ]);

        $user->updateUser($request->all());

        return redirect()->route('profile.index')->with('success', 'User berhasil diperbarui');
    }

    public function updateFoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.index')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('foto')) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->updateFoto($request->file('foto'));
        }
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
