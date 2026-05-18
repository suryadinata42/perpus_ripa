@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('pengembalian.update', $pengembalian->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="peminjam_id">Peminjam ID</label>
        <select name="peminjam_id" id="peminjam_id" class="form-control" required>
            <option value="">-- Pilih Peminjam --</option>
            @foreach($peminjam as $pmj)
                <option value="{{ $pmj->id }}" {{ old('peminjam_id', $pengembalian->peminjam_id ?? '') == $pmj->id ? 'selected' : '' }}>
                    {{ $pmj->id }} 
                </option>
            @endforeach
        </select>
        @error('peminjam_id') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_dikembaliakan">Tanggal Dikembalikan</label>
        <input type="date" name="tanggal_dikembaliakan" id="tanggal_dikembaliakan" class="form-control" required value="{{ old('tanggal_dikembaliakan', $pengembalian->tanggal_dikembaliakan ?? '') }}">
        @error('tanggal_dikembaliakan') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="denda">Denda (Rp)</label>
        <input type="number" name="denda" id="denda" class="form-control" required value="{{ old('Denda', $pengembalian->denda ?? '') }}">
        @error('denda') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="kondisi_buku">Kondisi Buku</label>
        <select name="kondisi_buku" id="kondisi_buku" class="form-control" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik" {{ old('kondisi_buku', $pengembalian->kondisi_buku ?? '') == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak" {{ old('kondisi_buku', $pengembalian->kondisi_buku ?? '') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            <option value="Hilang" {{ old('kondisi_buku', $pengembalian->kondisi_buku ?? '') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
        </select>
        @error('kondisi_buku') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>
    
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('pengembalian.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection