@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('peminjam.update', $peminjam->id) }}">
    @csrf
    @method('PUT')

    <!-- ID Peminjam -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="id" class="col-form-label">ID Peminjam</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="id" id="id" class="form-control" required value="{{ old('id', $peminjam->id) }}">
        </div>
        <div class="col-auto">
            @error('id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Anggota ID -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="anggota_id" class="col-form-label">Anggota ID</label>
        </div>
        <div class="col-sm-10">
            <select name="anggota_id" id="anggota_id" class="form-control" required>
                <option value="">-- Pilih Kode Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->kode_anggota }}" {{ old('anggota_id', $peminjam->anggota_id) == $a->kode_anggota ? 'selected' : '' }}>
                        {{ $a->kode_anggota }}  
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @error('anggota_id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Pengguna ID -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="pengguna_id" class="col-form-label">Pengguna ID</label>
        </div>
        <div class="col-sm-10">
            <select name="pengguna_id" id="pengguna_id" class="form-control" required>
                <option value="">-- Pilih Pengguna ID --</option>
                @foreach($pengguna as $p)
                    <option value="{{ $p->id }}" {{ old('pengguna_id', $peminjam->pengguna_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->id }}  
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @error('pengguna_id') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tanggal Pinjam -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="tanggal_pinjam" class="col-form-label">Tanggal Pinjam</label>
        </div>
        <div class="col-sm-10">
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required value="{{ old('tanggal_pinjam', $peminjam->tanggal_pinjam) }}">
        </div>
        <div class="col-auto">
            @error('tanggal_pinjam') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Tanggal Kembali -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="tanggal_kembali" class="col-form-label">Tanggal Kembali</label>
        </div>
        <div class="col-sm-10">
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required value="{{ old('tanggal_kembali', $peminjam->tanggal_kembali) }}">
        </div>
        <div class="col-auto">
            @error('tanggal_kembali') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <!-- Status -->
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-2">
            <label for="status" class="col-form-label">Status</label>
        </div>
        <div class="col-sm-10">
            <select name="status" id="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="dipinjam" {{ old('status', $peminjam->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="kembali" {{ old('status', $peminjam->status) == 'kembali' ? 'selected' : '' }}>Kembali</option>
            </select>
        </div>
        <div class="col-auto">
            @error('status') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
        
    <!-- Tombol Submit -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('peminjam.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>

@endsection