<div class="col-sm-12 mt-3">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
    }
    ?>
    <div class="card card-primary card-outline card-outline-tabs" style="border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <!-- data pesanan masuk -->
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kode Transaksi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Tanggal</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Alamat Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No. Telp</th>
                            <!--<th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Id Produk</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">QTY</th>-->
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Grand Total</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);"></th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
                            <tr>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->tgl_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->alamat ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->hp_penerima ?></td>
                                <!--<td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->id_barang ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->qty ?></td>-->
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-danger">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Sudah Bayar</span><br>
                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                    <?php } ?>
                                </td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-cek-bukti" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                        <a href=" <?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-proses">Proses</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.data pesanan masuk -->

                <!-- data pesanan diproses -->
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kode Transaksi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Tanggal</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Alamat Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No. Telp</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Grand Total</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);"></th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                            <tr>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->tgl_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->alamat ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->hp_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                    <span class="badge badge-warning">Diproses</span>
                                </td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-kirim" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane"></i> Kirim</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.data pesanan diproses -->

                <!-- data pesanan dikirim -->
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kode Transaksi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Tanggal</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Alamat Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No. Telp</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Grand Total</th>

                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                            <tr>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->tgl_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->alamat ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->hp_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                    <span class="badge badge-success">Dikirim</span>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.data pesanan dikirim -->

                <!-- data pesanan selesai -->
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kode Transaksi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Tanggal</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Alamat Penerima</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No. Telp</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Grand Total</th>

                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->tgl_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->alamat ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->hp_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                    <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                    <span class="badge badge-success">Diterima</span>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div><!-- /.data pesanan selesai -->
            </div>
        </div>
    </div> <!-- /.card -->
</div>

<?php foreach ($pesanan as $key => $value) { ?>

    <!-- modal cek bukti pembayaran -->
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Atas Nama</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Nama Bank</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">No Rekening</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Grand Total</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Rp. <?= number_format($value->grand_total) ?></td>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('img/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('admin/kirim/' . $value->id_transaksi);
                    $no_resi = random_int(1000000000, 9999999999); // Membuat nomor resi dengan angka acak 8 digit
                    ?>
                    <table class="table">
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Expedisi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->expedisi ?></th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Paket</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Ongkir</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">IDR. <?= number_format($value->ongkir, 0) ?>.-</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">No. Resi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">:</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><input name="no_resi" value="<?= $no_resi ?>" class="form-control" readonly></th>
                        </tr>

                    </table>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-close-modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-kirim"><i class="fa fa-paper-plane"></i> Kirim</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>