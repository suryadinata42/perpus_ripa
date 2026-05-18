<?php

namespace App\Http\Controllers;

use App\Models\ModelDetailpeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlDetailpeminjaman extends Controller
{
    public function tampil()
    {
        $judul = 'Data Detail Peminjaman';
        $dpeminjaman = DB::table('detail_peminjaman')
        ->join('peminjam', 'detail_peminjaman.peminjam_id', '=', 'peminjam.id')
        ->join('buku', 'detail_peminjaman.buku_id', '=', 'buku.kode_buku')
        ->get();
        return view('detail_peminjaman.tampil',compact('dpeminjaman','judul'));
    }
    public function tambah()
    {
        $judul = 'Tambah Data Detail Peminjaman';
        $peminjam = DB::table('peminjam')->get();
        $buku = DB::table('buku')->get();
        return view('detail_peminjaman.tambah', compact('peminjam', 'buku', 'judul'));
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
        $judul = 'Edit Data Detail Peminjaman';
        $dpeminjaman = ModelDetailpeminjaman::findOrFail($id);
        $peminjam = DB::table('peminjam')->get();
        $buku = DB::table('buku')->get();
        return view('detail_peminjaman.edit',compact('dpeminjaman', 'peminjam', 'buku', 'judul'));
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
