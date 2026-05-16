@extends('layout.menu')
@section('konten')

<form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $pengguna->nama) }}">
        @error('nama') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <!-- Perbaikan: Mengubah type="text" menjadi type="email" -->
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $pengguna->email) }}">
        @error('email') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password">Password</label>
        <!-- Perbaikan: Mengubah type="password", MENGHAPUS required, dan MENGHAPUS value bawaan demi keamanan -->
        <input type="password" name="password" id="password" class="form-control">
        <small style="color: gray; font-size: 0.85em;">*Kosongkan jika tidak ingin mengubah password.</small>
        @error('password') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="peran">Peran</label>
        <!-- Perbaikan: Menghapus value="..." dari dalam tag select -->
        <select name="peran" id="peran" class="form-control" required>
            <!-- Perbaikan: Memindahkan logika pilihan ke atribut 'selected' masing-masing option -->
            <option value="admin" {{ old('peran', $pengguna->peran) == 'admin' ? 'selected' : '' }}>Admin</option>
            <!-- Perbaikan: Typo 'Petrugas' diperbaiki -->
            <option value="petugas" {{ old('peran', $pengguna->peran) == 'petugas' ? 'selected' : '' }}>Petugas</option>
        </select>
        <!-- Perbaikan: Memindahkan error handling ke luar tag select -->
        @error('peran') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('pengguna.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>

@endsection