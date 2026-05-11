<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetail_pengembalian extends Model
{
    use HasFactory;
    protected $table ='detail_pengembalian';
    protected $fillable = ['peminjam_id','buku_id','jumlah'];
}
