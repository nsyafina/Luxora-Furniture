<!-- Begin Page Content -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6">
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

    <!-- Profile Card -->
    <div class="card p-4" style="background: #F2EDDB; border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="row g-0 align-items-center">
            <!-- Profile Picture -->
            <div class="col-md-4 text-center">
                <div class="position-relative">
                    <img
                        src="<?= base_url('img/profile-admin/') . $user->foto; ?>"
                        alt="Foto Profil"
                        class="rounded-circle elevation-5"
                        style="width: 180px; height: 180px; object-fit: cover; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border: 4px solid #0b544b;">
                    <!-- Badge -->
                    <div class="badge position-absolute"
                        style="background: linear-gradient(to right, #0b544b, #43998e, #0b544b); color: white; bottom: 0px; left: 50%; transform: translateX(-50%); 
                        font-size: 1rem; font-weight: bold; padding: 5px 15px; border-radius: 20px; box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);">
                        Luxora Admin
                    </div>
                </div>
                <p class="mt-4 fst-italic fw-medium" style="color: #0b544b;">
                    "Your Satisfaction, Our Priority"
                </p>
                <a href="<?= base_url('admin/edit'); ?>" class="btn btn-edit-profile">
                    <i class="fas fa-user-edit me-2"></i> Edit Profile
                </a>
            </div>

            <!-- Profile Details -->
            <div class="col-md-8">
                <h1 class="card-title fw-bold mb-7 ml-4" style="color: #0b544b; font-size: 2rem;">
                    <i class="fas fa-solid fa-user"></i> My<span style="color: #c41212;"> Profile</span>
                </h1>
                <div class="card-body mt-4">
                    <div class="p-4 rounded" style="background-color: #e0eeec; border: 1px solid #d8ccc5;">
                        <p class="mb-3" style="color: #0b544b; font-size: 1.2rem; border-bottom: 1px solid #0b544b; padding-bottom: 8px;">
                            <span class="fw-bold" style="font-weight: bold;">Nama :</span> <?= $user->nama_user; ?>
                        </p>
                        <p class="mb-3" style="color: #0b544b; font-size: 1.2rem; border-bottom: 1px solid #0b544b; padding-bottom: 8px;">
                            <span class="fw-bold" style="font-weight: bold;">Email :</span> <?= $user->username; ?>
                        </p>
                        <p style="color: #0b544b; font-size: 1.2rem;">
                            <span class="fw-bold" style="font-weight: bold;">Nomor Telpon :</span> <?= $user->no_telp; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->