<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <span class="fw-bold text-dark" style="font-size: 1.4rem;">Dinsos Kota Serang</span>

        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('daftar') }}">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="service.html">Penerima</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="contact.html">Berita Terbaru</a>
                </li>
            </ul>
            <div class="d-flex ms-lg-4 mt-3 mt-lg-0">
                <a href="{{ route('loginUser') }}"
                    class="btn btn-outline-primary me-2 px-4 py-2 rounded-pill fw-semibold">Login</a>
                <a href="{{ route('register') }}"
                    class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">Register</a>
            </div>
        </div>
    </div>
</nav>
