<?php

namespace App\Http\Controllers;

use App\Models\ModelDetailpeminjaman;
use Illuminate\Http\Request;

class ControlDetailpeminjaman extends Controller
{
    public function tampil()
    {
        $judul = 'Data Detail Peminjaman';
        $dpeminjaman = ModelDetailpeminjaman::all();
        return view('detail_peminjaman.tampil',compact('dpeminjaman','judul'));
    }
    public function tambah()
    {
        return view('detail_peminjaman.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'jumlah' => "required",
            
        ]);

        $dpeminjaman = new ModelDetailpeminjaman();
        $dpeminjaman -> peminjam_id = $request->peminjam_id;
        $dpeminjaman -> buku_id = $request->buku_id;
        $dpeminjaman -> jumlah = $request->jumlah;
        $dpeminjaman -> save();

        return redirect()->route('detail_peminjaman.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $dpeminjaman = ModelDetailpeminjaman::findOrFail($id);
        return view('detail_peminjaman.edit',compact('dpeminjaman'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'jumlah' => "required", 
        ]);

        $dpeminjaman = ModelDetailpeminjaman::findOrFail($id);
        $dpeminjaman -> peminjam_id = $request->peminjam_id;
        $dpeminjaman -> buku_id = $request->buku_id;
        $dpeminjaman -> jumlah = $request->jumlah;
        $dpeminjaman -> save();


        return redirect()->route('detail_peminjaman.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        
    }
    public function hapus($id)
    {
        $dpeminjaman = ModelDetailpeminjaman::findOrFail($id);
        $dpeminjaman->delete();
        return redirect()->route('detail_peminjaman.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }
}
