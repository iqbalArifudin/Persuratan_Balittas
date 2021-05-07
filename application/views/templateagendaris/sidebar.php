    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon">
                <img src="<?php echo base_url('assets/img/logo.png')?>" width="60%">

            </div>
            <div class="sidebar-brand-text mx-3">BALITTAS</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a href="<?php echo base_url().'agendaris/home' ?>" class="nav-link">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beranda</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a href="<?php echo base_url().'agendaris/surat' ?>" class="nav-link">
                <i class="fas fa-envelope"></i>
                <span>Surat</span></a>
        </li>

        </li>

        <!-- <hr class="sidebar-divider">
<li class="nav-item active">
    <a href="<?php echo base_url().'agendaris/surat/suratKeluar' ?>" class="nav-link">
        <i class="far fa-envelope-open"></i>
        <span>Surat Keluar</span></a>
</li> -->


        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola Surat</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url().'agendaris/surat' ?>">Tambah Surat</a>
            <a class="collapse-item" href="<?php echo base_url().'agendaris/surat/cekSurat' ?>">Cek Surat</a>
        </div>
    </div>
</li> -->

        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-envelope"></i>
        <span>Arsip Surat</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url().'agendaris/surat/suratMasuk' ?>">Surat Masuk</a>
            <a class="collapse-item" href="<?php echo base_url().'agendaris/surat/suratKeluar' ?>">Surat Keluar</a>
        </div>
    </div>
</li> -->


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->