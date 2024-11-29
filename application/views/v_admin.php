<div class="col-xl-6 col-md-4 mb-3 mt-3">
    <div class="card shadow h-100 py-2 bg-selamat">
        <div class="card-body">
            <div class="row no-gutters align-items-center mt-1">
                <img src="img/logo/short_logo2.png" class="img-selamat elevation-4">
                <div class="col mr-2">
                    <div class="font-weight-bold mb-1 teks-selamat" style="font-size: 23px; margin-left: 125px; margin-top: 10px; color: #0b544b;">Halo Admin <?= $this->session->userdata('nama_user'); ?> 🤩 !</div>
                    <div class="font-weight mb-1 teks-selamat" style="font-size: 19px; margin-left: 125px; color: #0b544b;">Selamat datang & selamat bekerja <strong>^.^</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-6 mt-3">
    <div class="small-box card shadow" style="background-image: linear-gradient(rgba(18, 56, 137, 0.4), white); border-left: 2px solid #12389f; border-right: 2px solid #12389f; border-radius: 10px;">
        <div class="card-body" style="padding-left: 25px; padding-right: 25px;">
            <div class="row align-items-center" style="padding-bottom: 0px;">
                <div class="col mr-2">
                    <div class="h2 mb-0 font-weight-bold" style="color: #12389f; font-size: 40px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);"><?= $total_transaksi ?></div>
                    <div class="font-weight-bold text-uppercase mb-1" style="color: #12389f; font-size: 16px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);">
                        Transaksi Pesanan
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-4x" style="color: #12389f"></i>
                </div>
            </div>
        </div>
        <a href="<?= base_url('admin/pesanan_masuk'); ?>" class="small-box-footer" style="color: #12389f;">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6 mt-3">
    <div class="small-box card shadow" style="background-image: linear-gradient( rgba(2, 215, 2, 0.3), white); border-left: 2px solid #02D702; border-right: 2px solid #02D702; border-radius: 10px;">
        <div class="card-body" style="padding-left: 25px; padding-right: 25px;">
            <div class="row align-items-center" style="padding-bottom: 0px;">
                <div class="col mr-2">
                    <div class="h2 mb-0 font-weight-bold" style="color: #02D702; font-size: 40px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);"><?= $total_barang ?></div>
                    <div class="font-weight-bold text-uppercase mb-1" style="color: #02D702; font-size: 16px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);">
                        Total Produk
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-couch fa-4x" style="color: #02D702"></i>
                </div>
            </div>
        </div>
        <a href="<?= base_url('barang') ?>" class="small-box-footer" style="color: #02D702;">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6 mt-3">
    <div class="small-box card shadow" style="background-image: linear-gradient( rgba(255, 165, 0, 0.3), white); border-left: 2px solid orange; border-right: 2px solid orange; border-radius: 10px;">
        <div class="card-body" style="padding-left: 25px; padding-right: 25px;">
            <div class="row align-items-center" style="padding-bottom: 0px;">
                <div class="col mr-2">
                    <div class="h2 mb-0 font-weight-bold" style="color: orange; font-size: 40px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);"><?= $total_pelanggan ?></div>
                    <div class="font-weight-bold text-uppercase mb-1" style="color: orange; font-size: 16px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);">
                        Total Customer
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-3x" style="color: orange"></i>
                </div>
            </div>
        </div>
        <a href="<?= base_url('pelanggan'); ?>" class="small-box-footer" style="color: orange;">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6 mt-3">
    <div class="small-box card shadow" style="background-image: linear-gradient( rgba(201, 0, 0, 0.3), white); border-left: 2px solid #c90000; border-right: 2px solid #c90000; border-radius: 10px;">
        <div class="card-body" style="padding-left: 25px; padding-right: 25px;">
            <div class="row align-items-center" style="padding-bottom: 0px;">
                <div class="col mr-2">
                    <div class="h2 mb-0 font-weight-bold" style="color: #c90000; font-size: 40px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);"><?= $total_kategori ?></div>
                    <div class="font-weight-bold text-uppercase mb-1" style="color: #c90000; font-size: 16px; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.1);">
                        Data Kategori
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-th-large fa-4x" style="color: #c90000"></i>
                </div>
            </div>
        </div>
        <a href="<?= base_url('kategori') ?>" class="small-box-footer" style="color: #c90000;">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>