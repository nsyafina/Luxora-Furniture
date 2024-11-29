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
        <div class="bg-white shadow-md rounded">
            <!-- Tabs Header -->
            <div class="flex justify-start border-b bg-gray-100" id="tabs">
                <button class="py-2 px-4 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none active-tab" data-tab="tab1">
                    Order
                </button>
                <button class="py-2 px-4 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab2">
                    Diproses
                </button>
                <button class="py-2 px-4 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab3">
                    Dikirim
                </button>
                <button class="py-2 px-4 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none" data-tab="tab4">
                    Selesai
                </button>
            </div>

            <!-- Tabs Content -->
            <div class="p-4">
                <!-- Tab Order -->
                <div id="tab1" class="tab-content">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand_total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
                                <tr>
                                    <td class="border px-6 py-2"><?= $value->no_order ?></td>
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
                                    <td class="px-6 py-2">
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="bg-blue-500 hover:bg-blue-700 text-white text-xs font-bold py-2 px-4 rounded">Bayar</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Order -->

                <!-- Tab Diproses -->
                <div id="tab2" class="tab-content hidden">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand_total</th>
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
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand_total</th>
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
                                        <button class="btn btn-primary btn-md btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tab Dikirim -->

                <!-- Tab Selesai -->
                <div id="tab4" class="tab-content hidden">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kode Transaksi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Nama Penerima</th>
                                <th class="px-4 py-2">Alamat Penerima</th>
                                <th class="px-4 py-2">Expedisi</th>
                                <th class="px-4 py-2">Grand_total</th>
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
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin pesanan sudah diterima...?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
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