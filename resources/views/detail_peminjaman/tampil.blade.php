@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-body">
        <a href="{{ route('detail_peminjaman.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</a>

        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead> 
                <tr>
                    <th>Nomor</th>
                    <th>ID Peminjaman</th>
                    <th>Buku ID</th>
                    <th>Jumlah</th>
                    <th style="width: 100px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dpeminjaman as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->peminjam_id }}</td>
                    <td>{{ $d->buku_id }}</td>
                    <td>{{ $d->jumlah }}</td>
                    
                    <td>
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('detail_pengembalian.hapus', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('detail_pengembalian.edit', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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