@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('pengguna.simpan') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="nama">Nama Pengguna</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
        @error('nama') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
        @error('email') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="peran">Peran Pengguna</label>
        <select name="peran" id="peran" class="form-control" required>
            <option value="">-- Pilih Peran --</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        @error('peran') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('pengguna.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection