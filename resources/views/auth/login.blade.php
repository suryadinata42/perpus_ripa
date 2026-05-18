<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            display: flex;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        /* Bagian Kiri: Gambar Perpustakaan */
        .login-image {
            flex: 1;
            
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1000');
            background-size: cover;
            background-position: center;
            display: none;
        }

        /* Tampilkan gambar hanya di layar desktop ke atas */
        @media (min-width: 768px) {
            .login-image {
                display: block;
            }
        }

        /* Bagian Kanan: Form Login */
        .login-form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f4f4f4;
        }

        /* Banner Biru LOGIN */
        .login-header {
            background-color: #007bff; /* Warna biru sesuai gambar */
            color: white;
            text-align: center;
            padding: 35px 20px;
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .login-body {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .form-wrapper {
            width: 100%;
            max-width: 420px;
        }

        .form-group label {
            font-size: 1.1rem;
            font-weight: 500;
            color: #000;
            margin-bottom: 8px;
        }

        /* Input Box Custom abu-abu */
        .input-group-custom {
            position: relative;
            background-color: #dbdbdb; /* Warna abu-abu input sesuai gambar */
            border-radius: 4px;
            display: flex;
            align-items: center;
            height: 50px;
        }

        .input-group-custom i {
            position: absolute;
            left: 15px;
            color: #000;
            font-size: 1.2rem;
        }

        .input-group-custom .form-control {
            background-color: transparent;
            border: none;
            padding-left: 50px;
            height: 100%;
            color: #000;
            font-size: 1rem;
        }
        .input-group-custom .form-control:focus {
            background-color: transparent;
            box-shadow: none;
            border: none;
        }

        .btn-custom-blue {
            background-color: #007bff;
            color: white;
            height: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            margin-top: 40px;
            transition: background 0.2s;
        }

        .btn-custom-blue:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>

<div class="login-container">
    
    <div class="login-image"></div>

    <div class="login-form-section">
        <div class="login-header">
            LOGIN
        </div>
        
        <div class="login-body">
            <div class="form-wrapper">
                
                <form action="{{ route('login_proses') }}" method="post">
                    @csrf <div class="form-group mb-4">
                        <label for="username">Username</label>
                        <div class="input-group-custom">
                            <i class="fas fa-user"></i>
                            <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <div class="input-group-custom">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-custom-blue">Login</button>
                    
                </form>

            </div>
        </div>
    </div>

</div>

</body>
</html>