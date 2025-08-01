<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <span class="fw-bold text-dark" style="font-size: 1.4rem;">Dinas Sosial Kota Serang</span>
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('user.daftar') ? 'active' : '' }}"
                        href="{{ route('user.daftar') }}">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('penerimaBansos') ? 'active' : '' }}"
                        href="{{ route('penerimaBansos') }}">Penerima</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('distribusiBansos') ? 'active' : '' }}"
                        href="{{ route('distribusiBansos') }}">Distribusi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('user.berita') ? 'active' : '' }}"
                        href="{{ route('user.berita') }}">Berita Terbaru</a>
                </li>

            </ul>

            <!-- Right side: Login or Greeting -->
            <div class="d-flex ms-lg-4 mt-3 mt-lg-0 align-items-center">
                @if (Auth::check())
                    <!-- Sapaan Pengguna -->
                    <div class="dropdown me-3">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                            role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-dark me-2">Hi,</span>
                            <span class="fw-bold text-primary">{{ Auth::user()->nama }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                            <li>
                                <a class="dropdown-item" href="{{ route('user.profile.edit') }}">
                                    Kelola Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Login & Register Button -->
                    <a href="{{ route('loginUser') }}"
                        class="btn btn-outline-primary me-2 px-4 py-2 rounded-pill fw-semibold">Login</a>
                    <a href="{{ route('register') }}"
                        class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">Register</a>
                @endif
            </div>

        </div>
    </div>
</nav>
