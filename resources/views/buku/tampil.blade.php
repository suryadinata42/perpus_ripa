<a href="{{ route('buku.tambah') }}">Tambah data</a>
<table style="width:100%; font-family: Arial, Helvetica, sans-serif;">
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
            <td>kategori id</td>
            <td>Aksi</td>
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
            <td>{{ $d->kategori_id}}</td>
            <td>
                <form action="{{ route('buku.hapus', $d->id) }}" method="post"
                onsubmit="return confirm('Yakin hapus data ini');">
                @csrf
                @method('DELETE')
                <a href="{{ route('buku.edit',$d->id) }}">Ubah</a>
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