@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Buku</b>
    </div>

    <div class="card-body">
        <a href="{{ route('buku.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>kode buku</td>
                <td>judul</td>
                <td>penulis</td>
                <td>penerbit</td>
                <td>tahun terbit</td>
                <td>isbn</td>
                <td>jumlah total</td>
                <td>jumlah tersedia</td>
                <td>Nama kategori</td>
                <td>Deskripsi Buku</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $d)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $d->kode_buku}}</td>
                <td>{{ $d->judul}}</td>
                <td>{{ $d->penulis}}</td>
                <td>{{ $d->penerbit}}</td>
                <td>{{ $d->tahun_terbit}}</td>
                <td>{{ $d->isbn}}</td>
                <td>{{ $d->jumlah_total}}</td>
                <td>{{ $d->jumlah_tersedia}}</td>
                <td>{{ $d->nama_kategori}}</td>
                <td>{{ $d->deskripsi}}</td>
                <td>
                    <form action="{{ route('buku.hapus', $d->id) }}" method="post"
                    onsubmit="return confirm('Yakin hapus data ini');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('buku.edit',$d->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
</div>
@endsection