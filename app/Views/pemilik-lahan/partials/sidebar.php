<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><span class="h6">Sistem Irigasi</span></br>Petugas PSDA</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik-lahan') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik-lahan/kontrol') ?>">
            <i class="fas fa-fw fa-gamepad"></i>
            <span>Kontrol</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pemilik-lahan/ketinggian-air') ?>">
            <i class="fas fa-fw fa-water"></i>
            <span>Ketinggian Air</span></a>
    </li>

</ul>