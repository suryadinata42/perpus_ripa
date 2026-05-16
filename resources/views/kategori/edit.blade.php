@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama_kategori">Nama Kategori</label>
        <!-- Perbaikan: Mengubah old('nama') menjadi old('nama_kategori') -->
        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
        @error('nama_kategori') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <!-- Perbaikan: Menambahkan fungsi old() pada textarea -->
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        @error('deskripsi') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('kategori.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection