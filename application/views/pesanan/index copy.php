<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Pesanan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Harga Pesanan</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Total Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pesanan</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($pesanan as $ps): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $ps['pembayaran'] ?></td>
                                        <td><?= $ps['tgl_pesanan'] ?></td>
                                        <td><?= $ps['harga_pesanan'] ?></td>
                                        <td><?= $ps['jml_pesanan'] ?></td>
                                        <td><?= $ps['total_pembayaran'] ?></td>
                                        <td>
                                            <?php if($user['role'] == 'Admin') { ?>
                                            <?php if($ps['status_bayar'] == 'Belum Bayar' ) { ?>
                                            <a class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                <i class="fas fa-times-circle"></i> <?= $ps['status_bayar'] ?>
                                            </a>
                                            <?php } else { ?>
                                            <a class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                <i class="fas fa-check-circle"></i> <?= $ps['status_bayar'] ?>
                                            </a>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <?php if($ps['status_bayar'] == 'Belum Bayar' ) { ?>
                                            <a class="btn btn-sm btn-danger">
                                                <i class="fas fa-times-circle"></i> <?= $ps['status_bayar'] ?>
                                            </a>
                                            <?php } else { ?>
                                            <a class="btn btn-sm btn-success">
                                                <i class="fas fa-check-circle"></i> <?= $ps['status_bayar'] ?>
                                            </a>
                                            <?php } ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($ps['status_pesanan'] == 'Diproses') { ?>
                                            <a class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                <i class="fas fa-spinner"></i> <?= $ps['status_pesanan'] ?>
                                            </a>
                                            <?php } else if($ps['status_pesanan'] == 'Selesai') { ?>
                                            <a class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                <i class="fas fa-check-circle"></i> <?= $ps['status_pesanan'] ?>
                                            </a>
                                            <?php } else { ?>
                                            <a class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                <i class="fas fa-times-circle"></i> <?= $ps['status_pesanan'] ?>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            aksi
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php foreach ($pesanan as $ps): ?>
<!-- Modal Status Pemabayaran -->
<div class="modal fade" id="status-bayar<?= $ps['id_pesanan'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-primary">
                <h4 class="modal-title">Status Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Admin/editStatusPembayaran'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                            <label for="statu_bayar">Status Pembayaran</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="status_bayar" name="status_bayar">
                                    <option value="Belum Bayar"
                                        <?= $ps['status_bayar'] == 'Belum Bayar' ? 'selected' : ''; ?>>Belum Bayar
                                    </option>
                                    <option value="Lunas" <?= $ps['status_bayar'] == 'Lunas' ? 'selected' : ''; ?>>Lunas
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-check"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Status Pesanan -->
<div class="modal fade" id="status-pesanan">
    <div class="modal-dialog dialog-center">
        <div class="modal-content">
            <div class="modal-header  bg-success">
                <h4 class="modal-title">Status Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach; ?>