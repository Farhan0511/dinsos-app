@extends('user.main') <!-- Sesuaikan dengan layout kamu -->

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
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ Auth::user()->nama }}" required>
            </div>

            <!-- Password Baru (Opsional) -->
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="{{ route('home') }}" class="btn btn-secondary ms-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>

        </form>
    </div>
@endsection
