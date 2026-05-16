@extends('layout.menu')
@section('konten')

    <form method="POST" action="{{ route('anggota.simpan') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="kode_anggota">Kode Anggota</label>
            <input type="number" name="kode_anggota" id="kode_anggota" class="form-control" required>
            @error('kode_anggota') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
            @error('nama') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <!-- Menambahkan class form-control dan rows agar textarea rapi -->
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
            @error('alamat') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="no_hp">No HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" required>
            @error('no_hp') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <!-- Mengubah type="text" menjadi type="email" -->
            <input type="email" name="email" id="email" class="form-control" required>
            @error('email') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_daftar">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
            @error('tanggal_daftar') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <!-- Menambahkan form-control ke dalam select -->
            <select id="status" name="status" class="form-control" required>
                <option value="aktif">Active</option>
                <option value="nonaktif">Non-Active</option>
            </select>
            <!-- Memindahkan error handling ke luar tag select -->
            @error('status') 
                <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
            @enderror
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('anggota.tampil') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

    <!-- Membiarkan tag penutup div jika ini terhubung dengan pembungkus di atasnya (layout) -->
    </div>
</div>
@endsection