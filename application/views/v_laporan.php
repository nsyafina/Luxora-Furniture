<div class="col-md-4 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header">
            <h3 class="card-title" style="color: #0b544b;"><i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Harian</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('laporan/lap_harian') ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Tanggal</label>
                        <select style="border: 2px solid #0b544b;" name="tanggal" class="form-control">
                            <?php
                            $mulai = 1;
                            for ($i = $mulai; $i < $mulai + 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Bulan</label>
                        <select style="border: 2px solid #0b544b;" name="bulan" class="form-control">
                            <?php
                            $mulai = 1;
                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="color: #0b544b;">Tahun</label>
                        <select style="border: 2px solid #0b544b;" name="tahun" class="form-control">
                            <?php
                            $mulai = date('Y') - 1;
                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-simpan-modal btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="col-md-4 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header">
            <h3 class="card-title" style="color: #0b544b;"><i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Bulanan</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open('laporan/lap_bulanan') ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Bulan</label>
                        <select style="border: 2px solid #0b544b;" name="bulan" class="form-control">
                            <?php
                            $mulai = 1;
                            for ($i = $mulai; $i < $mulai + 12; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label style="color: #0b544b;">Tahun</label>
                        <select style="border: 2px solid #0b544b;" name="tahun" class="form-control">
                            <?php
                            $mulai = date('Y') - 1;
                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-simpan-modal btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-4 mt-3">
    <div class="card" style="border-top: 4px solid #0b544b; border-bottom: 4px solid #0b544b; border-radius: 10px;">
        <div class="card-header">
            <h3 class="card-title" style="color: #0b544b;"><i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Tahunan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open('laporan/lap_tahunan') ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label style="color: #0b544b;">Tahun</label>
                        <select style="border: 2px solid #0b544b;" name="tahun" class="form-control">
                            <?php
                            $mulai = date('Y') - 1;
                            for ($i = $mulai; $i < $mulai + 10; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-simpan-modal btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>