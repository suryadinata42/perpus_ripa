@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('pengembalian.simpan') }}">
    @csrf

    <!-- Peminjam ID -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="peminjam_id" class="col-form-label">Peminjam ID</label>
        </div>
        <div class="col-sm-10">
            <select name="peminjam_id" id="peminjam_id" class="form-control" required>
                <option value="">-- Pilih Peminjam --</option>
                @foreach($peminjam as $p)
                    <option value="{{ $p->id }}" {{ old('peminjam_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->id }} 
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @error('peminjam_id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tanggal Dikembalikan -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="tanggal_dikembalikan" class="col-form-label">Tanggal Dikembalikan</label>
        </div>
        <div class="col-sm-10">
            <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" class="form-control" required value="{{ old('tanggal_dikembalikan') }}">
        </div>
        <div class="col-auto">
            @error('tanggal_dikembalikan') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Denda -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="denda" class="col-form-label">Denda (Rp)</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="denda" id="denda" class="form-control" required value="{{ old('denda') }}">
        </div>
        <div class="col-auto">
            @error('denda') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Kondisi Buku -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="kondisi_buku" class="col-form-label">Kondisi Buku</label>
        </div>
        <div class="col-sm-10">
            <select name="kondisi_buku" id="kondisi_buku" class="form-control" required>
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik" {{ old('kondisi_buku') == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ old('kondisi_buku') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="Hilang" {{ old('kondisi_buku') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
            </select>
        </div>
        <div class="col-auto">
            @error('kondisi_buku') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    
    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('pengembalian.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>

@endsection