<div class="col-md-12 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header">
            <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-add"><i class="fas fa-plus" style="padding-right: 5px;"></i> Tambah data</a>

            <div class="card-tools">

            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i> ';
                echo $this->session->flashdata('pesan');
                echo '</h6></div>';
            }
            ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Produk</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">ID</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Deskripsi</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Harga</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Kategori</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Gambar</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $no++; ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_barang ?>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->id_barang ?>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);">
                                Berat: <?= $value->berat ?> Kg,<br>
                                Material: <?= $value->material ?>,<br>
                                Warna: <?= $value->warna ?>,<br>
                                Kapasitas: <?= $value->kapasitas ?>.
                            </td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center">Rp. <?= number_format($value->harga, 0) ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $value->nama_kategori ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><img src="<?= base_url('img/kategori/' . $value->gambar) ?>" width="150px"></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center">
                                <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-edit" style="margin-bottom: 5px;"><i class="fa fa-edit"></i></a><br>
                                <button class="btn btn-hapus" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?php foreach ($barang as $key => $value) { ?>
    <!-- .modal delete -->
    <div class="modal fade" id="delete<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <h4 class="modal-title" style="color: #0b544b;">Delete <?= $value->nama_barang ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 style="color: #0b544b;">Apakah Anda Yakin Ingin Menghapus Data Ini...?</h6>
                </div>
                <div class="modal-footer justify-content-between" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <button type="button" class="btn btn-close-modal" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-hapus">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal delete -->
<?php } ?>