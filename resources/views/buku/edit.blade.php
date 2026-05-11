@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('buku.update', $buku->id) }}">
    @csrf
    @method('PUT')
    Kode buku
    <input type="number" name="kode_buku" required readonly value="{{ old('kode_buku', $buku->kode_buku) }}">
    @error('kode_buku') {{ $message }} @enderror
    <br>
    Judul
    <input type="text" name="judul" required value="{{ old('judul', $buku->judul) }}">
    @error('judul') {{ $message }} @enderror
    <br>
    penulis
    <input type="text" name="penulis" required value="{{ old('penulis', $buku->penulis) }}">
    @error('penulis') {{ $message }} @enderror
    <br>
    penerbit
    <input type="text" name="penerbit" required value="{{ old('penerbit', $buku->penerbit) }}">
    @error('penerbit') {{ $message }} @enderror
    <br>
    tahun terbit (Hanya Tahun)
    <input type="number" name="tahun_terbit" min="1900" max="{{ date('Y') }}" placeholder="Contoh: 2023" required value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
    @error('tahun_terbit') <div>{{ $message }}</div> @enderror
    <br>
    isbn
    <input type="number" name="isbn" required value="{{ old('kode_buku', $buku->tahun_terbit) }}">
    @error('isbn') {{ $message }} @enderror
    <br>
    jumlah total
    <input type="number" name="jumlah_total" required value="{{ old('jumlah_total', $buku->jumlah_total) }}">
    @error('jumlah_total') {{ $message }} @enderror
    <br>
    jumlah tersedia
    <input type="number" name="jumlah_tersedia" required value="{{ old('jumlah_tersedia', $buku->jumlah_tersedia) }}">
    @error('jumlah_tersedia') {{ $message }} @enderror
    <br>
    Kategori :
    <select name="kategori_id" required >
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $ktgr)
            <option value="{{ $ktgr->id }}" {{ $buku->kategori_id == $ktgr->id ? 'selected' : '' }}>
                {{ $ktgr->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('kategori_id') {{ $message }} @enderror
    <br>    

    <button type="submit">Save</button>
    <a href="{{ route('buku.tampil') }}">Back</a>
</form>
@endsection