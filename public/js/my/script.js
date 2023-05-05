const waterLevelPenampungan = document.getElementById('penampungan-water-level')
    const phAirPenampungan = document.getElementById('penampungan-ph-air')
    const phAirPenadah = document.getElementById('penadah-ph-air')
    const statusHujanEl = document.getElementById('status-hujan')

    import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js'
    import { getDatabase, ref, onValue, query, limitToFirst } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-database.js"


    // TODO: Replace the following with your app's Firebase project configuration
    // See: https://firebase.google.com/docs/web/learn-more#config-object
    const firebaseConfig = {
        databaseURL: "https://sistem-penadah-hujan-default-rtdb.asia-southeast1.firebasedatabase.app",
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);


    // Initialize Realtime Database and get a reference to the service
    const database = getDatabase(app);

    const penampunganRef = query(ref(database, 'penampungan'), limitToFirst(1))
    onValue(penampunganRef, (snapshot) => {
        const data = snapshot.val();
        for (const penampungan in data) {
            waterLevelPenampungan.innerText = data[penampungan].water_level
            phAirPenampungan.innerText = data[penampungan].ph
        }
    });

    const penadahRef = query(ref(database, 'penadah'), limitToFirst(1))
    onValue(penadahRef, (snapshot) => {
        const data = snapshot.val();
        for (const penadah in data) {
            phAirPenadah.innerText = data[penadah].ph
        }
    });

    const statusHujanRef = query(ref(database, 'status_hujan'), limitToFirst(1))
    onValue(statusHujanRef, (snapshot) => {
        const data = snapshot.val();
        for (const statusHujan in data) {
            statusHujanEl.innerText = data[statusHujan].status ? 'Sedang hujan' : 'Sedang tidak hujan';
        }
    });