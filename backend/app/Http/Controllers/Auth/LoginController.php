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
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && $user->status === 'aktif') {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->remember)) {
            return redirect()->intended('/dashboard');
        }
    }

    return back()->withErrors([
        'username' => 'Username atau password salah, atau akun Anda tidak aktif.',
    ]);
}


    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
