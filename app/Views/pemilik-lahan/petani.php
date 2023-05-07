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
                    <h1 class="h3 mb-0 text-gray-800">List Petani</h1>
                    <a href="/pemilik-lahan/tambah-petani"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i>Tambah Petani</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Petani</h6>
                    </div>
                    <div class="card-body">
                        <?php if (session()->get('status')): ?>
                            <div class="alert alert-<?= session()->get('status') ?>">
                                <?= session()->get('message') ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (isset($listPetani)): ?>
                                        <?php foreach ($listPetani as $key => $petani): ?>
                                            <tr>
                                                <td>
                                                    <?= $petani['name'] ?>
                                                </td>
                                                <td>
                                                    <?= $petani['email'] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                                        data-target="#deleteModal<?= $key ?>">
                                                        Hapus
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="/pemilik-lahan/edit-petani?id=<?= $petani['id'] ?>">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
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

    <!-- Logout Modal-->
    <?php if (isset($listPetani)): ?>
        <?php foreach ($listPetani as $key => $petani): ?>
            <div class="modal fade" id="deleteModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus
                                <?= $petani['name'] ?>?
                            </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tekan hapus untuk menghapus petani dengan email
                            <?= $petani['email'] ?>
                        </div>
                        <div class="modal-footer">
                            <form action="<?= base_url('/pemilik-lahan/hapus-petani'); ?>" method="post">
                                <input type="hidden" value="<?= $petani['email'] ?>" name='email' id="email">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

</div>
<!-- End of Page Wrapper -->

<?= $this->include('pemilik-lahan/partials/footer') ?>