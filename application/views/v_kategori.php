<div class="col-md-12 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header">
            <button data-toggle="modal" data-target="#add" type="button" class="btn btn-add"><i class="fas fa-plus" style="padding-right: 5px;"></i> Tambah Data</button>
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
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama Kategori</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $key => $value) { ?>
                        <tr>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $no++; ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_kategori ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center">
                                <button class="btn btn-edit" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-hapus" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fa fa-trash"></i></button>
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

<!-- .modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                <h4 class="modal-title" style="color: #0b544b;"><i class="fa fa-plus"></i> Add Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kategori/add');
                ?>
                <div class="form-group">
                    <label style="color: #0b544b;">Nama Kategori</label>
                    <input style="border: 2px solid #0b544b;" type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                <button type="button" class="btn btn-close-modal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-simpan-modal">Simpan</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal add -->


<?php foreach ($kategori as $key => $value) { ?>
    <!-- .modal edit -->
    <div class="modal fade" id="edit<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <h4 class="modal-title" style="color: #0b544b;"><i class="fa fa-edit"></i> Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    // Buka form dan arahkan ke controller 'kategori/edit' dengan parameter id_kategori
                    echo form_open('kategori/edit/' . $value->id_kategori);
                    ?>
                    <div class="form-group">
                        <label style="color: #0b544b;">Nama Kategori</label>
                        <!-- Input untuk nama_kategori, isinya sudah diambil dari value database -->
                        <input type="text" style="border: 2px solid #0b544b;" name="nama_kategori" value="<?= $value->nama_kategori ?>" class="form-control" placeholder="Nama Kategori" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <button type="button" class="btn btn-close-modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-simpan-modal">Simpan</button>
                </div>
                <?php
                echo form_close(); // Tutup form
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit -->
<?php } ?>



<?php foreach ($kategori as $key => $value) { ?>
    <!-- .modal delete -->
    <div class="modal fade" id="delete<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Delete <?= $value->nama_kategori ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h6>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kategori/delete/' . $value->id_kategori) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal delete -->
<?php } ?>