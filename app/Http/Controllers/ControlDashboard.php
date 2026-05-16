<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDashboard;

class ControlDashboard extends Controller
{
	public function index()
	{
		$judul = 'Dashboard';
		$dash = new ModelDashboard();
		$jumlah_anggota = $dash->jumlah_anggota();
		$jumlah_buku = $dash->jumlah_buku();
		$jumlah_kategori = $dash->jumlah_kategori();
		$jumlah_pengguna = $dash->jumlah_pengguna();
		$jumlah_peminjaman = $dash->jumlah_peminjaman();
		$jumlah_pengembalian = $dash->jumlah_pengembalian();
		$jumlah_detail_peminjaman = $dash->jumlah_detail_peminjaman();

		return view('dashboard.tampil', compact('jumlah_anggota', 
		'jumlah_buku', 
		'jumlah_kategori', 
		'jumlah_pengguna', 
		'jumlah_peminjaman', 
		'jumlah_pengembalian', 
		'jumlah_detail_peminjaman', 
		'judul'));
	}
}