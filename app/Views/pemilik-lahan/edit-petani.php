<?= $this->include('pemilik-lahan/partials/header') ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?= $this->include('pemilik-lahan/partials/sidebar') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?= $this->include('pemilik-lahan/partials/topbar') ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Petani</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <form class="p-4" method="post" action="<?= base_url('pemilik-lahan/edit-petani') ?>">
                        <?php if (session()->get('status')): ?>
                            <div class="alert alert-<?= session()->get('status') ?>">
                                <?= session()->get('message') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (count($user_selected) == 0): ?>
                            <div class="alert alert-warning">
                                User tidak ditemukan
                            </div>
                        <?php endif; ?>
                        <?php if (!count($user_selected) == 0): ?>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama"
                                    value="<?= $user_selected['name'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="email">Alamat email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Masukkan email"
                                    value="<?= $user_selected['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        <?php endif; ?>
                    </form>
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

<?= $this->include('pemilik-lahan/partials/footer') ?>