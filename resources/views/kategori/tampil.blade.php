<a href="{{ route('kategori.tambah') }}">Tambah data</a>
<table style="width:100%; font-family: Arial, Helvetica, sans-serif;">
    <thead>
        <tr>
            <td>Nomor</td>
            <td>nama kategori</td>
            <td>Deskripsi</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $d)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $d->nama_kategori}}</td>
            <td>{{ $d->deskripsi}}</td>
            <td>
                <form action="{{ route('kategori.hapus', $d->id) }}" method="post"
                onsubmit="return confirm('Yakin hapus data ini');">
                @csrf
                @method('DELETE')
                <a href="{{ route('kategori.edit',$d->id) }}">Ubah</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
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