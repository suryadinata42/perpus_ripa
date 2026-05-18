<?php

namespace App\Http\Controllers;
use App\Models\ModelAnggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class ControlAnggota extends Controller
{
    public function tampil()
    {
        $judul = 'Data anggota';
        $anggota = ModelAnggota::all();
        return view('anggota.tampil', compact('anggota','judul'));
    }

    public function tambah()
    {
        $judul = 'Tambah Data Anggota';
        $anggota = ModelAnggota::all();
        return view ("anggota.tambah", compact('judul', 'anggota'));
        
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_anggota' => "required|numeric|max_digits:6|unique:anggota,kode_anggota",
            'nama' => "required|regex:/^[\pL\s]+$/u",
        ]);

        $anggota = new ModelAnggota();
        $anggota -> anggota_id = $request->anggota_id;
        $anggota -> nama = $request->nama;
        $anggota -> alamat = $request->alamat;
        $anggota -> no_hp = $request->no_hp;
        $anggota -> email = $request->email;
        $anggota -> tanggal_daftar = $request->tanggal_daftar;
        $anggota -> status = $request->status;
        $anggota -> save();

        return redirect()->route('anggota.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        // return redirect()-> route('anggota.tampil')->with('Berhasil','Data Tersimpan');
    }

    public function edit($kode_anggota)
    {
        $judul = 'Edit Data Anggota';
        $anggota = ModelAnggota::where("kode_anggota", $kode_anggota)->first();
        return view('anggota.edit',compact('anggota','judul'));
    }

    public function update(Request $request, $kode_anggota)
    {
        $request->validate([
            'nama' => "required|regex:/^[\pL\s]+$/u",
        ]);

        $anggota = ModelAnggota::where("kode_anggota", $kode_anggota)->first();
        $anggota->update([
            'anggota_id' => $request->anggota_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'tanggal_daftar' => $request->tanggal_daftar,
            'status' => $request->status,

        ]);
         return redirect()->route('anggota.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function hapus($kode_anggota)
    {
        $anggota = ModelAnggota::where("kode_anggota", $kode_anggota)->first();
        $anggota->delete();
         return redirect()->route('anggota.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }
}

