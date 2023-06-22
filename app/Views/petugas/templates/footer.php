<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan logout jika kamu mau keluar dari session.</div>
            <div class="modal-footer">
                <form action="<?= base_url('/petugas/logout'); ?>" method="post">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    Notification.requestPermission().then(function(permission) {
        if (permission === 'granted') {
            console.log('Pengguna telah menyetujui permintaan notifikasi');
        }
    });
</script>

<script>
    function sendNotif(title, message) {
        if (Notification.permission === 'granted') {
            var notification = new Notification(title, {
                body: message,
            });
        }
    }
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>
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
        orderByChild,
        equalTo
    } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js"

    const firebaseConfig = {
        apiKey: 'AIzaSyDyMcWmWEe1Yqcygov6kkYw8MRcW3yNzD8',
        databaseURL: 'https://sistem-irigasi-db158-default-rtdb.asia-southeast1.firebasedatabase.app/'
    };
    const app = initializeApp(firebaseConfig);

    const db = getDatabase(app);

    const pintu1Ref = ref(db, 'controls/pintu_1')

    onValue(pintu1Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            if (data.ketinggian_air <= 4) {
                sendNotif('Sistem Irigasi', 'Pintu Air 1 Penuh!')
            }
        }
    });

    const pintu2Ref = ref(db, 'controls/pintu_2')

    onValue(pintu2Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            if (data.ketinggian_air <= 4) {
                sendNotif('Sistem Irigasi', 'Pintu Air 2 Penuh!')
            }
        }
    });

    const pintu3Ref = ref(db, 'controls/pintu_3')

    onValue(pintu3Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            if (data.ketinggian_air <= 4) {
                sendNotif('Sistem Irigasi', 'Pintu Air 3 Penuh!')
            }

        }
    });

    const pintu4Ref = ref(db, 'controls/pintu_4')

    onValue(pintu3Ref, (snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            if (data.ketinggian_air <= 4) {
                sendNotif('Sistem Irigasi', 'Pintu Air 3 Penuh!')
            }

        }
    });
</script>
</body>

</html>