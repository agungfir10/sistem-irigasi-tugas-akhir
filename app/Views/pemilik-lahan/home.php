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
        <h1>Home Pemilik Lahan</h1>
        <nav>
            <ul>
                <li>
                    <?= esc($name) ?>
                </li>
                <li>
                    <form action="<?= base_url('/pemilik-lahan/logout'); ?>" method="post">
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

</body>
<!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->
<script type="module">

</script>