<form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
    @csrf
    @method('PUT')

    Nama kategori
    <input type="text" name="nama_kategori" required value="{{ old('nama', $kategori->nama_kategori) }}">
    @error('nama_kategori') {{ $message }} @enderror
    <br>
    Deskripsi
    <textarea name="deskripsi" required>{{ $kategori->deskripsi }}</textarea>
    @error('deskripsi') {{ $message }} @enderror
    <br>

    <button type="submit">Save</button>
    <a href="{{ route('kategori.tampil') }}">Back</a>
</form>