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
        $pengembalian = DB::table('pengembalian')
        ->leftJoin('peminjam', 'pengembalian.peminjam_id', '=', 'peminjam.id')
        ->select('pengembalian.*','peminjam.id as peminjam_id')
        ->get();
        return view('pengembalian.tampil',compact('pengembalian','judul'));
    }
    public function tambah()
    {
        $judul = 'Tambah Data Pengembalian';
        $peminjam = DB::table('peminjam')->get();
        $pengembalian = ModelPengembalian::all();
        return view('pengembalian.tambah', compact('peminjam', 'pengembalian', 'judul'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'peminjam_id' => "required",
            'tanggal_dikembalikan' => "required", 
            'kondisi_buku' => "required",
        ]);

        $pengembalian = new ModelPengembalian();
        $pengembalian -> peminjam_id = $request->peminjam_id;
        $pengembalian -> tanggal_dikembalikan = $request->tanggal_dikembalikan;
        $pengembalian -> denda = $request->denda;
        $pengembalian -> kondisi_buku = $request->kondisi_buku;
        $pengembalian -> save();

        return redirect()->route('pengembalian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $judul = 'Edit Data Pengembalian';
        $peminjam = DB::table('peminjam')->get();
        $pengembalian = ModelPengembalian::findOrFail($id);
        return view('pengembalian.edit',compact('pengembalian', 'peminjam', 'judul'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'tanggal_dikembalikan' => "required", 
            'kondisi_buku' => "required",
        ]);

        $pengembalian = ModelPengembalian::findOrFail($id);
        $pengembalian -> peminjam_id = $request->peminjam_id;
        $pengembalian -> tanggal_dikembalikan = $request->tanggal_dikembalikan;
        $pengembalian -> denda = $request->denda;
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
