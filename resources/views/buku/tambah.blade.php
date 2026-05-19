@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('buku.simpan') }}">
    @csrf
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="kode_buku" class="col-form-label">Kode Buku</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="kode_buku" id="kode_buku" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('kode_buku') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="judul" class="col-form-label">Judul</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('judul') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="penulis" class="col-form-label">Penulis</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="penulis" id="penulis" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('penulis') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="penerbit" class="col-form-label">Penerbit</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('penerbit') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="tahun_terbit" class="col-form-label">Tahun Terbit</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>
        <div class="col-auto">
            @error('tahun_terbit') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="isbn" class="col-form-label">ISBN</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="isbn" id="isbn" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('isbn') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="jumlah_total" class="col-form-label">Jumlah Total</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="jumlah_total" id="jumlah_total" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('jumlah_total') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="jumlah_tersedia" class="col-form-label">Jumlah Tersedia</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="jumlah_tersedia" id="jumlah_tersedia" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('jumlah_tersedia') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center">
        <div class="col-sm-2">
            <label for="kategori_id" class="col-form-label">Kategori</label>
        </div>
        <div class="col-sm-10">
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $ktgr)
                    <option value="{{ $ktgr->id }}">
                        {{ $ktgr->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @error('kategori_id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('buku.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>
@endsection