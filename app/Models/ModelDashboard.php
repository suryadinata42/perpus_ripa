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

	public function jumlah_pengguna()
	{
		return DB::table('pengguna')->count();
	}

	public function jumlah_peminjaman()
	{
		return DB::table('peminjam')->count();
	}

	public function jumlah_pengembalian()
	{
		return DB::table('pengembalian')->count();
	}

	public function jumlah_detail_peminjaman()
	{
		return DB::table('detail_peminjaman')->count();
	}
}
