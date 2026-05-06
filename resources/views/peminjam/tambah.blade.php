@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('peminjam.simpan') }}">
    @csrf
    Anggota ID
    <input type="text" name="anggota_id" required>
    @error('nama') {{ $message }} @enderror
    <br>
    Pengguna ID
    <input type="text" name="pengguna_id" required>
    @error('email') {{ $message }} @enderror
    <br>
    tanggal pinjam
    <input type="date" name="tanggal_pinjam" required>
    @error('tanggal_pinjam') {{ $message }} @enderror
    <br>
    tanggal kembali
    <input type="date" name="tanggal_kembali" required>
    @error('tanggal_kembali') {{ $message }} @enderror
    <br>
    status :
    <select name="status" required>
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