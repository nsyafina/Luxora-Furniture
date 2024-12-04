<div class="container-bayar row">
    <div class="col-sm-6">
        <div class="card"
            style="border-radius: 15px; background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%); 
        box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4);">
            <div class="card-header">
                <h1 class="card-title" style="color:#0b544b; font-size: 1.5rem;">
                    <strong>No Rekening <span style="color:#c41212;">Luxora Interiors </strong></span>
                </h1>
            </div>

            <div class="card-body">
                <p>Silahkan transfer uang ke nomor rekening dibawah ini, sebesar :
                    <b>
                        <h3 style="font-size: 2rem; color: #c41212;">IDR. <?= number_format($pesanan->grand_total) ?>.-</h3>
                    </b>
                </p><br>
                <table class="table-striped table w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rekening as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_bank ?></td>
                                <td><?= $value->no_rek ?></td>
                                <td><?= $value->atas_nama ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card" style="border-radius: 15px; background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%); 
        box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4);">
            <div class="card-header">
                <h1 class="card-title" style="color:#0b544b; font-size: 1.5rem;">
                    <strong>Upload <span style="color:#c41212;">Bukti Bayar </strong></span>
                </h1>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label style="color: #0b544b;">Atas Nama</label>
                    <input style="border: 2px solid #0b544b;" name="atas_nama" class="form-control" placeholder="Masukkan nama anda.." required>
                </div>
                <div class="form-group">
                    <label style="color: #0b544b;">Nama Bank</label>
                    <input style="border: 2px solid #0b544b;" name="nama_bank" class="form-control" placeholder="Masukkan nama bank anda.." required>
                </div>
                <div class="form-group">
                    <label style="color: #0b544b;">No Rekening</label>
                    <input style="border: 2px solid #0b544b;" name="no_rek" class="form-control" placeholder="Masukkan nomor rekening anda.." required>
                </div>
                <div class="form-group">
                    <label style="color: #0b544b;" for="exampleInputFile">Bukti Bayar</label>
                    <input style="border: 2px solid #0b544b; height: 45px;" type="file" name="bukti_bayar" class="form-control" required>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-submit-bayar mb-2"><i class="fas fa-dollar-sign"></i> Payment</button>
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-close-bayar mb-2">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card -->
    </div>

</div>
</div>