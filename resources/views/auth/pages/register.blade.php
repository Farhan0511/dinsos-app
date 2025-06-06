@extends('auth.main')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">

            <!-- Gambar di sebelah kiri -->
            <div class="col-12 col-md-6 d-none d-md-block">
                <div class="text-center">
                    <img src="{{ asset('views/image/disabilitas.jpg') }}" alt="Register Image" class="img-fluid"
                        style="max-height: 500px;">
                </div>
            </div>

            <!-- Form Register di sebelah kanan -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3>Sign Up</h3>
                    </div>
                    <form method="POST" action="{{ route('register-proses') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control" id="floatingText"
                                placeholder="jhondoe" value="{{ old('nama') }}">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4 position-relative">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password" />
                            <label for="floatingPassword">Password</label>

                            <i id="togglePassword" class="bi bi-eye position-absolute"
                                style="top: 50%; right: 1rem; transform: translateY(-50%); cursor: pointer; user-select: none;"></i>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{ route('loginUser') }}">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('failed') }}',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first() }}'
            });
        </script>
    @endif

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('floatingPassword');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
@endsection
