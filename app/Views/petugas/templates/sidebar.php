<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><span class="h6">Sistem Irigasi</span></br>Petugas PSDA</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('petugas') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('petugas/kontrol') ?>">
            <i class="fas fa-fw fa-gamepad"></i>
            <span>Kontrol</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('petugas/ketinggian-air') ?>">
            <i class="fas fa-fw fa-water"></i>
            <span>Ketinggian Air</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>