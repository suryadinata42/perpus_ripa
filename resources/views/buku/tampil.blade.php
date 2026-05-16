@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-body">
        <a href="{{ route('buku.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</a>
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
                <td style="width: 100px;">Aksi</td>
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
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('buku.hapus', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('buku.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-danger btn-sm mb-1" 
                    onclick="confirmDelete({{ $d->id }})" title="Hapus Data"><i class="fa fa-trash"></i></button>
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