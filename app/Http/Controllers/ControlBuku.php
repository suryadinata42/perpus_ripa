<?php

namespace App\Http\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelKategori;
use Illuminate\Http\Request;
use function Illuminate\Support\years;
use Illuminate\Support\Facades\DB;

class ControlBuku extends Controller
{
    public function tampil()
    {
        $judul = 'Data buku';
        
        $buku = DB::table('buku')
        ->leftJoin('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->select('buku.*', 'kategori.nama_kategori', 'kategori.deskripsi')
        ->get();
        return view('buku.tampil',compact('buku'));
    }
    public function tambah()
    {
        $kategori = DB::table('kategori')->get();
        return view('buku.tambah', compact('kategori'));
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

        return redirect()->route('buku.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $buku = ModelBuku::where('id', $id)->first();
        $kategori = DB::table('kategori')->get();
        return view('buku.edit',compact('buku','kategori'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'judul' => "required", 
            'penulis' => "required|string",
            'penerbit' => "required|string",
            'tahun_terbit' => "required|integer|digits:4", 
            'isbn' => "required|numeric",
            'jumlah_total' => "required|integer",
            'jumlah_tersedia' => "required|integer",
        ]);

        $buku = ModelBuku::where('id', $id)->first();
        $buku->update([
        $buku -> kode_buku = $request->kode_buku,
        $buku -> judul = $request->judul,
        $buku -> penulis = $request->penulis,
        $buku -> penerbit = $request->penerbit,
        $buku -> tahun_terbit = $request->tahun_terbit,
        $buku -> isbn = $request->isbn,
        $buku -> jumlah_total = $request->jumlah_total,
        $buku -> jumlah_tersedia = $request->jumlah_tersedia,
        $buku -> kategori_id = $request->kategori_id,
        ]);

        return redirect()->route('buku.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
        
    }
    public function hapus($id)
    {
        $buku = ModelBuku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Terhapus', 'icon' => 'success']);
    }
}
