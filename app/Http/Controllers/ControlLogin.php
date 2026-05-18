<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ControlLogin extends Controller
{
    public function tampil()
    {
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ], [
        'username.required' => 'Username wajib diisi',
        'password.required' => 'Password wajib diisi',
    ]);

    $credentials = $request->only('username', 'password');

    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return redirect()->route('login')
            ->withErrors([
                'username' => 'Username tidak ditemukan'
            ]);
    }

    if (!Auth::attempt($credentials)) {
        return redirect()->route('login')
            ->withErrors([
                'password' => 'Password salah'
            ]);
    }

    return redirect()->route('home');
    }
    public function logout(Request $request)
    {
        // 1. Keluarkan user menggunakan Facade Auth
        Auth::logout();

        // 2. Hancurkan session yang digunakan user saat ini agar tidak bisa digunakan lagi
        $request->session()->invalidate();

        // 3. Buat ulang token CSRF baru untuk keamanan
        $request->session()->regenerateToken();

        // 4. Lempar balik ke halaman login (sesuai name route kamu yaitu 'login')
        return redirect()->route('login');
    }
}
