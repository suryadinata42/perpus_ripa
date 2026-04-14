<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAnggota extends Model
{
    protected $table = "anggota";
    protected $fillable = ['kode_anggota','nama','alamat','no_hp','email','tanggal_daftar','status'];
}
