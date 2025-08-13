 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('petugas.dashboard') }}" class="logo">
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
                 <li class="nav-item {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
                     <a href="{{ route('petugas.dashboard') }}">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>

                 <li class="nav-item {{ request()->routeIs('petugas.verifikasi') ? 'active' : '' }}">
                     <a href="{{ route('petugas.verifikasi.index') }}">
                         <i class="fas fa-table"></i>
                         <p>Data Verifikasi</p>
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

 @if (session('success'))
     <script>
         Swal.fire({
             icon: 'success',
             title: 'Sukses!',
             text: '{{ session('success') }}',
         });
     </script>
 @endif

 <!-- End Sidebar -->
