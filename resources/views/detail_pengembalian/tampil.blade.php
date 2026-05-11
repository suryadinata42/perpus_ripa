@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Detail Peminjaman</b>
    </div>
    
    <div class="card-body">
        <a href="{{ route('detail_peminjaman.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead> 
                <tr>
                    <th>Nomor</th>
                    <th>ID Peminjaman</th>
                    <th>Buku ID</th>
                    <th>Jumlah</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pengembalian as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->peminjam_id }}</td>
                    <td>{{ $d->buku_id }}</td>
                    <td>{{ $d->jumlah }}</td>
                    
                    <td>
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('detail_peminjaman.hapus', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('detail_peminjaman.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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