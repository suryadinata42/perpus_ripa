@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('buku.update', $buku->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="kode_buku">Kode Buku</label>
        <input type="number" name="kode_buku" id="kode_buku" class="form-control" required readonly value="{{ old('kode_buku', $buku->kode_buku) }}">
        @error('kode_buku') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required value="{{ old('judul', $buku->judul) }}">
        @error('judul') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis" class="form-control" required value="{{ old('penulis', $buku->penulis) }}">
        @error('penulis') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control" required value="{{ old('penerbit', $buku->penerbit) }}">
        @error('penerbit') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="tahun_terbit">Tahun Terbit (Hanya Tahun)</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" min="1900" max="{{ date('Y') }}" placeholder="Contoh: 2023" required value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
        @error('tahun_terbit') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="isbn">ISBN</label>
        <!-- BUG FIX: Sebelumnya value="{{ old('kode_buku', $buku->tahun_terbit) }}" -->
        <input type="number" name="isbn" id="isbn" class="form-control" required value="{{ old('isbn', $buku->isbn) }}">
        @error('isbn') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="jumlah_total">Jumlah Total</label>
        <input type="number" name="jumlah_total" id="jumlah_total" class="form-control" required value="{{ old('jumlah_total', $buku->jumlah_total) }}">
        @error('jumlah_total') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="jumlah_tersedia">Jumlah Tersedia</label>
        <input type="number" name="jumlah_tersedia" id="jumlah_tersedia" class="form-control" required value="{{ old('jumlah_tersedia', $buku->jumlah_tersedia) }}">
        @error('jumlah_tersedia') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="kategori_id">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $ktgr)
                <!-- Tambahan old() agar jika validasi error, pilihan sebelumnya tidak hilang -->
                <option value="{{ $ktgr->id }}" {{ old('kategori_id', $buku->kategori_id) == $ktgr->id ? 'selected' : '' }}>
                    {{ $ktgr->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('buku.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>
@endsection