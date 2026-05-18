<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ControlProfile extends Controller
{
    public function tampil()
    {
        $judul = 'Profil Pengguna';
        return view('profile.tampil', compact('judul'));
    }

    public function edit()
    {
        $judul = 'Edit Profil';
        $user = Auth::user();
        return view('profile.edit', compact('judul', 'user'));
        
    }

    public function update(Request $request)
    {   
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data teks
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
        
            $user->password = Hash::make($request->password);
        }
        
        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }
            $path = $request->file('foto_profil')->store('profile_photos', 'public');
            $user->foto_profil = $path;
        }
        $user->save();

        return redirect()->route('profile.tampil')->with('success', 'Profil berhasil diperbarui!');
    }
}
