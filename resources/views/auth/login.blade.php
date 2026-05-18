<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpus Ripa</title>
    
    <!-- CSS Template Anda & Bootstrap -->
    <link href="css/amanda.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body, html { height: 100%; margin: 0; overflow-x: hidden; }
    </style>
</head>
<body>

<!-- vh-100 = tinggi full 100% layar, no-gutters = menghilangkan jarak antar kolom -->
<div class="row no-gutters vh-100">

    <!-- BAGIAN KIRI: Form Login (Lebar sekitar 40%) -->
    <!-- d-flex align-items-center justify-content-center = form otomatis di tengah -->
    <div class="col-md-5 d-flex align-items-center justify-content-center" style="background-color: #f8f9fa;">
        
        <!-- KOTAK FORM: Padding persis 50px, border garis tegas, tanpa sudut bundar, background putih -->
        <div class="w-100 bg-white" style="max-width: 450px; padding: 50px; border: 1px solid #ced4da;">
            
            <h2 class="font-weight-bold mb-2 text-dark text-uppercase">Login Perpus</h2>
            <p class="text-muted mb-4">Masukkan username dan password.</p>

            <form action="{{ route('login_proses') }}" method="post">
                @csrf
                
                <!-- Username -->
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Username</label>
                    <input type="text" name="username" class="form-control rounded-0 @error('username') is-invalid @enderror" placeholder="Enter your username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback rounded-0">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Password</label>
                    <input type="password" name="password" class="form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                    @error('password')
                        <div class="invalid-feedback rounded-0">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <button type="submit" class="btn btn-primary btn-block btn-lg rounded-0 font-weight-bold mt-4" style="letter-spacing: 1px;">
                    LOGIN
                </button>
            </form>
            
        </div>
        <!-- AKHIR KOTAK FORM -->

    </div>

    <!-- BAGIAN KANAN: Gambar Buku (Lebar sekitar 60%) -->
    <!-- d-none d-md-block = gambar akan disembunyikan jika dibuka di layar HP agar tidak sempit -->
    <div class="col-md-7 d-none d-md-block" 
        style="background-image: url('{{ asset('assets/img/a.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    </div>  

</div>

</body>

</html>