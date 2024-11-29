<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">No Rekening Luxora Interiors</h3>
            </div>

            <div class="card-body">
                <p>Silahkan transfer uang ke nomor rekening dibawah ini, sebesar :
                    <b>
                        <h3 class="text-primary" style="font-size: 2rem;">IDR. <?= number_format($pesanan->grand_total) ?>.-</h3>
                    </b>
                </p><br>
                <table class="table">
                    <tr>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Atas Nama</th>
                    </tr>
                    <?php foreach ($rekening as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama_bank ?></td>
                            <td><?= $value->no_rek ?></td>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Nama</label>
                    <input name="atas_nama" class="form-control" placeholder="Masukkan nama anda.." required>
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Masukkan nama bank anda.." required>
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control" placeholder="Masukkan nomor rekening anda.." required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card -->
    </div>

</div>
</div>