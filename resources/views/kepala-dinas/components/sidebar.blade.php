 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="{{ route('admin.dashboard') }}" class="logo">
                 <img src="{{ asset('views/admin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                     class="navbar-brand" height="20" />
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
                 <li class="nav-item active">
                     <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.penerima') }}">
                         <i class="fas fa-check"></i>
                         <p>Data Penerima</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="widgets.html">
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
