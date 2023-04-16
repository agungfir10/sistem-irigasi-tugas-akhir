<h1>Login Pemilik Lahan</h1>
<form action="<?= base_url('/pemilik-lahan/login') ?>" method="post">
    <label for="email">
        Email
        <input type="email" name="email" id="email">
    </label>
    <br>
    <label for="password">
        Password
        <input type="password" name="password" id="password">
    </label>
    <br>
    <button type="submit">Login</button>
</form>