@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('detail_peminjaman.update', $dpeminjaman->id) }}">
    @csrf
    @method('PUT')

    <!-- Anggota ID -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="peminjam_id" class="col-form-label">Anggota ID</label>
        </div>
        <div class="col-sm-10">
            <select name="peminjam_id" id="peminjam_id" class="form-control" required>
                <option value="">-- Pilih Kode Anggota --</option>
                @foreach($peminjam as $p)
                    <option value="{{ $p->id }}" {{ old('peminjam_id', $dpeminjaman->peminjam_id) == $p->id ? 'selected' : '' }}>
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

    <!-- Kode Buku -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="buku_id" class="col-form-label">Kode Buku</label>
        </div>
        <div class="col-sm-10">
            <select name="buku_id" id="buku_id" class="form-control" required>
                <option value="">-- Pilih Kode Buku --</option>
                @foreach($buku as $b)
                    <option value="{{ $b->kode_buku }}" {{ old('buku_id', $dpeminjaman->buku_id) == $b->kode_buku ? 'selected' : '' }}>
                        {{ $b->kode_buku }}  
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <!-- Perbaikan: Mengubah pengguna_id menjadi buku_id -->
            @error('buku_id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Jumlah -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="jumlah" class="col-form-label">Jumlah</label>
        </div>
        <div class="col-sm-10">
            <input type="number" name="jumlah" id="jumlah" class="form-control" required value="{{ old('jumlah', $dpeminjaman->jumlah) }}">
        </div>
        <div class="col-auto">
            @error('jumlah') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('detail_peminjaman.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>
@endsection