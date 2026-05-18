<?php

namespace App\Http\Controllers;
use App\Models\ModelKategori;
use Illuminate\Http\Request;

class ControlKategori extends Controller
{
    public function tampil()
    {
        $judul = 'Data kategori';
        $kategori = ModelKategori::all();
        return view("kategori.tampil",compact('kategori','judul'));
    }

    public function tambah()
    {
        $judul = 'Tambah Data Kategori';
        $kategori = ModelKategori::all();
        return view('kategori.tambah', compact('judul', 'kategori'));
    }

    public function simpan(request $request)
    {
        $request->validate([
            'nama_kategori' => "required|regex:/^[\pL\s]+$/u",
        ]);

        $kategori = new ModelKategori();
        $kategori -> nama_kategori = $request -> nama_kategori;
        $kategori -> deskripsi = $request -> deskripsi;
        $kategori -> save();

        return redirect()->route('kategori.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);

    }

    public function edit($id)
    {
        $judul = 'Edit Data Kategori';
        $kategori = ModelKategori::findOrFail($id);
        return view('kategori.edit',compact('kategori', 'judul'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'nama_kategori' => "required|regex:/^[\pL\s]+$/u",
        ]);

        $kategori = ModelKategori::findOrFail($id);
        $kategori -> nama_kategori = $request -> nama_kategori;
        $kategori -> deskripsi = $request -> deskripsi;
        $kategori -> save();

        return redirect()->route('kategori.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function hapus($id)
    {    
        $kategori = ModelKategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data Terhapus', 'icon' => 'success']);
    }
}
