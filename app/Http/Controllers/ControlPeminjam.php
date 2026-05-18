<?php

namespace App\Http\Controllers;
use App\Models\ModelPeminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlPeminjam extends Controller
{
    public function tampil()
    {
        $judul = 'Data Peminjam';
        $peminjam = DB::table('peminjam')
        ->leftJoin('anggota', 'peminjam.anggota_id', '=', 'anggota.id')
        ->leftJoin('pengguna', 'peminjam.pengguna_id', '=', 'pengguna.id')
        ->select('peminjam.*', 'pengguna.id as pengguna_id', 'anggota.kode_anggota')
        ->get();
        return view('peminjam.tampil',compact('peminjam','judul'));
    }
    public function tambah()
    {
        $judul = 'Tambah Data Peminjam';
        $anggota = DB::table('anggota')->get();
        $pengguna = DB::table('pengguna')->get();
        return view('peminjam.tambah',compact('anggota','pengguna', 'judul'));
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

        return redirect()->route('peminjam.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $judul = 'Edit Data Peminjam';
        $peminjam = ModelPeminjam::findOrFail($id);
        $anggota = DB::table('anggota')->get();
        $pengguna = DB::table('pengguna')->get();
        return view('peminjam.edit',compact('peminjam','anggota','pengguna', 'judul'));
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

        return redirect()->route('peminjam.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        
    }
    public function hapus($id)
    {
        $peminjam = ModelPeminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->route('peminjam.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Terhapus', 'icon' => 'success']);
    }
}
