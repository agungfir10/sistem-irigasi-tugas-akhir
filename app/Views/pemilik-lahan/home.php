<?= $this->include('pemilik-lahan/partials/header') ?>
<!-- Page Wrapper -->
<div id="wrapper">
    <?= $this->include('pemilik-lahan/partials/sidebar') ?>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?= $user['name'] ?>
                            </span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Info Petani</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pintu 1
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <p id='pintu-1'>-</p>
                                        </div>
                                        <div id="ketinggian-air-1">
                                            Ketinggian : -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Pintu 2
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <p id='pintu-2'>-</p>
                                        </div>
                                        <div id="ketinggian-air-2">
                                            Ketinggian : -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Pintu 3
                                        </div>
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <p id='pintu-3'>-</p>
                                        </div>
                                        <div id="ketinggian-air-3">
                                            Ketinggian : -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Pintu 4
                                        </div>
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <p id='pintu-4'>-</p>
                                        </div>
                                        <div id="ketinggian-air-4">
                                            Ketinggian : -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Grafik Ketinggian Air Pintu 1</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="chart-pintu-1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Sistem Irigasi</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->


</div>
<!-- End of Page Wrapper -->
<script type="module">
    import {
        initializeApp
    } from 'https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js'
    import {
        getDatabase,
        ref,
        push,
        onValue,
        query,
        limitToLast,
        serverTimestamp,
        set
    } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js"

    const firebaseConfig = {
        apiKey: 'pY7NZK4SENnSCujrhqCILsP225Iug5q8LD8d8pTc',
        databaseURL: 'https://sistem-irigasi-f9d8b-default-rtdb.asia-southeast1.firebasedatabase.app'
    };
    const app = initializeApp(firebaseConfig);

    const db = getDatabase(app);

    const pintu1Ref = ref(db, 'controls/pintu_1')

    onValue(pintu1Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            $('#pintu-1').text(data.status ? 'Terbuka' : 'Tertutup');
            $('#ketinggian-air-1').text(`Ketinggian : ${data.ketinggian_air}cm`)
        }
    });

    const pintu2Ref = ref(db, 'controls/pintu_2')

    onValue(pintu2Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            $('#pintu-2').text(data.status ? 'Terbuka' : 'Tertutup');
            $('#ketinggian-air-2').text(`Ketinggian : ${data.ketinggian_air}cm`)
        }
    });

    const pintu3Ref = ref(db, 'controls/pintu_3')

    onValue(pintu3Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            $('#pintu-3').text(data.status ? 'Terbuka' : 'Tertutup');
            $('#ketinggian-air-3').text(`Ketinggian : ${data.ketinggian_air}cm`)
        }
    });

    const pintu4Ref = ref(db, 'controls/pintu_4')

    onValue(pintu3Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            $('#pintu-4').text(data.status ? 'Terbuka' : 'Tertutup');
            $('#ketinggian-air-4').text(`Ketinggian : ${data.ketinggian_air}cm`)
        }
    });
</script>
<?= $this->include('pemilik-lahan/partials/footer') ?>