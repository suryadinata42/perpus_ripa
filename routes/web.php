<?php

use App\Http\Controllers\ControlAnggota;
use App\Http\Controllers\ControlBuku;
use App\Http\Controllers\ControlKategori;
use App\Http\Controllers\ControlDashboard;
use App\Http\Controllers\ControlDetailpeminjaman;
use App\Http\Controllers\ControlLogin;
use App\Http\Controllers\ControlPeminjam;
use App\Http\Controllers\ControlPengembalian;
use App\Http\Controllers\ControlPengguna;
use App\Http\Controllers\ControlProfile;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [ControlLogin::class, 'tampil'])->name('login');
    Route::post('/login', [ControlLogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    Route::get('/logout', [ControlLogin::class, 'logout'])->name('logout');
    

    Route::get('/dashboard', [ControlDashboard::class, 'tampil'])->name('dashboard.tampil');
    // Router buat Anggota
    Route::get('/anggota',[ControlAnggota::class,'tampil'])->name("anggota.tampil");
    Route::get('/anggota/tambah',[ControlAnggota::class,'tambah'])->name("anggota.tambah");
    Route::post('/anggota/simpan',[ControlAnggota::class,'simpan'])->name("anggota.simpan");
    Route::get('/anggota/{kode_anggota}/edit',[ControlAnggota::class,'edit'])->name("anggota.edit");
    Route::put('/anggota/{kode_anggota}/update',[ControlAnggota::class,'update'])->name("anggota.update");
    Route::delete('/anggota/{kode_anggota}/hapus',[ControlAnggota::class,'hapus'])->name("anggota.hapus");

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
    Route::get('/buku/{kode_buku}/edit',[ControlBuku::class,'edit'])->name("buku.edit");
    Route::put('/buku/{kode_buku}/update',[ControlBuku::class,'update'])->name("buku.update");
    Route::delete('/buku/{kode_buku}/hapus',[ControlBuku::class,'hapus'])->name("buku.hapus");

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

    Route::get('detail_peminjaman',[ControlDetailpeminjaman::class,'tampil'])->name("detail_peminjaman.tampil");
    Route::get('/detail_peminjaman/tambah',[ControlDetailpeminjaman::class,'tambah'])->name("detail_peminjaman.tambah");
    Route::post('/detail_peminjaman/simpan',[ControlDetailpeminjaman::class,'simpan'])->name("detail_peminjaman.simpan");
    Route::get('/detail_peminjaman/{id}/edit',[ControlDetailpeminjaman::class,'edit'])->name("detail_peminjaman.edit");
    Route::put('/detail_peminjaman/{id}/update',[ControlDetailpeminjaman::class,'update'])->name("detail_peminjaman.update");
    Route::delete('/detail_peminjaman/{id}/hapus',[ControlDetailpeminjaman::class,'hapus'])->name("detail_peminjaman.hapus");


    Route::get('/profile', [ControlProfile::class, 'tampil'])->name('profile.tampil');
    Route::get('/profile/edit', [ControlProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ControlProfile::class, 'update'])->name('profile.update');
});
