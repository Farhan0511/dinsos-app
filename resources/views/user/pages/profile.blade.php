@extends('user.main') <!-- Sesuaikan dengan layout kamu -->

@section('title','Edit Profile')
@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Edit Profil</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control shadow-sm" value="{{ Auth::user()->nama }}" required>
            </div>

            <!-- Password Baru (Opsional) -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password Baru <small class="text-muted">(kosongkan jika
                        tidak ingin mengubah)</small></label>
                <input type="password" name="password" class="form-control shadow-sm">
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control shadow-sm">
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-outline-primary fw-semibold shadow-sm px-4">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>

                <a href="{{ route('home') }}" class="btn btn-outline-danger fw-semibold shadow-sm px-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>


        </form>
    </div>
@endsection
