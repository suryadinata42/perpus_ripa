@extends('layout.menu')
@section('konten')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <b>Profile Pengguna</b>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            @if(Auth::user()->foto_profil)
                <!-- Jika user sudah upload foto, ambil dari storage (Ukuran 150px, tanpa border) -->
                <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Foto Profil" class="rounded-circle me-4" style="width: 150px; height: 150px; object-fit: cover;">
            @else
                <!-- Jika user belum upload foto, ambil gambar img6.jpg (Ukuran 150px, tanpa border) -->
                <img src="{{ asset('assets/img/ahay.jpg') }}" alt="Default Avatar" class="rounded-circle me-4" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
        </div>
                    <!-- List detail tambahan -->
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item px-0"><strong>{{ Auth::user()->name}}</strong></li>
                        <li class="list-group-item px-0"><strong>{{ '@' . Auth::user()->username }}</strong></li>
                        <li class="list-group-item px-0"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li class="list-group-item px-0"><strong>Bergabung Sejak:</strong> {{ Auth::user()->created_at->format('d M Y') }}</li>
                    </ul>

                    
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4"><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection