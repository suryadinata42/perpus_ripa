<?php

namespace App\Http\Controllers;
use App\Models\ModelPengguna;
use Illuminate\Http\Request;

class ControlPengguna extends Controller
{
    public function tampil()
    {
        $judul = 'Data Pengguna';
        $pengguna = ModelPengguna::all();
        return view('pengguna.tampil',compact('pengguna','judul'));
    }
    public function tambah()
    {
        return view('pengguna.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'email' => "required", 
            'password' => "required",
        ]);

        $pengguna = new ModelPengguna();
        $pengguna -> nama = $request->nama;
        $pengguna -> email = $request->email;
        $pengguna -> password = bcrypt($request->password);
        $pengguna -> peran = $request->peran;
        $pengguna -> save();

        return redirect()->route('pengguna.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $pengguna = ModelPengguna::findOrFail($id);
        return view('pengguna.edit',compact('pengguna'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'email' => "required", 
            'password' => "required",
        ]);

        $pengguna = ModelPengguna::findOrFail($id);
        $pengguna -> nama = $request->nama;
        $pengguna -> email = $request->email;
        $pengguna -> password = $request->password;
        $pengguna -> peran = $request->peran;
        $pengguna->save();

        return redirect()->route('pengguna.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        
    }
    public function hapus($id)
    {
        $pengguna = ModelPengguna::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('pengguna.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Terhapus', 'icon' => 'success']);
    }
}
