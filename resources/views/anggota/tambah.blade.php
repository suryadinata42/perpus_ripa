@extends('layout.menu')
@section('konten')
    <form method="POST" action="{{ route('anggota.simpan') }}">
        @csrf
        Kode anggota
        <input type="number" name="kode_anggota" required>
        @error('kode_anggota') {{ $message }} @enderror
        <br>
        nama
        <input type="text" name="nama" required>
        @error('nama') {{ $message }} @enderror
        <br>
        alamat
        <textarea name="alamat" required></textarea>
        @error('alamat') {{ $message }} @enderror
        <br>
        no hp
        <input type="number" name="no_hp" required>
        @error('no_hp') {{ $message }} @enderror
        <br>
        email
        <input type="text" name="email" required>
        @error('email') {{ $message }} @enderror
        <br>
        tanggal daftar
        <input type="date" name="tanggal_daftar" required>
        @error('tanggal_daftar') {{ $message }} @enderror
        <br>
        status
        <select id="status" name="status">
            <option value="aktif">Active</option>
            <option value="nonaktif">Non-Active</option>
        @error('status') {{ $message }} @enderror
        </select>
        <br>

        <button type="submit">Save</button>
        <a href="{{ route('anggota.tampil') }}">Back</a>
    </form>
    </div>
</div>
@endsection