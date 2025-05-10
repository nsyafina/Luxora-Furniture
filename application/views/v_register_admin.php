<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | Luxora Interiors</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<style>
    body {
        background-image: url('../img/background/3.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: fixed;
    }

    * {
        font-family: serif;
    }

    .card {
        background: rgba(255, 255, 255, 0.3);
        border-top: 4px solid #0b544b;
        border-bottom: 4px solid #0b544b;
        box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
        width: 600px;
    }

    .logo-login {
        width: 300px;
    }


    .btn-login {
        border: none;
        border-radius: 6px;
        box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
        padding-bottom: 10px;
        cursor: pointer;
        color: white;
        -webkit-text-stroke: 1px rgba(191, 191, 191, 0.409);
        font-weight: bold;
        background-size: 200%;
        background-image: linear-gradient(to left, #ff4500, #f9cd26, #ff4500);
        transition: 0.6s;
    }

    .btn-login:hover {
        background-position: right;
    }

    #bg-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        /* Pastikan video berada di belakang konten lainnya */
    }
</style>

<body class="hold-transition login-page">
    <video autoplay muted loop id="bg-video">
        <source src="../img/background/login.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="login-box" style="margin-right: 200px;">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center text-white">
                <a href="http://localhost/luxora-interiors/"><img src="../img/logo/long_logo.png" class="logo-login mb-1"></a>
            </div>
            <di class="card-body text-white mb-3">

                <?php
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>', '</div>');

                if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-times"></i> Error!</h5>';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                }

                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }

                echo form_open('autentifikasi/register')
                ?>
                <!-- Input Nama User -->
                <div class="input-group mb-3">
                    <input style="border: 1px solid rgba(11, 84, 75, 1); border-radius: 5px 0 0 5px;" type="text" name="nama_user" class="form-control" placeholder="Nama User">
                    <div class="input-group-append">
                        <div class="input-group-text" style="background: #0b544b; color: white; border: 1px solid rgba(11, 84, 75, 1);">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Input Username dan No Telp -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input style="border: 1px solid rgba(11, 84, 75, 1); border-radius: 5px 0 0 5px;" type="text" name="username" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background: #0b544b; color: white; border: 1px solid rgba(11, 84, 75, 1);">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input style="border: 1px solid rgba(11, 84, 75, 1); border-radius: 5px 0 0 5px;" type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background: #0b544b; color: white; border: 1px solid rgba(11, 84, 75, 1);">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Password dan Retype Password -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input style="border: 1px solid rgba(11, 84, 75, 1); border-radius: 5px 0 0 5px;" type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background: #0b544b; color: white; border: 1px solid rgba(11, 84, 75, 1);">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <input style="border: 1px solid rgba(11, 84, 75, 1); border-radius: 5px 0 0 5px;" type="password" name="ulangi_password" class="form-control" placeholder="Ulangi Password">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background: #0b544b; color: white; border: 1px solid rgba(11, 84, 75, 1);">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Register -->
                <div class="col-10" style="margin: auto;">
                    <button type="submit" class="btn btn-login btn-block">Daftar</button>
                </div>
                <?php echo form_close() ?>

                <p class="mb-0 mt-3 text-center text-white">
                    Sudah Punya Akun? <a href="<?= base_url('autentifikasi/login_admin') ?>" class="text-center text-white text-bold border-bottom">Masuk!</a>
                </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
</body>

</html>