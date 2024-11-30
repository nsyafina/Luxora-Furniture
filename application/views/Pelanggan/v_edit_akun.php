<!-- Begin Page Content -->
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('pelanggan/edit'); ?>
            <div class="form-group row">
                <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= set_value('nama_pelanggan', $pelanggan->nama_pelanggan); ?>">
                    <?= form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email', $pelanggan->email); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="Minimal 6 Karakter">
                    <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin ubah
                </div>
            </div>

            <div class="form-group row">
                <label for="no_telp" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Foto Lama -->
                            <img src="<?= base_url('./img/profile/') . $pelanggan->foto; ?>" alt="Foto Profil" id="gambar_load"
                                class="w-30 h-30 object-cover border border-gray-400" style="max-width: 200px; max-height: 200px;">
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control" id="preview_gambar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="button" class="btn btn-dark" onclick="window.location.href='<?= site_url('pelanggan/akun'); ?>'">Kembali</button>
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