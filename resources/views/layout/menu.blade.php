<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="img/logo.png" type="image/png" />
    <title>Home</title>

    <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/jquery-toggles/toggles-full.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/amanda.css') }}">
    <style>
        body, h1, h2, h3, h4, h5, h6, p, a, span, div, .nav-link, .am-title {
            font-family: 'Helvetica', 'Arial', sans-serif !important;
        }
        
        @media (min-width: 992px) {
        
        /* === KONDISI 1: SIDEBAR SEMBUNYI === */
        body:not(.sidebar-aktif) .am-sideleft {
            left: -230px !important; 
        }
        body:not(.sidebar-aktif) .am-mainpanel {
            margin-left: 0 !important; 
            width: 100% !important; 
            max-width: 100% !important;
        }
        /* INI OBAT KHUSUS UNTUK PAGETITLE BIAR IKUT MELAR FULL */
        body:not(.sidebar-aktif) .am-pagetitle {
            width: 100% !important;
            max-width: 100% !important;
            left: 0 !important;
            margin-left: 0 !important;
            flex: 1 1 auto !important; /* Memaksa flexbox untuk memenuhi sisa ruang */
        }
        
        /* === KONDISI 2: SIDEBAR MUNCUL === */
        body.sidebar-aktif .am-sideleft {
            left: 0 !important;
        }
        body.sidebar-aktif .am-mainpanel {
            margin-left: 230px !important;
            width: calc(100% - 230px) !important; 
        }
        /* Kembalikan pagetitle ke ukuran normal biar gak nabrak saat sidebar muncul */
        body.sidebar-aktif .am-pagetitle {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* === ANIMASI TRANSISI Mulus === */
        .am-sideleft, .am-mainpanel, .am-pagetitle {
            transition: all 0.3s ease-in-out !important;
        }
    }
    </style>
</head>

<body class="{{ Request::is('/') ? '' : 'sidebar-aktif' }}">

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">Perpustakaan</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    
                    <!-- Pengecekan Foto Profil untuk Navbar -->
                    @if(Auth::user()->foto_profil)
                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" class="wd-32 rounded-circle me-3" style="object-fit: cover; height: 32px;" alt="Profile">
                    @else
                        <!-- Menggunakan img6.jpg lokal jika belum ada foto -->
                        <img src="{{ asset('assets/img/ahay.jpg') }}" class="wd-32 rounded-circle me-3" style="object-fit: cover; height: 32px; margin-right: 8px;" alt="Default Profile">
                    @endif

                    <span class="hidden-xs-down">{{ Auth::user()->name }}</span><i class="fa fa-angle-down mg-l-3"></i>
                </a>
                
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{ route('profile.tampil') }}"><i class="icon ion-ios-person-outline"></i> Profile Saya</a></li>
                        <li><a href="{{ route('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="am-sideleft">
        <ul class="nav am-sideleft-tab">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.tampil') }}" class="nav-link"><i class="fa fa-window-maximize tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link non"><i class="fa fa-briefcase tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link non"><i class="fa fa-info-circle tx-24"></i></a>
            </li>
        </ul>
        <style>
            .non {
                pointer-events: none;
            }
        </style>

        <div class="tab-content">
            <div id="mainMenu" class="tab-pane active">
                <ul class="nav am-sideleft-menu">
                    <li class="nav-item">
                        <a href="{{ route('anggota.tampil') }}" class="nav-link {{ Request::is('anggota') ? 'active' : '' }}">
                            <i class="fa fa-users" style="font-size:1.2em"></i> 
                            <span>Anggota</span>
                        </a>                                      
                        <a href="{{ route("buku.tampil") }}" class="nav-link {{ Request::is('buku') ? 'active' : '' }}">
                            <i class="fa fa-book" style="font-size:1.2em"></i> 
                            <span>Buku</span>
                        </a>                                      
                        <a href="{{ route("kategori.tampil")}}" class="nav-link {{ Request::is('kategori') ? 'active' : '' }}">
                            <i class="fa fa-list" style="font-size:1.2em"></i> 
                            <span>Kategori Buku</span>
                        </a>                                       
                        <a href="{{ route("pengguna.tampil")}}" class="nav-link {{ Request::is('pengguna') ? 'active' : '' }}">
                            <i class="fa fa-user" style="font-size:1.2em"></i> 
                            <span>Pengguna</span>
                        </a>                                      
                        <a href="{{ route("peminjam.tampil")}}" class="nav-link {{ Request::is('peminjam') ? 'active' : '' }}">
                            <i class="fa fa-hand-paper-o" style="font-size:1.2em"></i> 
                            <span>Peminjam</span>
                        </a>
                        <a href="{{ route("pengembalian.tampil")}}" class="nav-link {{ Request::is('pengembalian') ? 'active' : '' }}">
                            <i class="fa fa-handshake-o" style="font-size:1.2em"></i> 
                            <span>Pengembalian</span>
                        </a>
                        <a href="{{ route("detail_peminjaman.tampil")}}" class="nav-link {{ Request::is('detail_peminjaman') ? 'active' : '' }}">
                            <i class="fa fa-briefcase" style="font-size:1.2em"></i> 
                            <span>Detail Peminjaman</span>
                        </a>
                 
                    </li>
                    


                    <!--
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub">
                            <i class="icon ion-ios-gear-outline"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
                            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
                            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </div>

    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h4 class="am-title">{{ isset($judul) ? ($judul) : '' }}</h4>         
        </div>
        <div class="am-pagebody">

            <!-- Isi disini ---------------------------------------- -->
            <div class="card">
                <div class="card-body">
                    @yield('konten')
                </div>
            </div>
            <!-- Batas isi disini ---------------------------------- -->

        </div>
    </div>
    <script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('assets/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('assets/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="{{ asset('assets/lib/gmaps/gmaps.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ asset('js/amanda.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('status'))
	<script>
		Swal.fire({
		title: "{{session('status')['judul']}}",
		text: "{{session('status')['pesan']}}",
		icon: "{{session('status')['icon']}}"
		});
	</script>
	@endif

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin Data ini?', 
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6', 
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!', 
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

</body>
<script>
    $(document).ready(function() {

        $('#naviconLeft').off('click').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-aktif');
        });
    });
</script>
</html>