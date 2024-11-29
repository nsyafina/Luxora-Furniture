<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('img/profile/') . $foto; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $nama_user; ?></h5>
                    <p class="card-text"><?= $username; ?></p>
                    <p class="card-text"><?= $alamat; ?></p>
                    <p class="card-text"><?= $no_telp; ?></p>

                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('admin/ubahProfil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->