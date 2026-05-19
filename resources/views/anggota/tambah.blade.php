@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('anggota.simpan') }}">
    @csrf

    <!-- Kode Anggota -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="kode_anggota" class="col-form-label">Kode Anggota</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="kode_anggota" id="kode_anggota" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('kode_anggota') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Nama -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="nama" class="col-form-label">Nama</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('nama') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Alamat -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="alamat" class="col-form-label">Alamat</label>
        </div>
        <div class="col-sm-10">
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <div class="col-auto">
            @error('alamat') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- No HP -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="no_hp" class="col-form-label">No HP</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="no_hp" id="no_hp" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('no_hp') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Email -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="col-sm-10">
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('email') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tanggal Daftar -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="tanggal_daftar" class="col-form-label">Tanggal Daftar</label>
        </div>
        <div class="col-sm-10">
            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('tanggal_daftar') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Status -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="status" class="col-form-label">Status</label>
        </div>
        <div class="col-sm-10">
            <select id="status" name="status" class="form-control" required>
                <option value="aktif">Active</option>
                <option value="nonaktif">Non-Active</option>
            </select>
        </div>
        <div class="col-auto">
            @error('status') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('anggota.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>

@endsection