<div class="col-md-12 mt-3">
    <!-- general form elements disabled -->
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <!-- /.card-header -->
        <div class="card-body">

            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }

            echo form_open('admin/setting'); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Provinsi</label>
                        <select style="border: 2px solid #0b544b;" name="provinsi" class="form-control"></select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Kota</label>
                        <select style="border: 2px solid #0b544b;" name="kota" class="form-control">
                            <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Nama Toko</label>
                        <input style="border: 2px solid #0b544b;" type="text" name="nama_toko" class="form-control" value="<?= $setting->nama_toko ?>" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Nomor Telepon</label>
                        <input style="border: 2px solid #0b544b;" type="text" name="no_telpon" class="form-control" value="<?= $setting->no_telpon ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label style="color: #0b544b;">Alamat Toko</label>
                <input style="border: 2px solid #0b544b;" type="text" name="alamat_toko" class="form-control" value="<?= $setting->alamat_toko ?>" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-simpan-modal">Simpan</button>
                <a href="<?= base_url('admin') ?>" class="btn btn-close-modal">Kembali</a>
            </div>
        </div>


        <?php echo form_close() ?>
    </div>
</div>


<script>
    $(document).ready(function() {
        //masukan data ke select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //masukan data ke select kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
    });
</script>