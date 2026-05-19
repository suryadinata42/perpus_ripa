@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('kategori.simpan') }}">
    @csrf
    
    <!-- Nama Kategori -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('nama_kategori') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="deskripsi" class="col-form-label">Deskripsi</label>
        </div>
        <div class="col-sm-10">
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="col-auto">
            @error('deskripsi') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
   
    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('kategori.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>

@endsection