<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetailpeminjaman extends Model
{
    use HasFactory;
    protected $table ='detail_peminjaman';
    protected $fillable = ['peminjam_id','buku_id','jumlah'];
}
