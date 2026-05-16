<?php

namespace App\Http\Controllers;
use App\Models\ModelPengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlPengembalian extends Controller
{
    public function tampil()
    {
        $judul = 'Data Pengembalian';
        $pengembalian = ModelPengembalian::all();
        return view('pengembalian.tampil',compact('pengembalian','judul'));
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
        $pengembalian -> save();

        return redirect()->route('pengembalian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
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

        $pengembalian = ModelPengembalian::findOrFail($id);
        $pengembalian -> peminjam_id = $request->nama;
        $pengembalian -> tanggal_dikembalikan = $request->email;
        $pengembalian -> denda = $request->peran;
        $pengembalian -> kondisi_buku = $request->kondisi_buku;
        $pengembalian->save();

        return redirect()->route('pengembalian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        
    }
    public function hapus($id)
    {
        $pengembalian = ModelPengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Terhapus', 'icon' => 'success']);
    }
}
