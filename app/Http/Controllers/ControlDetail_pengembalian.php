<?php

namespace App\Http\Controllers;

use App\Models\ModelDetail_pengembalian;
use Illuminate\Http\Request;

class ControlDetail_pengembalian extends Controller
{
    public function tampil()
    {
        $judul = 'Data detail pengembalian';
        $detail_pengembalian = ModelDetail_pengembalian::all();
        return view('detail_pengembalian.tampil',compact('detail_pengembalian'));
    }
    public function tambah()
    {
        return view('detail_pengembalian.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'jumlah' => "required",
            
        ]);

        $detail_pengembalian = new ModelDetail_pengembalian();
        $detail_pengembalian -> peminjam_id = $request->peminjam_id;
        $detail_pengembalian -> buku_id = $request->buku_id;
        $detail_pengembalian -> jumlah = $request->detail_pengembalian;
        $detail_pengembalian -> save();

        return redirect()-> route('detail_pengembalian.tampil')->with('Berhasil','Data Tersimpan');
    }

    public function edit($id)
    {
        $detail_pengembalian = ModelDetail_pengembalian::findOrFail($id);
        return view('detail_pengembalian.edit',compact('detail_pengembalian'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'jumlah' => "required", 
        ]);

        $detail_pengembalian = ModelDetail_pengembalian::findOrFail($id);
        $detail_pengembalian -> peminjam_id = $request->peminjam_id;
        $detail_pengembalian -> buku_id = $request->buku_id;
        $detail_pengembalian -> jumlah = $request->detail_pengembalian;
        $detail_pengembalian -> save();


        return redirect()-> route('detail_pengembalian.tampil')->with('Berhasil','Data Tersimpan');
        
    }
    public function hapus($id)
    {
        $detail_pengembalian = ModelDetail_pengembalian::findOrFail($id);
        $detail_pengembalian->delete();
        return redirect()->route('detail_pengembalian.tampil')->with('Sukses', 'Data Terhapus');
    }
}
