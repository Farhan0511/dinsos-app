 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="{{ route('admin') }}" class="logo">
                 <img src="{{ asset('views/admin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
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
                     <a  href="{{ route('admin') }}" class="collapsed" aria-expanded="false">
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>             
                 <li class="nav-item">
                     <a  href="{{ route('input') }}">
                         <i class="fas fa-pen-square"></i>
                         <p>Input Berita</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#tables">
                         <i class="fas fa-table"></i>
                         <p>Data Pendaftar</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#maps">
                         <i class="fas fa-map-marker-alt"></i>
                         <p>Data Penerima</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#charts">
                         <i class="far fa-chart-bar"></i>
                         <p>Verifikasi Data</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="widgets.html">
                         <i class="fas fa-desktop"></i>
                         <p>Laporan</p>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
