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
                    <h1 class="h3 mb-0 text-gray-800">Riwayat Ketinggian Air</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Ketinggian Air</h6>
                    </div>
                    <div class="card-body">
                        <?php if (session()->get('status')) : ?>
                            <div class="alert alert-<?= session()->get('status') ?>">
                                <?= session()->get('message') ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ketinggian Air (cm)</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ketinggian Air (cm)</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody-ketinggian-air">

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
    <?php if (isset($listPetani)) : ?>
        <?php foreach ($listPetani as $key => $petani) : ?>
            <div class="modal fade" id="deleteModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    const ketinggianAirRef = ref(db, "ketinggian_air");

    onValue(ketinggianAirRef, (snapshot) => {
        if (snapshot.exists()) {
            let el;
            let i = 0;
            const obj = snapshot.val();
            for (const property in obj) {
                const dateHuman = Date(obj[property].tanggal * 1000)
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    timeZoneName: 'short'
                };
                const dateIndonesia = new Date(dateHuman).toLocaleDateString('id-ID', options)
                const index = dateIndonesia.indexOf('pukul');
                const start = dateIndonesia.slice(0, index - 1)
                const end = dateIndonesia.slice(index + 5)
                const datePrintable = start + end

                i++
                el += `
                <tr>
                    <td>${i}</td>
                    <td>${obj[property].ketinggian_air}</td>
                    <td>${datePrintable}</td>
                </tr>`
            }
            $('#tbody-ketinggian-air').html(el)

        }
    })
</script>
<?= $this->include('pemilik-lahan/partials/footer') ?>