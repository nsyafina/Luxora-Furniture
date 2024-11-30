<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('Pelanggan/ubahProfil'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>">
                    <?= form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_telp" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('img/profile/') . $foto; ?>" class="img-thumbnail" id="gambar_load">
                        </div>
                        <div class="col-sm-9">
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
                    <button type="button" class="btn btn-dark" onclick="window.location.href='<?= site_url('admin/myProfil'); ?>'">Kembali</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

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