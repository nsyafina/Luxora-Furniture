<!-- Begin Page Content -->
<div class="container-fluid mt-3">
    <div class="row justify-content-center" style="padding: 0 10px;">
        <div class="col-lg-12 card" style="border-radius: 10px; background: #F2EDDB; border-top: 4px solid #0b544b;
        border-bottom: 4px solid #0b544b; padding: 30px;">
            <h2 class="text-center fw-bold" style="color: #0b544b;">
                <i class="fas fa-solid fa-user-edit"></i> <strong>Edit <span style="color: #c41212;">Profile</strong></span>
            </h2>
            <?= form_open_multipart('admin/edit'); ?>

            <!-- Form Group -->
            <div class="row mt-4">
                <!-- Nama -->
                <div class="col-md-4 mb-3">
                    <label for="nama_user" class="fw-bold" style="color: #0b544b;">Nama</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= set_value('nama_user', $user->nama_user); ?>"
                        style="border: 2px solid #0b544b; background-color: #fffdf7;">
                    <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Email -->
                <div class="col-md-4 mb-3">
                    <label for="username" class="fw-bold" style="color: #0b544b;">Email</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username', $user->username); ?>"
                        style="border: 2px solid #0b544b; background-color: #fffdf7;">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- No. Telpon -->
                <div class="col-md-4 mb-3">
                    <label for="no_telp" class="fw-bold" style="color: #0b544b;">No. Telpon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp', $user->no_telp); ?>"
                        style="border: 2px solid #0b544b; background-color: #fffdf7;">
                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <!-- Gambar -->
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <img src="<?= base_url('./img/profile-admin/') . $user->foto; ?>" alt="Foto Profil" id="gambar_load" class="rounded"
                        style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <!-- Pilih Gambar -->
                    <div class="mb-3">
                        <label for="foto" class="fw-bold" style="color: #0b544b;">Gambar</label>
                        <input type="file" class="form-control" id="preview_gambar" name="foto"
                            style="height: 45px; border: 2px solid #0b544b; background-color: #fffdf7;">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="fw-bold" style="color: #0b544b;">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 Karakter"
                            style="border: 2px solid #0b544b; background-color: #fffdf7;">
                        <small style="color: #0b544b;">Kosongkan jika tidak ingin ubah</small>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-ubah-profile">Ubah</button>
                    <button type="button" class="btn btn-batal-profile" onclick="window.location.href='<?= site_url('admin/akun'); ?>'">
                        Batal
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_load').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById('preview_gambar').addEventListener('change', function() {
        bacaGambar(this);
    });
</script>