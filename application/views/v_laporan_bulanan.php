<div class="col-12 mt-3">
    <div class="invoice p-3 mb-3" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="row">
            <div class="col-12">
                <h4 style="color: #0b544b;">
                    <i class="fas fa-shopping-cart"></i> Laporan Penjualan Bulanan
                    <small class="float-right">Bulan: <?= $bulan ?> Tahun: <?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">#</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kode Transaksi</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Tanggal</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Pelanggan</th>
                            <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $grand_total = 0;
                        foreach ($laporan as $key => $value) {
                            $grand_total = $grand_total + $value->grand_total;
                        ?>
                            <tr>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $no++ ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->no_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->tgl_order ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_penerima ?></td>
                                <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">Rp. <?= number_format($value->grand_total) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h4 style="color: #0b544b;">Grand Total : Rp. <?= number_format($grand_total) ?></h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-kirim" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                <a href="<?= base_url('laporan') ?>" class="btn btn-close-modal">Kembali</a>
            </div>
        </div>
    </div>
</div>