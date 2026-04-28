<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPeminjam extends Model
{
    protected $table='peminjam';
    protected $fillable = ['anggota_id'];
}
