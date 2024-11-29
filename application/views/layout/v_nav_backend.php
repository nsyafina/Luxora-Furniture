<!-- Main Sidebar Container -->
<aside class="sidebar-custom main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost/luxora-interiors/" class="brand-link" style="border: none;">
        <img src="<?php echo base_url('img/logo/long_logo.png'); ?>" class="logo-brand elevation-5">
        <!-- Divider -->
        <hr class="sidebar-divider" style="background-color:white; margin-bottom:0;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="margin:0;">

        <!-- Sidebar Menu -->
        <nav style="margin:0;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header" style="font-size: 12px; font-weight: bold;">HOME</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link
                    <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '') {
                        echo "active";
                    } ?>">
                        <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <div style="border-bottom: 1px solid white; margin: 7px 0;"></div>

                <li class="nav-header" style="font-size: 12px; font-weight: bold;">MASTER DATA</li>

                <li class="nav-item <?php if (in_array($this->uri->segment(1), ['kategori', 'barang', 'user'])) echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if (in_array($this->uri->segment(1), ['kategori', 'barang', 'user'])) echo 'active'; ?>">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Daftar data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background: white; border-radius: 5px;">
                        <li class="nav-item dropdown-sidebar">
                            <a href="<?= base_url('kategori') ?>"
                                class="nav-link nav-dp <?php if ($this->uri->segment(1) == 'kategori') echo 'active'; ?>"
                                style="<?= ($this->uri->segment(1) == 'kategori') ? 'color: #0b544b !important;' : ''; ?>">
                                <i class="nav-icon fas fa-solid fa-box-open"></i>
                                <p>Data Kategori</p>
                            </a>
                        </li>

                        <li class="nav-item dropdown-sidebar">
                            <a href="<?= base_url('barang') ?>"
                                class="nav-link nav-dp <?php if ($this->uri->segment(1) == 'barang') echo 'active'; ?>"
                                style="<?= ($this->uri->segment(1) == 'barang') ? 'color: #0b544b !important;' : ''; ?>">
                                <i class="nav-icon fas fa-solid fa-couch"></i>
                                <p>Data Produk</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown-sidebar">
                            <a href="<?= base_url('pelanggan') ?>"
                                class="nav-link nav-dp <?php if ($this->uri->segment(1) == 'pelanggan') echo 'active'; ?>"
                                style="<?= ($this->uri->segment(1) == 'pelanggan') ? 'color: #0b544b !important;' : ''; ?>">
                                <i class="nav-icon fas fa-solid fa-users"></i>
                                <p>Data Customer</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Divider -->
                <div style="border-bottom: 1px solid white; margin: 7px 0;"></div>

                <li class="nav-header" style="font-size: 12px; font-weight: bold;">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link 
            <?php if ($this->uri->segment(2) == 'pesanan_masuk' and $this->uri->segment(1) == 'admin') {
                echo "active";
            } ?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Transaksi Pesanan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('laporan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-file-alt"></i>
                        <p>
                            Laporan Transaksi
                        </p>
                    </a>
                </li>

                <!-- Divider -->
                <div style="border-bottom: 1px solid white; margin: 7px 0;"></div>


                <li class="nav-item">
                    <a href="<?= base_url('admin/setting') ?>" class="nav-link 
                    <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'setting') {
                        echo "active";
                    } ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('autentifikasi/logout_admin') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: linear-gradient(221deg, rgba(129, 200, 191, 1) 0%, rgba(242, 237, 219, 1) 53%, rgba(242, 237, 219, 1) 59%, rgba(255, 162, 162, 1) 100%);">
    <!-- Main content -->
    <div class="coent">
        <div class="container-fluid">
            <div class="row">