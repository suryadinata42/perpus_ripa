<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDashboard extends Model
{
	use HasFactory;

	public function jumlah_anggota()
	{
		return DB::table('anggota')->count();
	}

	public function jumlah_buku()
	{
		return DB::table('buku')->count();
	}

	public function jumlah_kategori()
	{
		return DB::table('kategori')->count();
	}
}
