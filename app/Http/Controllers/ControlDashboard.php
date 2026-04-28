<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDashboard;

class ControlDashboard extends Controller
{
	public function index()
	{
		$dash = new ModelDashboard();
		$jumlah_anggota = $dash->jumlah_anggota();
		$jumlah_buku = $dash->jumlah_buku();
		$jumlah_kategori = $dash->jumlah_kategori();
		return view('dashboard.tampil', compact('jumlah_anggota', 'jumlah_buku', 'jumlah_kategori'));
	}
}