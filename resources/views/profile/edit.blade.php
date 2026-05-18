@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $user->name) }}">
        @error('nama') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required value="{{ old('username', $user->username) }}">
        @error('username') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Alamat Email</label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $user->email) }}">
        @error('email') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password">Password Baru (Kosongkan jika tidak ingin diubah)</label>
        <input type="password" name="password" id="password" class="form-control">
        @error('password') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password_confirmation">Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="foto_profil">Foto Profil (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" name="foto_profil" id="foto_profil" class="form-control">
        @error('foto_profil') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('profile.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>
@endsection