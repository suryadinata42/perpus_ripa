<?php

namespace App\Http\Controllers;
use App\Models\ModelPengembalian;
use Illuminate\Http\Request;

class ControlPengembalian extends Controller
{
    public function tampil()
    {
        $judul = 'Data pengembalian';
        $pengembalian = ModelPengembalian::all();
        return view('pengembalian.tampil',compact('pengembalian'));
    }
    public function tambah()
    {
        return view('pengembalian.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => "required",
            'email' => "required", 
            'password' => "required",
        ]);

        $pengembalian = new ModelPengembalian();
        $pengembalian -> peminjam_id = $request->nama;
        $pengembalian -> tanggal_dikembalikan = $request->email;
        $pengembalian -> denda = $request->peran;
        $pengembalian -> kondisi_buku = $request->kondisi_buku;
        $pengguna -> save();

        return redirect()-> route('pengembalian.tampil')->with('Berhasil','Data Tersimpan');
    }

    public function edit($id)
    {
        $pengembalian = ModelPengembalian::findOrFail($id);
        return view('pengembalian.edit',compact('pengembalian'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'email' => "required", 
            'password' => "required",
        ]);

        $pengguna = ModelPengembalian::findOrFail($id);
        $pengguna -> nama = $request->nama;
        $pengguna -> email = $request->email;
        $pengguna -> password = $request->password;
        $pengguna -> peran = $request->peran;
        $pengguna->save();

        return redirect()-> route('pengembalian.tampil')->with('Berhasil','Data Tersimpan');
        
    }
    public function hapus($id)
    {
        $pengembalian = ModelPengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.tampil')->with('Sukses', 'Data Terhapus');
    }
}
