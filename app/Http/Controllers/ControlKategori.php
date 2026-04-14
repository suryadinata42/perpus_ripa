<?php

namespace App\Http\Controllers;
use App\Models\ModelKategori;
use Illuminate\Http\Request;

class ControlKategori extends Controller
{
    public function tampil()
    {
        $kategori = ModelKategori::all();
        return view("kategori.tampil",compact('kategori'));
    }

    public function tambah()
    {
        return view('kategori.tambah');
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

        return redirect()->route('kategori.tampil')->with('Berhasil','Data Tersimpan');

    }

    public function edit($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        return view('kategori.edit',compact('kategori'));
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

        return redirect()->route('kategori.tampil')->with('Berhasil','Data Tersimpan');
    }

    public function hapus($id)
    {    
        $kategori = ModelKategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.tampil')->with('Berhasil','Data Terhapus');
    }
}
