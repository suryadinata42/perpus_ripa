@extends('layout.menu')
	@section('konten')
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <style>
                .carousel-inner .carousel-item img {
                    height: 300px; /* Atur tingginya sesuai selera, misal 200px atau 250px */
                    object-fit: cover; /* Ini trik rahasianya biar gambar gak melar */
                    object-position: center; /* Fokus potongan gambar tetap di tengah */
                }
            </style>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/img/a.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/b.jpg') }}" alt="Second slide">
                </div>
            </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div>
            <style>
                /* Kontainer utama untuk scroll horizontal */
                .menu-scroll-container {
                    display: flex;
                    flex-wrap: nowrap; /* Memaksa elemen tetap 1 baris ke samping */
                    overflow-x: auto;  /* Mengaktifkan scroll horizontal */
                    gap: 35px;         /* Jarak konsisten antar kotak */
                    padding-bottom: 10px; /* Jarak bawah agar efek shadow tidak terpotong */
                    justify-content: center;
                    /* Menyembunyikan scrollbar agar bersih */
                    -webkit-overflow-scrolling: touch; 
                    scrollbar-width: none; 
                    -ms-overflow-style: none; 
                }
                
                .menu-scroll-container::-webkit-scrollbar {
                    display: none; 
                }

                /* Mematok ukuran kotak agar semuanya sama persis */
                .menu-box {
                    flex: 0 0 160px; /* Lebar kotak dikunci di 160px */
                }
                
                /* Mengatur tinggi kotak agar seragam meski teksnya 2 baris */
                .menu-box .nav-link {
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
            </style>

            <div class="mt-4 px-3">
                <div class="menu-scroll-container">
                    
                    <div class="menu-box">
                        <a href="{{ route('anggota.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-users fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Anggota</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('buku.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-book fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Buku</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('kategori.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-list fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Kategori</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('pengguna.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-user fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Pengguna</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('peminjam.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-hand-paper-o fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Peminjam</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('pengembalian.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-handshake-o fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600;">Pengembalian</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('detail_peminjaman.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #e0e0e0;">   
                            <i class="fa fa-briefcase fa-4x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 14px; font-weight: 600; line-height: 1.2;">Detail Peminjaman</p>
                        </a>
                    </div>

                    

                </div>
            </div>
        </div>
       


    @endsection
