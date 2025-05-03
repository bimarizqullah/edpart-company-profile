<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah kredensial valid
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->remember)) {
            // Jika login berhasil, redirect ke dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();     // Menghapus seluruh session
        $request->session()->regenerateToken(); // Melindungi dari CSRF
        return redirect('/login');
    }
}
