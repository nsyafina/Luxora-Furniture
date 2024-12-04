<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mt-4 mb-4 card card-edit-akun">
            <h2 class="title-edit"><i class="fa-solid fa-user-pen"></i> Edit <span>Profile</span></h2>
            <?= form_open_multipart('pelanggan/edit'); ?>
            <div class="form-group row mt-4">
                <!-- Baris Nama, Email, dan No. Telp -->
                <div class="col-md-4">
                    <label style="color: #0b544b;" for="nama_pelanggan" class="col-form-label">Nama</label>
                    <input style="border: 2px solid #0b544b;" type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= set_value('nama_pelanggan', $pelanggan->nama_pelanggan); ?>">
                    <?= form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-md-4">
                    <label style="color: #0b544b;" for="email" class="col-form-label">Email</label>
                    <input style="border: 2px solid #0b544b;" type="text" class="form-control" id="email" name="email" value="<?= set_value('email', $pelanggan->email); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-md-4">
                    <label style="color: #0b544b;" for="no_telp" class="col-form-label">No. Telpon</label>
                    <input style="border: 2px solid #0b544b;" type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp', $pelanggan->no_telp); ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- Baris Gambar dan Input di Sebelah Kanan -->
            <div class="form-group row mt-4">
                <!-- Gambar -->
                <div class="col-md-4">
                    <img src="<?= base_url('./img/profile/') . $pelanggan->foto; ?>" alt="Foto Profil" id="gambar_load"
                        class="w-90 object-cover border border-gray-400" style="max-width: 200px; max-height: 200px;">
                </div>
                <!-- Input Gambar dan Password -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label style="color: #0b544b;" for="foto" class="col-form-label">Gambar</label>
                            <input style="border: 2px solid #0b544b; height: 45px;" style="height: 45px;" type="file" name="foto" class="form-control" id="preview_gambar">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label style="color: #0b544b;" for="password" class="col-form-label">Password</label>
                            <input style="border: 2px solid #0b544b;" type="password" name="password" id="password"
                                class="mt-1 block w-full px-3 py-2 rounded-md shadow-sm sm:text-sm"
                                placeholder="Minimal 6 Karakter">
                            <p class="mt-2 text-sm text-teal-800">Kosongkan jika tidak ingin ubah</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="form-group row justify-content-end mt-4">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-ubah-profil">Ubah</button>
                    <button type="button" class="btn btn-batal" onclick="window.location.href='<?= site_url('pelanggan/akun'); ?>'">Batal</button>
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
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>