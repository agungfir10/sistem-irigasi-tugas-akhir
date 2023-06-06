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
                    <a href="#" id='generate-report' class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                    </a>
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
                                        <th>No Pintu</th>
                                        <th>Ketinggian Air (cm)</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Pintu</th>
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
        set,
        orderByChild
    } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js"

    const firebaseConfig = {
        apiKey: 'AIzaSyDyMcWmWEe1Yqcygov6kkYw8MRcW3yNzD8',
        databaseURL: 'https://sistem-irigasi-db158-default-rtdb.asia-southeast1.firebasedatabase.app'
    };
    const app = initializeApp(firebaseConfig);

    const db = getDatabase(app);

    const ketinggianAirRef = query(ref(db, "ketinggian_air"), orderByChild("tanggal"), limitToLast(40));

    onValue(ketinggianAirRef, (snapshot) => {
        if (snapshot.exists()) {
            let data = [];
            let el;
            let i = 0;
            const obj = snapshot.val();
            for (const property in obj) {
                data.push(obj[property]);
            }
            data.reverse()
            data.forEach((item, index) => {
                el += `<tr>
                    <td>${index+=1}</td>
                    <td>${item.no_pintu}</td>
                    <td>${item.ketinggian_air}</td>
                    <td>${moment(item.tanggal).format('DD-MM-YYYY h:mm:ss')}</td>
                </tr>`
            })
            $('#tbody-ketinggian-air').html(el)

        }
    })
</script>
<?= $this->include('pemilik-lahan/partials/footer') ?>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    $('#generate-report').click(async (e) => {
        const res = await fetch('https://sistem-irigasi-db158-default-rtdb.asia-southeast1.firebasedatabase.app/ketinggian_air.json')
        const json = await res.json()
        let data = [];
        for (const key in json) {
            data.push(json[key])
        }

        data.reverse()
        moment.locale('id')
        const dataPrintable = data.map((item) => {
            return {
                no_pintu: item.no_pintu,
                ketinggian_air: item.ketinggian_air,
                tanggal: moment(item.tanggal).format('DD-MM-YYYY h:mm:ss'),
            }
        })
        printJS({
            printable: dataPrintable,
            properties: ['no_pintu', 'ketinggian_air', 'tanggal'],
            type: 'json',
            documentTitle: 'Laporan Ketinggian Air',
            showModal: true
        })
    })
</script>