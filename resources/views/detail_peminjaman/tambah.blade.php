@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('detail_peminjaman.simpan') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="peminjam_id">Anggota ID</label>
        <select name="peminjam_id" id="peminjam_id" class="form-control" required>
            <option value="">-- Pilih Anggota ID --</option>
            @foreach($peminjam as $p)
                <option value="{{ $p->id }}">
                    {{ $p->id }}
                </option>
            @endforeach
        </select>
        @error('peminjam_id') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="kode_buku">Kode Buku</label>
        <select name="buku_id" id="buku_id" class="form-control" required>
            <option value="">-- Pilih Kode Buku --</option>
            @foreach($buku as $b)
                <option value="{{ $b->kode_buku }}">
                    {{ $b->kode_buku }}
                </option>
            @endforeach
        </select>
        @error('buku_id') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        @error('jumlah') 
            <div class="text-danger" style="color: red; font-size: 0.9em;">{{ $message }}</div> 
        @enderror
    </div>


    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('detail_peminjaman.tampil') }}" class="btn btn-secondary">Back</a>
    </div>
</form>
@endsection