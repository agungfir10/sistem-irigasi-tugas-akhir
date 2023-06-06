<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Irigasi - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row col-lg-12">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ganti Password</h1>
                                    </div>
                                    <?php if (session()->get('status')) : ?>
                                        <p class="alert alert-<?= session()->get('status') ?>">
                                            <?= session()->get('message') ?>
                                        </p>
                                    <?php endif ?>

                                    <?php if (isset($token)) : ?>
                                        <form class="user" action="<?= base_url('/pemilik-lahan/reset') ?>" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="token" value="<?= $token ?>">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Ganti Password
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <a href="<?= base_url('/pemilik-lahan/login') ?>" class='mt-2 d-block text-center'>Login Petugas PSDA</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>