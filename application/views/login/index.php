<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .bg-login-image {
        background-image: url("<?= base_url('assets/img/logo.png'); ?>");
        background-repeat: no-repeat;
        background-size: 60%;
    }
    </style>

</head>

<body class="bg-gradient-warning">
    <!-- <body background="<?=base_url();?>./assets/img/background.jpg"> -->
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/img/suratok.jpg')?>" width="90%">
                                    </div>
                                    <br>
                                    <form class="user" action="login/proses_login" role="form" autocomplete="off"
                                        id="formlogin" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="username" required="" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="password" required="" placeholder="password">
                                        </div>
                                        <button class="btn btn-warning btn-user btn-block" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <marquee direction="left" scrollamount="10" align="center" bgcolor="#32CD32" height="35px">
                        <vr>
                            <h2>
                                <font color="white">SELAMAT DATANG DI SISTEM PERSURATAN BALAI PENELITIAN TANAMAN PEMANIS
                                    DAN
                                    SERAT (SIPERTA)</font>
                            </h2>
                    </marquee>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

</body>

</html>