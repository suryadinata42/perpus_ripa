@extends('layout.menu')
@section('konten')
<div class="card">

    <div class="card-body">
        <a href="{{ route('peminjam.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>ID peminjam</td>
                <td>Anggota ID</td>
                <td>Pengguna ID</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Kembali</td>
                <td>status</td>
                <td style="width: 100px;">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjam as $d)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $d->id}}</td>
                <td>{{ $d->kode_anggota}}</td>
                <td>{{ $d->pengguna_id}}</td>
                <td>{{ $d->tanggal_pinjam}}</td>
                <td>{{ $d->tanggal_kembali}}</td>
                <td>{{ $d->status}}</td>
                <td>
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('peminjam.hapus', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('peminjam.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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
</div>
@endsection