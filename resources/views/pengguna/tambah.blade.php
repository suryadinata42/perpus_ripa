@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('pengguna.simpan') }}">
    @csrf

    <!-- Nama Pengguna -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="nama" class="col-form-label">Nama Pengguna</label>
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

    <!-- Password -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="password" class="col-form-label">Password</label>
        </div>
        <div class="col-sm-10">
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('password') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Peran Pengguna -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="peran" class="col-form-label">Peran Pengguna</label>
        </div>
        <div class="col-sm-10">
            <select name="peran" id="peran" class="form-control" required>
                <option value="">-- Pilih Peran --</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <div class="col-auto">
            @error('peran') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('pengguna.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>

@endsection