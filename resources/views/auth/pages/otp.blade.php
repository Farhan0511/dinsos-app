@extends('auth.main')

@section('title', 'Verifikasi OTP')

@section('content')
    <!-- CDN SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <!-- Gambar kiri -->
                <div class="col-12 col-md-6 d-none d-md-block">
                    <div class="text-center">
                        <img src="{{ asset('views/image/disabilitas.jpg') }}" alt="Login Image" class="img-fluid"
                            style="max-height: 500px;">
                    </div>
                </div>

                <!-- Form kanan -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Verifikasi Akun</h3>
                        </div>

                        <form method="POST" action="{{ route('user.otp.verification.post') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" name="otp" class="form-control" id="floatingInput">
                                <label for="floatingInput">Masukkan kode verifikasi disini</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Verifikasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- SweetAlert Login Failed -->
    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Verifikasi Gagal!',
                text: '{{ session('failed') }}',
            });
        </script>
    @endif

    <!-- SweetAlert Success Message -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
@endsection
