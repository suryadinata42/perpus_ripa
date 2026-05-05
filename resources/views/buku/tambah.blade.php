@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('buku.simpan') }}">
    @csrf
    Kode buku
    <input type="number" name="kode_buku" required>
    @error('kode_buku') {{ $message }} @enderror
    <br>
    Judul
    <input type="text" name="judul" required>
    @error('judul') {{ $message }} @enderror
    <br>
    penulis
    <input type="text" name="penulis" required>
    @error('penulis') {{ $message }} @enderror
    <br>
    penerbit
    <input type="text" name="penerbit" required>
    @error('penerbit') {{ $message }} @enderror
    <br>
    tahun terbit (Hanya Tahun)
    <input type="number" name="tahun_terbit" min="1900" max="{{ date('Y') }}" placeholder="" required>
    @error('tahun_terbit') <div>{{ $message }}</div> @enderror
    <br>
    isbn
    <input type="number" name="isbn" required>
    @error('isbn') {{ $message }} @enderror
    <br>
    jumlah total
    <input type="number" name="jumlah_total" required>
    @error('jumlah_total') {{ $message }} @enderror
    <br>
    jumlah tersedia
    <input type="number" name="jumlah_tersedia" required>
    @error('jumlah_tersedia') {{ $message }} @enderror
    <br>
    Kategori :
    <select name="kategori_id" id="pilih_kategori" required onchange="tampilkanDeskripsi()">
        <option value="" data-deskripsi="">-- Pilih Kategori --</option>
        @foreach($kategori as $ktgr)
            <option value="{{ $ktgr->id }}" data-deskripsi="{{ $ktgr->deskripsi }}">
                {{ $ktgr->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('kategori_id') {{ $message }} @enderror
    <br>
    
    Deskripsi Kategori
    <input type="text" id="tampil_deskripsi" readonly placeholder="Deskripsi akan muncul otomatis..." style="background-color: #e9ecef; cursor: not-allowed;">
    <br><br>

    <button type="submit">Save</button>
    <a href="{{ route('buku.tampil') }}">Back</a>
</form>
@endsection