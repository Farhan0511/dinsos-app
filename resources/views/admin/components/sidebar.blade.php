<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('views/image/21dinsos.png') }}" alt="navbar brand"
                    class="navbar-brand" height="70" width="170px"/>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.berita') ? 'active' : '' }}">
                    <a href="{{ route('admin.berita.index') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Input Berita</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.pendaftar.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.pendaftar.index') }}">
                        <i class="fas fa-table"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.penerima.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.penerima.index') }}">
                        <i class="fas fa-check"></i>
                        <p>Data Penerima</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.distribusi.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.distribusi.index') }}">
                        <i class="fas fa-truck"></i>
                        <p>Distribusi Bansos</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::routeIs('admin.laporan.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

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

<!-- Tambahan Style Aktif + Hover -->
<style>
    .sidebar .nav .nav-item>a {
        color: #ccc;
        transition: background-color 0.3s ease, color 0.3s ease;
        border-radius: 8px;
        padding: 10px 15px;
    }

    .sidebar .nav .nav-item:hover>a {
        background-color: #343a40;
        color: #ffffff;
    }

    .sidebar .nav .nav-item.active>a {
        background-color: #495057;
        color: #ffffff;
        font-weight: 600;
    }
</style>
