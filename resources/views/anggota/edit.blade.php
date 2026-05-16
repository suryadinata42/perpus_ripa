@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('anggota.update', $anggota->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="kode_anggota">Kode Anggota</label>
        <input type="number" name="kode_anggota" id="kode_anggota" class="form-control" required readonly value="{{ old('kode_anggota', $anggota->kode_anggota) }}">
        @error('kode_anggota') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $anggota->nama) }}">
        @error('nama') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <!-- Perbaikan: Menambahkan old() pada textarea -->
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $anggota->alamat) }}</textarea>
        @error('alamat') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="no_hp">No HP</label>
        <input type="number" name="no_hp" id="no_hp" class="form-control" required value="{{ old('no_hp', $anggota->no_hp) }}">
        @error('no_hp') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <!-- Perbaikan: Mengubah type="text" menjadi type="email" -->
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $anggota->email) }}">
        @error('email') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_daftar">Tanggal Daftar</label>
        <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required value="{{ old('tanggal_daftar', $anggota->tanggal_daftar) }}">
        @error('tanggal_daftar') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control" required>
            <!-- Perbaikan: Menambahkan logika old() dan ternary operator agar status bawaan terpilih otomatis -->
            <option value="aktif" {{ old('status', $anggota->status) == 'aktif' ? 'selected' : '' }}>Active</option>
            <option value="nonaktif" {{ old('status', $anggota->status) == 'nonaktif' ? 'selected' : '' }}>Non-Active</option>
        </select>
        <!-- Perbaikan: Memindahkan error handling ke luar tag select -->
        @error('status') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('anggota.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection