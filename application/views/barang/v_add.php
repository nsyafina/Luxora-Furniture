<div class="col-md-12 mt-3">
    <!-- general form elements disabled -->
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notifikasi form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i>', '</h6></div>');
            //notifikasi gagal upload gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-times"></i>' . $error_upload . '</h6></div>';
            }
            echo form_open_multipart('barang/add') ?>

            <div class="form-group">
                <label style="color: #0b544b;">Nama Produk</label>
                <input style="border: 2px solid #0b544b;" name="nama_barang" class="form-control" placeholder="Nama Barang ..." value="<?= set_value('nama_barang') ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label style="color: #0b544b;">Kategori</label>
                        <select style="border: 2px solid #0b544b;" name="id_kategori" class="form-control">
                            <option value="">-Pilih Kategori-</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Harga</label>
                        <input style="border: 2px solid #0b544b;" name="harga" class="form-control" placeholder="Harga Barang ..." value="<?= set_value('harga') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Berat (Kg)</label>
                        <input style="border: 2px solid #0b544b;" type="number" name="berat" min="0" class="form-control" placeholder="Berat Dalam Satuan Kilogram ..." value="<?= set_value('berat') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Material</label>
                        <input style="border: 2px solid #0b544b;" name="material" class="form-control" placeholder="Material Barang ..." value="<?= set_value('material') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Warna</label>
                        <input style="border: 2px solid #0b544b;" name="warna" class="form-control" placeholder="Warna Barang ..." value="<?= set_value('warna') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Kapasitas</label>
                        <input style="border: 2px solid #0b544b;" name="kapasitas" class="form-control" placeholder="Kapasitas Barang ..." value="<?= set_value('kapasitas') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Gambar</label>
                        <input style="border: 2px solid #0b544b; height: 45px;" type="file" name="gambar" class="form-control" id="preview_gambar" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('img/admin/no-image.png') ?>" id="gambar_load" width="250px">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-simpan-modal">Simpan</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-close-modal">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

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