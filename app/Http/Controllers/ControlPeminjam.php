<?php

namespace App\Http\Controllers;
use App\Models\ModelPeminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlPeminjam extends Controller
{
    public function tampil()
    {
        $judul = 'Data pengguna';
        $peminjam = ModelPeminjam::all();
        return view('peminjam.tampil',compact('peminjam'));
    }
    public function tambah()
    {
        return view('peminjam.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            
        ]);

        $peminjam = new ModelPeminjam();
        $peminjam -> anggota_id = $request->anggota_id;
        $peminjam -> pengguna_id = $request->pengguna_id;
        $peminjam -> tanggal_pinjam = $request->tanggal_pinjam;
        $peminjam -> tanggal_kembali = $request->tanggal_kembali;
        $peminjam -> status = $request->status;
        $peminjam -> save();

        return redirect()-> route('peminjam.tampil')->with('Berhasil','Data Tersimpan');
    }

    public function edit($id)
    {
        $peminjam = ModelPeminjam::findOrFail($id);
        return view('peminjam.edit',compact('peminjam'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
        
        ]);

        $peminjam = ModelPeminjam::findOrFail($id);
        $peminjam -> anggota_id = $request->anggota_id;
        $peminjam -> pengguna_id = $request->pengguna_id;
        $peminjam -> tanggal_pinjam = $request->tanggal_pinjam;
        $peminjam -> tanggal_kembali = $request->tanggal_kembali;
        $peminjam -> status = $request->status;
        $peminjam -> save();

        return redirect()-> route('peminjam.tampil')->with('Berhasil','Data Tersimpan');
        
    }
    public function hapus($id)
    {
        $penggpeminjamuna = ModelPeminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->route('peminjam.tampil')->with('Sukses', 'Data Terhapus');
    }
}
