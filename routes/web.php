<?php

use App\Http\Controllers\ControlAnggota;
use App\Http\Controllers\ControlBuku;
use App\Http\Controllers\ControlKategori;
use App\Http\Controllers\ControlDashboard;
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