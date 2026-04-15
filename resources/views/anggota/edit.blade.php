@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('anggota.update', $anggota->id) }}">
    @csrf
    @method('PUT')
    Kode anggota
    <input type="number" name="kode_anggota" required readonly value="{{ old("kode_anggota",$anggota->kode_anggota) }}">
    @error('kode_anggota') {{ $message }} @enderror
    <br>
    nama
    <input type="text" name="nama" required value="{{ old('nama', $anggota->nama) }}">
    @error('nama') {{ $message }} @enderror
    <br>
    alamat
    <textarea name="alamat" required>{{ $anggota->alamat }}</textarea>
    @error('alamat') {{ $message }} @enderror
    <br>
    no hp
    <input type="number" name="no_hp" required value="{{ old('no_hp', $anggota->no_hp) }}">
    @error('no_hp') {{ $message }} @enderror
    <br>
    email
    <input type="text" name="email" required  value="{{ old('email', $anggota->email) }}">
    @error('email') {{ $message }} @enderror
    <br>
    tanggal daftar
    <input type="date" name="tanggal_daftar" required  value="{{ old('tanggal_daftar', $anggota->tanggal_daftar) }}">
    @error('tanggal_daftar') {{ $message }} @enderror
    <br>
    status
    <select id="status" name="status">
        <option value="aktif">Active</option>
        <option value="nonaktif">Non-Active</option>
    @error('status') {{ $message }} @enderror
    </select>
    <br>

    <button type="submit">Save</button>
    <a href="{{ route('anggota.tampil') }}">Back</a>
</form>
@endsection