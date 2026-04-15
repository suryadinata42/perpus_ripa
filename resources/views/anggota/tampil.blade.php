@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Anggota</b>
    </div>

     <div class="card-body">
        <a href="{{ route('anggota.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>Kode anggota</td>
                <td>nama</td>
                <td>alamat</td>
                <td>no hp</td>
                <td>email</td>
                <td>tanggal daftar</td>
                <td>status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->kode_anggota }}</td>
                <td>{{ $d->nama }}</td>
                <td>{!! nl2br($d->alamat) !!}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->tanggal_daftar }}</td>
                <td>{{ $d->status }}</td>
                <td>
                    <form action="{{ route('anggota.hapus', $d->id) }}" method="post"
                    onsubmit="return confirm('Yakin hapus data ini');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('anggota.edit',$d->id) }}" class="btn btn-warning btn-sm">Ubah</a>
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