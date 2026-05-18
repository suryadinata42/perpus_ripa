@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('peminjam.update', $peminjam->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="anggota_id">Anggota ID</label>
        <select name="anggota_id" id="anggota_id" class="form-control" required>
            <option value="">-- Pilih Kode Anggota --</option>
            @foreach($anggota as $a)
                <option value="{{ $a->kode_anggota }}" {{ old('kode_anggota', $peminjam->anggota_id) == $a->kode_anggota ? 'selected' : '' }}>
                    {{ $a->kode_anggota }}  
                </option>
            @endforeach
        </select>
        @error('kode_anggota') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="pengguna_id">Pengguna ID</label>
        <select name="pengguna_id" id="pengguna_id" class="form-control" required>
            <option value="">-- Pilih Pengguna ID --</option>
            @foreach($pengguna as $p)
                <option value="{{ $p->id }}" {{ old('pengguna_id', $peminjam->pengguna_id) == $p->id ? 'selected' : '' }}>
                    {{ $p->id }}  
                </option>
            @endforeach
        </select>
        @error('pengguna_id') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_pinjam">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required value="{{ old('tanggal_pinjam', $peminjam->tanggal_pinjam) }}">
        @error('tanggal_pinjam') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required value="{{ old('tanggal_kembali', $peminjam->tanggal_kembali) }}">
        @error('tanggal_kembali') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="status">Status</label>
        <!-- Perbaikan: Menghapus atribut value dari select -->
        <select name="status" id="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <!-- Perbaikan: Memindahkan logika old() dan pilihan database ke atribut 'selected' di option -->
            <option value="dipinjam" {{ old('status', $peminjam->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="kembali" {{ old('status', $peminjam->status) == 'kembali' ? 'selected' : '' }}>Kembali</option>
        </select>
        @error('status') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>
        
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('peminjam.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection