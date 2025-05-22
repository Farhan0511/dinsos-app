@extends('auth.main')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">

            <!-- Spinner Start -->
            <div id="spinner"
                class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control" id="floatingText"
                                placeholder="jhondoe">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{ route('loginUser') }}">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
