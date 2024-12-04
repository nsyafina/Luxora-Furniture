<body class="hold-transition sidebar-mini" style="background-color: #F2EDDB;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #F2EDDB; box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.4); padding: 15px 10px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h3 style="margin-left: 10px; color: #0b544b;"><?= $title ?></h3>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link <?= (current_url() == site_url('admin/akun')) ? 'active' : ''; ?>" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <!-- Menggunakan gambar profil dari session -->
                            <img class="img-profile rounded-circle" src="<?= base_url('img/profile/') . $this->session->userdata('foto'); ?>" style="width: 35px; height: 35px;">
                            <?= $this->session->userdata('nama_user'); ?>
                        </span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-profile dropdown-item <?= (current_url() == site_url('admin/akun')) ? 'active' : ''; ?>" href="<?= site_url('admin/akun'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile Saya
                        </a>
                        <a class="dropdown-logout dropdown-item" href="<?= site_url('autentifikasi/logout_admin'); ?>">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                            Log out
                        </a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->