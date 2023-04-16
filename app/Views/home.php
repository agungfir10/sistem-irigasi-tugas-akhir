<style>
    * {
        margin: 0;
        padding: 0;
    }

    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 6px 12px;
    }

    ul {
        list-style: none;
        display: flex;
        column-gap: 16px;
    }

    ul li {
        height: fit-content;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .container {
        max-width: 970px;
        margin: 0 auto;
    }
</style>

<body>

    <header>
        <h1>Home Petani</h1>
        <nav>
            <ul>
                <li>
                    <?= esc($name) ?>
                </li>
                <li>
                    <form action="<?= base_url('/logout'); ?>" method="post">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

</body>
<!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->
<script type="module">
    // const waterLevelPenampungan = document.getElementById('penampungan-water-level')
    // const phAirPenampungan = document.getElementById('penampungan-ph-air')
    // const phAirPenadah = document.getElementById('penadah-ph-air')
    // const statusHujanEl = document.getElementById('status-hujan')

    // import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js'
    // import { getDatabase, ref, onValue, query, limitToFirst } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-database.js"


    // // TODO: Replace the following with your app's Firebase project configuration
    // // See: https://firebase.google.com/docs/web/learn-more#config-object
    // const firebaseConfig = {
    //     databaseURL: "https://sistem-penadah-hujan-default-rtdb.asia-southeast1.firebasedatabase.app",
    // };

    // // Initialize Firebase
    // const app = initializeApp(firebaseConfig);


    // // Initialize Realtime Database and get a reference to the service
    // const database = getDatabase(app);

    // const penampunganRef = query(ref(database, 'penampungan'), limitToFirst(1))
    // onValue(penampunganRef, (snapshot) => {
    //     const data = snapshot.val();
    //     for (const penampungan in data) {
    //         waterLevelPenampungan.innerText = data[penampungan].water_level
    //         phAirPenampungan.innerText = data[penampungan].ph
    //     }
    // });

    // const penadahRef = query(ref(database, 'penadah'), limitToFirst(1))
    // onValue(penadahRef, (snapshot) => {
    //     const data = snapshot.val();
    //     for (const penadah in data) {
    //         phAirPenadah.innerText = data[penadah].ph
    //     }
    // });

    // const statusHujanRef = query(ref(database, 'status_hujan'), limitToFirst(1))
    // onValue(statusHujanRef, (snapshot) => {
    //     const data = snapshot.val();
    //     for (const statusHujan in data) {
    //         statusHujanEl.innerText = data[statusHujan].status ? 'Sedang hujan' : 'Sedang tidak hujan';
    //     }
    // });
</script>