<!-- Begin Page Content -->
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img
                    src="<?= base_url('img/profile/') . $user->foto; ?>"
                    alt="Foto Profil"
                    class="w-full h-full object-cover rounded-full border-2 border-gray-300"
                    style="max-width: 190px; max-height: 190px;">
            </div>
            <div class="col-md-8">
                <div class="card-body" id="profile-details">
                    <h5 class="card-title">Nama: <?= $user->nama_user; ?></h5>
                    <p class="card-text">Username: <?= $user->username; ?></p>
                    <p class="card-text">No Telp: <?= $user->no_telp; ?></p>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('admin/edit'); ?>" class="text text-white">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Tambahkan CSS untuk memperbaiki jarak -->
<style>
    #profile-details p {
        margin-bottom: 2px;
    }
</style>