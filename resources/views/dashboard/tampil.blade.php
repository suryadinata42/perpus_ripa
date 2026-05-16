@extends('layout.menu')
@section('konten')
        <div class="row">
            <div class="col-sm-6 col-md-4 mg-t-20 mg-sm-t-0">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Total Anggota</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_anggota }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20 mg-md-t-0">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Total Buku</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_buku }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20 mg-md-t-0">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Kategori Buku</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_kategori }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Pengguna</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pengguna }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Peminjam</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_peminjaman }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Pengembalian</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pengembalian }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 mg-t-20">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">Detail Peminjaman</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_detail_peminjaman }}</h2>
                    </div>
                </div>
            </div>
@endsection