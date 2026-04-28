@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
    @csrf
    @method('PUT')
    nama
    <input type="text" name="nama" required value="{{ old('nama', $pengguna->nama) }}">
    @error('nama') {{ $message }} @enderror
    <br>
    email
    <input type="text" name="email" required  value="{{ old('email', $pengguna->email) }}">
    @error('email') {{ $message }} @enderror
    <br>
    password
    <input type="text" name="password" required value="{{ old('password', $pengguna->password) }}">
    @error('password') {{ $message }} @enderror
    <br>
    peran
    <select name="peran" value="{{ old('peran', $pengguna->peran) }}">
        <option value="admin">Admin</option>
        <option value="petugas">Petrugas</option>
    @error('peran') {{ $message }} @enderror
    </select>
    <br>

    <button type="submit">Save</button>
    <a href="{{ route('pengguna.tampil') }}">Back</a>
</form>
@endsection