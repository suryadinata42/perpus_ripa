@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Pengguna</b>
    </div>

    <div class="card-body">
        <a href="{{ route('pengguna.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>nama pengguna</td>
                <td>email</td>
                <td>password</td>
                <td>peran</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $d)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $d->nama}}</td>
                <td>{{ $d->email}}</td>
                <td>{{ $d->password}}</td>
                <td>{{ $d->peran}}</td>
                <td>
                    <form action="{{ route('pengguna.hapus', $d->id) }}" method="post"
                    onsubmit="return confirm('Yakin hapus data ini');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('pengguna.edit',$d->id) }}" class="btn btn-warning btn-sm">Ubah</a>
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