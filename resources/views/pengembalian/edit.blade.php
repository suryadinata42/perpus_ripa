@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('pengembalian.update') }}">
    @csrf
    Peminjam ID :
    <select name="peminjam_id" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($peminjam as $pmj)
            <option value="{{ $peminjam->id }}" {{ $pmj->peminjam_id === $peminjam->id ? 'selected' : '' }}>
                {{ $pmj->peminjam_id }}
            </option>
        @endforeach
    </select>
    @error('peminjam_id') {{ $message }} @enderror
    <br>

    Tanggal Dikembaliakan
    <input type="date" name="tanggal_dikembaliakan" required>
    @error('tanggal_dikembaliakan') {{ $message }} @enderror
    <br>
    Denda
    <input type="number" name="Denda" required>
    @error('Denda') {{ $message }} @enderror
    <br>
    Kondisi Buku
    <select name="kondisi_buku" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Hilang">Hilang</option>
    </select>
    @error('kondisi_buku') {{ $message }} @enderror
    <br>
    
    <button type="submit">Save</button>
    <a href="{{ route('pengembalian.tampil') }}">Back</a>
</form>
@endsection