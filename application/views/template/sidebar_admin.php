    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon">
                <img src="<?php echo base_url('assets/img/logo.png')?>" width="60%">

            </div>
            <div class="sidebar-brand-text mx-3">SIPERTA</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a href="<?php echo base_url().'admin/home' ?>" class="nav-link">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beranda</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a href="<?php echo base_url().'admin/surat' ?>" class="nav-link">
                <i class="fas fa-envelope"></i>
                <span>Surat</span></a>
        </li>

        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a href="<?php echo base_url().'admin/surat/suratMasuk' ?>" class="nav-link">
                <i class="fas fa-envelope"></i>
                <span>Surat Masuk</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a href="<?php echo base_url().'admin/surat/suratKeluar' ?>" class="nav-link">
                <i class="far fa-envelope-open"></i>
                <span>Surat Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a href="<?php echo base_url().'admin/user' ?>" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Tambah Pengguna</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->