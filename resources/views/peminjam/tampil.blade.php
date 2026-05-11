@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Peminjam</b>
    </div>

    <div class="card-body">
        <a href="{{ route('peminjam.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>Anggota ID</td>
                <td>Pengguna ID</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Kembali</td>
                <td>status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjam as $d)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $d->anggota_id}}</td>
                <td>{{ $d->pengguna_id}}</td>
                <td>{{ $d->tanggal_pinjam}}</td>
                <td>{{ $d->tanggal_kembali}}</td>
                <td>{{ $d->status}}</td>
                <td>
                    <form action="{{ route('peminjam.hapus', $d->id) }}" method="post"
                    onsubmit="return confirm('Yakin hapus data ini');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('peminjam.edit',$d->id) }}" class="btn btn-warning btn-sm">Ubah</a>
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
</div>
@endsection