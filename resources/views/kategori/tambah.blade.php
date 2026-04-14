<form method="POST" action="{{ route('kategori.simpan') }}">
    @csrf
    
    Nama kategori
    <input type="text" name="nama_kategori" required>
    @error('nama_kategori') {{ $message }} @enderror
    <br>
    Deskripsi
    <textarea name="deskripsi" required></textarea>
    @error('deskripsi') {{ $message }} @enderror
    <br>
   
    <button type="submit">Save</button>
    <a href="{{ route('kategori.tampil') }}">Back</a>
</form>