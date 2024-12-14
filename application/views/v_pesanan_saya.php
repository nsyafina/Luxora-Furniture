<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
        ?>
    </div>
</div>

<div class="container-pesanan mx-auto px-4">
    <div class="w-full">
        <div class="shadow-md" style="border-radius: 15px; background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%); 
    box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4); border: 1px solid rgba(0, 0, 0, 0.4);">
            <!-- Tabs Header -->
            <div class="flex justify-start" id="tabs" style="border-bottom: 1px solid rgba(0, 0, 0, 0.4); border-top: 1px solid rgba(0, 0, 0, 0.4); border-radius:15px 15px 0 0;
            box-shadow: inset -5px 0px rgba(0, 0, 0, 0.2);">
                <button class="tabs-order py-2 px-4 text-sm font-bold text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none active-tab" data-tab="tab1">
                    Pesanan Baru
                </button>
                <button class="tabs-proses py-2 px-4 text-sm font-bold text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab2">
                    Diproses
                </button>
                <button class="tabs-kirim py-2 px-4 text-sm font-bold text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab3">
                    Dikirim
                </button>
                <button class="tabs-selesai py-2 px-4 text-sm font-bold text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab4">
                    Selesai
                </button>
            </div>

            <!-- Tabs Content -->
            <div class="p-4">
                <!-- Tab Pesanan Baru -->
                <div id="tab1" class="tab-content">
                    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand total</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
                                <tr>
                                    <td class="border px-6 py-2"><?= $value->no_order ?><br>
                                        <button class="btn btn-detail-pesanan mt-2 btn-sm" data-toggle="modal" data-target="#detailModal<?= $value->id_transaksi ?>">
                                            <i class="fas fa-info-circle"></i> Detail Pesanan
                                        </button>
                                        <!-- Modal Detail Pesanan -->
                                        <div class="modal fade" id="detailModal<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel"><strong>Detail Pesanan <?= $value->no_order ?></strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">ID Barang</th>
                                                                    <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Qty</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('rinci_transaksi');
                                                                $this->db->where('no_order', $value->no_order);
                                                                $detail = $this->db->get()->result();
                                                                foreach ($detail as $d) { ?>
                                                                    <tr>
                                                                        <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $d->id_barang ?></td>
                                                                        <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $d->qty ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-close-modal" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Detail Pesanan -->
                                    </td>
                                    <td class="border px-6 py-2"><?= $value->tgl_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->nama_penerima ?></td>
                                    <td class="border px-6 py-2"><?= $value->alamat ?></td>
                                    <td class="border px-6 py-2">
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : IDR. <?= number_format($value->ongkir) ?>.-<br>
                                    </td>
                                    <td class="border px-6 py-2">
                                        <b>IDR. <?= number_format($value->grand_total) ?>.-</b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded">Belum Bayar</span>
                                        <?php } else { ?>
                                            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Sudah Bayar</span><br>
                                            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded">Menunggu Verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn-bayar-pesanan font-bold py-2 px-3 rounded">
                                                <i class="fas fa-dollar-sign mr-1"></i> Bayar
                                            </a><br>
                                            <button type="button" class="btn-batalkan-pesanan font-bold py-2 px-3 rounded mt-2"
                                                data-toggle="modal" data-target="#cancelModal<?= $value->id_transaksi ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        <?php } ?>
                                    </td>
                                    <!-- Modal Validasi Batal -->
                                    <div class="modal fade" id="cancelModal<?= $value->id_transaksi ?>" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="color: #790000;">
                                                    <h5 class="modal-title" id="cancelModalLabel"><strong>Konfirmasi Pembatalan</strong></h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="color: #790000;">
                                                    Anda yakin ingin membatalkan pesanan ini? Tindakan ini tidak dapat dikembalikan.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-close-modal" data-dismiss="modal">Tetap Memesan</button>
                                                    <a href="<?= base_url('pesanan_saya/batalkan_pesanan/' . $value->id_transaksi) ?>" class="btn btn-batalkan-pesanan">Batalkan Pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Validasi Batal -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Pesanan Baru -->

                <!-- Tab Diproses -->
                <div id="tab2" class="tab-content hidden">
                    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($diproses as $key => $value) { ?>
                                <tr>
                                    <td class="border px-6 py-2"><?= $value->no_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->tgl_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->nama_penerima ?></td>
                                    <td class="border px-6 py-2"><?= $value->alamat ?></td>
                                    <td class="border px-6 py-2"><?= $value->expedisi ?></td>
                                    <td class="border px-6 py-2">
                                        <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                        <span class="badge badge-success">Terverikasi</span>
                                        <span class="badge badge-primary">Diproses</span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Diproses -->

                <!-- Tab Dikirim -->
                <div id="tab3" class="tab-content hidden">
                    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dikirim as $key => $value) { ?>
                                <tr>
                                    <td class="border px-6 py-2"><?= $value->no_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->tgl_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->nama_penerima ?></td>
                                    <td class="border px-6 py-2"><?= $value->alamat ?></td>
                                    <td class="border px-6 py-2"><?= $value->expedisi ?></td>
                                    <td class="border px-6 py-2">
                                        <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                        <span class="badge badge-success">Dikirim</span>
                                    </td>
                                    <td class="px-3 py-2">
                                        <button class="btn font-bold btn-diterima" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Dikirim -->

                <!-- Tab Selesai -->
                <div id="tab4" class="tab-content hidden">
                    <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-gradient-to-r bg-gradient-to-r from-yellow-400 to-red-500 text-white">
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($selesai as $key => $value) { ?>
                                <tr>
                                    <td class="border px-6 py-2"><?= $value->no_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->tgl_order ?></td>
                                    <td class="border px-6 py-2"><?= $value->nama_penerima ?></td>
                                    <td class="border px-6 py-2"><?= $value->alamat ?></td>
                                    <td class="border px-6 py-2"><?= $value->expedisi ?></td>
                                    <td class="border px-6 py-2">
                                        <b>Rp. <?= number_format($value->grand_total) ?></b><br>
                                        <span class="badge badge-success">Selesai</span>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Selesai -->
            </div>
        </div>
    </div>
</div>

<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" style="color: #0b544b; font-weight: bold;">Pesanan Diterima</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: #0b544b;">
                    Apakah anda yakin pesanan sudah diterima...?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-belum" data-dismiss="modal">Belum</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-sudah">Sudah</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<script>
    // JavaScript untuk membuat tab bekerja
    const tabs = document.querySelectorAll('#tabs button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-tab');

            // Hapus active class dari semua tombol
            tabs.forEach(btn => {
                btn.classList.remove('border-blue-500', 'active-tab');
                btn.classList.add('border-transparent');
            });

            // Tambahkan active class ke tombol yang diklik
            tab.classList.remove('border-transparent');
            tab.classList.add('border-blue-500', 'active-tab');

            // Sembunyikan semua konten tab
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Tampilkan konten tab yang sesuai
            document.getElementById(target).classList.remove('hidden');
        });
    });
</script>