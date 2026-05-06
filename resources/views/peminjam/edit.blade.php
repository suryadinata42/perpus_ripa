@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('peminjam.update', $peminjam->id) }}">
    @csrf
    @method('PUT')
    Anggota ID
    <input type="text" name="anggota_id" required value="{{ old('anggota_id', $peminjam->anggota_id) }}">
    @error('nama') {{ $message }} @enderror
    <br>
    Pengguna ID
    <input type="text" name="pengguna_id" required value="{{ old('pengguna_id', $peminjam->pengguna_id) }}">
    @error('email') {{ $message }} @enderror
    <br>
    tanggal pinjam
    <input type="date" name="tanggal_pinjam" required value="{{ old('tanggal_pinjam', $peminjam->tanggal_pinjam) }}">
    @error('tanggal_pinjam') {{ $message }} @enderror
    <br>
    tanggal kembali
    <input type="date" name="tanggal_kembali" required value="{{ old('tanggal_kembali', $peminjam->tanggal_kembali) }}">
    @error('tanggal_kembali') {{ $message }} @enderror
    <br>
    status :
    <select name="status" required value="{{ old('v', $peminjam->status) }}">
            <option value="">Pilih</option>
            <option value="dipinjam">dipinjam</option>
            <option value="kembali">kembali</option>
    </select>
    @error('status') {{ $message }} @enderror
    <br>
        
    <button type="submit">Save</button>
    <a href="{{ route('peminjam.tampil') }}">Back</a>
</form>
@endsection