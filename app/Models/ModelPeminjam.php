<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPeminjam extends Model
{
    protected $table='peminjam';
    protected $fillable = ['anggota_id','pengguna_id','tanggal_pinjam','tanggal_kembali','status'];
}
