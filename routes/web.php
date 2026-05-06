<?php

use App\Http\Controllers\ControlAnggota;
use App\Http\Controllers\ControlBuku;
use App\Http\Controllers\ControlKategori;
use App\Http\Controllers\ControlDashboard;
use App\Http\Controllers\ControlDetail_pengembalian;
use App\Http\Controllers\ControlPeminjam;
use App\Http\Controllers\ControlPengembalian;
use App\Http\Controllers\ControlPengguna;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
}) ->name('home');


Route::get('/home', [ControlDashboard::class, 'index'])->name('home');
// Router buat Anggota
Route::get('/anggota',[ControlAnggota::class,'tampil'])->name("anggota.tampil");
Route::get('/anggota/tambah',[ControlAnggota::class,'tambah'])->name("anggota.tambah");
Route::post('/anggota/simpan',[ControlAnggota::class,'simpan'])->name("anggota.simpan");
Route::get('/anggota/{id}/edit',[ControlAnggota::class,'edit'])->name("anggota.edit");
Route::put('/anggota/{id}/update',[ControlAnggota::class,'update'])->name("anggota.update");
Route::delete('/anggota/{id}/hapus',[ControlAnggota::class,'hapus'])->name("anggota.hapus");

// Router Buat Kategori
Route::get('/kategori',[ControlKategori::class,'tampil'])->name("kategori.tampil");
Route::get('/kategori/tambah',[ControlKategori::class,'tambah'])->name("kategori.tambah");
Route::post('/kategori/simpan',[ControlKategori::class,'simpan'])->name("kategori.simpan");
Route::get('/kategori/{id}/edit',[ControlKategori::class,'edit'])->name("kategori.edit");
Route::put('/kategori/{id}/update',[ControlKategori::class,'update'])->name("kategori.update");
Route::delete('/kategori/{id}/hapus',[ControlKategori::class,'hapus'])->name("kategori.hapus");

// Router Buat buku
Route::get('/buku',[ControlBuku::class,'tampil'])->name("buku.tampil");
Route::get('/buku/tambah',[ControlBuku::class,'tambah'])->name("buku.tambah");
Route::post('/buku/simpan',[ControlBuku::class,'simpan'])->name("buku.simpan");
Route::get('/buku/{id}/edit',[ControlBuku::class,'edit'])->name("buku.edit");
Route::put('/buku/{id}/update',[ControlBuku::class,'update'])->name("buku.update");
Route::delete('/buku/{id}/hapus',[ControlBuku::class,'hapus'])->name("buku.hapus");

// Router Buat Pengguna
Route::get('/pengguna',[ControlPengguna::class,'tampil'])->name("pengguna.tampil");
Route::get('/pengguna/tambah',[ControlPengguna::class,'tambah'])->name("pengguna.tambah");
Route::post('/pengguna/simpan',[ControlPengguna::class,'simpan'])->name("pengguna.simpan");
Route::get('/pengguna/{id}/edit',[ControlPengguna::class,'edit'])->name("pengguna.edit");
Route::put('/pengguna/{id}/update',[ControlPengguna::class,'update'])->name("pengguna.update");
Route::delete('/pengguna/{id}/hapus',[ControlPengguna::class,'hapus'])->name("pengguna.hapus");

Route::get('/peminjam',[ControlPeminjam::class,'tampil'])->name("peminjam.tampil");
Route::get('/peminjam/tambah',[ControlPeminjam::class,'tambah'])->name("peminjam.tambah");
Route::post('/peminjam/simpan',[ControlPeminjam::class,'simpan'])->name("peminjam.simpan");
Route::get('/peminjam/{id}/edit',[ControlPeminjam::class,'edit'])->name("peminjam.edit");
Route::put('/peminjam/{id}/update',[ControlPeminjam::class,'update'])->name("peminjam.update");
Route::delete('/peminjam/{id}/hapus',[ControlPeminjam::class,'hapus'])->name("peminjam.hapus");

Route::get('pengembalian',[ControlPengembalian::class,'tampil'])->name("pengembalian.tampil");
Route::get('/pengembalian/tambah',[ControlPengembalian::class,'tambah'])->name("pengembalian.tambah");
Route::post('/pengembalian/simpan',[ControlPengembalian::class,'simpan'])->name("pengembalian.simpan");
Route::get('/pengembalian/{id}/edit',[ControlPengembalian::class,'edit'])->name("pengembalian.edit");
Route::put('/pengembalian/{id}/update',[ControlPengembalian::class,'update'])->name("pengembalian.update");
Route::delete('/pengembalian/{id}/hapus',[ControlPengembalian::class,'hapus'])->name("pengembalian.hapus");

Route::get('detail_pengembalian',[ControlDetail_pengembalian::class,'tampil'])->name("detail_pengembalian.tampil");
Route::get('/detail_pengembalian/tambah',[ControlDetail_pengembalian::class,'tambah'])->name("detail_pengembalian.tambah");
Route::post('/detail_pengembalian/simpan',[ControlDetail_pengembalian::class,'simpan'])->name("detail_pengembalian.simpan");
Route::get('/detail_pengembalian/{id}/edit',[ControlDetail_pengembalian::class,'edit'])->name("detail_pengembalian.edit");
Route::put('/detail_pengembalian/{id}/update',[ControlDetail_pengembalian::class,'update'])->name("detail_pengembalian.update");
Route::delete('/detail_pengembalian/{id}/hapus',[ControlDetail_pengembalian::class,'hapus'])->name("detail_pengembalian.hapus");




