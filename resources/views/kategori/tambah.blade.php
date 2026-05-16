@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('kategori.simpan') }}">
    @csrf
    
    <div class="form-group mb-3">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
        @error('nama_kategori') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
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