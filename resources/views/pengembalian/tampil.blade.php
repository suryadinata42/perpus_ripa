@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Pengembalian</b>
    </div>

    <div class="card-body">
        <a href="{{ route('pengembalian.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>Peminjam ID</td>
                <td>Tanggal Dikembaliakan</td>
                <td>denda</td>
                <td>kondisi Buku</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengembalian as $d)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $d->peminjam_id}}</td>
                <td>{{ $d->tanggal_dikembalikan}}</td>
                <td>{{ $d->denda}}</td>
                <td>{{ $d->kondisi_buku}}</td>
                <td>
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('pengembalian.hapus', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('pengembalian.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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