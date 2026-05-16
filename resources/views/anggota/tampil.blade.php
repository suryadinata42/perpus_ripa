@extends('layout.menu')
@section('konten')
<div class="card">


     <div class="card-body">
        <a href="{{ route('anggota.tambah') }}" class="btn btn-primary mb-3"> <i class="fa fa-plus-square"></i>&nbsp; Tambah Data</a>
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
                <td style="width: 100px;">Aksi</td>
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
                <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('anggota.hapus', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('anggota.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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