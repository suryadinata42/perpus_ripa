<?php

namespace App\Http\Controllers;
use App\Models\ModelBuku;
use Illuminate\Http\Request;
use function Illuminate\Support\years;

class ControlBuku extends Controller
{
    public function tampil()
    {
        $buku = ModelBuku::all();
        return view('buku.tampil',compact('buku'));
    }
    public function tambah()
    {
        return view('buku.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'kode_buku' => "required|numeric|max_digits:6|unique:buku,kode_buku",
            'judul' => "required", 
            'penulis' => "required|string",
            'penerbit' => "required|string",
            'tahun_terbit' => "required|integer|digits:4", 
            'isbn' => "required|numeric",
            'jumlah_total' => "required|integer",
            'jumlah_tersedia' => "required|integer",
            'kategori_id' => "required",
        ]);

        $buku = new ModelBuku();
        $buku -> kode_buku = $request->kode_buku;
        $buku -> judul = $request->judul;
        $buku -> penulis = $request->penulis;
        $buku -> penerbit = $request->penerbit;
        $buku -> tahun_terbit = $request->tahun_terbit;
        $buku -> isbn = $request->isbn;
        $buku -> jumlah_total = $request->jumlah_total;
        $buku -> jumlah_tersedia = $request->jumlah_tersedia;
        $buku -> kategori_id = $request->kategori_id;
        $buku -> save();

        return redirect()-> route('buku.tampil')->with('Berhasil','Data Tersimpan');
    }
}
