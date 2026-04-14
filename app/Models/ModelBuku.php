<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBuku extends Model
{
    protected $table='buku';
    protected $fillable = ['kode_anggota','judul','penulis','penerbit','tahun_terbit','isbn','jumalah_total','jumlah_tersedia','kategori_id'];
}
