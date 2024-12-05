<div class="col-md-12 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
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
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No.</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Nama</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">email</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">No.Telp</th>
                        <th style="border: 1px solid rgba(11, 84, 75, 1); color: white; background-color: rgba(11, 84, 75, 1);">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan as $key => $value) { ?>
                        <tr>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $no++; ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);"><?= $value->nama_pelanggan ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $value->email ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center"><?= $value->no_telp ?></td>
                            <td style="border: 1px solid rgba(11, 84, 75, 0.5); color: #0b544b; background-color: rgba(11, 84, 75, 0.3);" class="text-center">
                                <button class="btn btn-hapus" data-toggle="modal" data-target="#delete<?= $value->id_pelanggan ?>"><i class="fa fa-trash"></i></button>
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

<!------------------- Modal Delete ---------------------->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_pelanggan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <h4 class="modal-title" style="color: #0b544b;"><i class="fa fa-trash"></i> Delete <?= $value->nama_pelanggan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 style="color: #0b544b;">Anda yakin ingin menghapus data ini?</h6>
                </div>
                <div class="modal-footer justify-content-between" style="box-shadow: 0 0 1px 0  rgba(0, 0, 0, 1);">
                    <button type="button" class="btn btn-close-modal" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('user/delete/' . $value->id_pelanggan) ?>" class="btn btn-hapus">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!------------------- Modal Delete ---------------------->