<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengembalian extends Model
{
    use HasFactory;
    protected $table ='pengembalian';
    protected $fillable = ['peminjam_id','tanggal_dikembalikan','denda','kondisi_buku'];
}
