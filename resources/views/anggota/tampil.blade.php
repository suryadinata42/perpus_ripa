<a href="{{ route('anggota.tambah') }}">Tambah data</a>
<table style="width:100%; font-family: Arial, Helvetica, sans-serif;">
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
                <a href="{{ route('anggota.edit',$d->id) }}">Ubah</a>
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