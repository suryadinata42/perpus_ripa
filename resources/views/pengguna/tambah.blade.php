@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('pengguna.simpan') }}">
    @csrf
    Nama Pengguna
    <input type="text" name="nama" required>
    @error('nama') {{ $message }} @enderror
    <br>
    email
    <input type="text" name="email" required>
    @error('email') {{ $message }} @enderror
    <br>
    password
    <input type="text" name="password" required>
    @error('password') {{ $message }} @enderror
    <br>
    Peran Pengguna:
    <select name="peran" required>
            <option value="">Pilih</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
    </select>
    @error('varian') {{ $message }} @enderror
    <br>

    <button type="submit">Save</button>
    <a href="{{ route('pengguna.tampil') }}">Back</a>
</form>
@endsection