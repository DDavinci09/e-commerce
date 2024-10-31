<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Nomor Rekening</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <!-- Tambah Rekening -->
                        <div class="col">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <form action="<?= base_url('Admin/Rekening'); ?>" method="post">
                                        <div class="row mx-auto">
                                            <div class="col-md-5 my-1">
                                                <input type="text" class="form-control" name="nama_bank" id="nama_bank"
                                                    placeholder="Nama Bank . . ."
                                                    value="<?= set_value('nama_bank'); ?>">
                                                <?= form_error('nama_bank', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-5 my-1">
                                                <input type="number" class="form-control" name="no_rekening"
                                                    id="no_rekening" placeholder="No Rekening . . . "
                                                    value="<?= set_value('no_rekening'); ?>">
                                                <?= form_error('no_rekening', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-2 my-1 text-center">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('message')): ?>
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5><?= $this->session->flashdata('message'); ?></h5>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Nama Bank</th>
                                                <th>Nomor Rekening</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($rekening as $rek): ?>
                                            <tr>
                                                <td><?= $rek['nama_bank'] ?></td>
                                                <td><?= $rek['no_rekening'] ?></td>
                                                <td>
                                                    <?php if ($rek['status'] == "Aktif") { ?>
                                                    <a href="<?= base_url(); ?>Admin/statusRekening/<?= $rek['id_rekening']; ?>/Tidak_Aktif"
                                                        class="btn btn-sm btn-success">
                                                        Aktif
                                                    </a>
                                                    <?php } else { ?>
                                                    <a href="<?= base_url(); ?>Admin/statusRekening/<?= $rek['id_rekening']; ?>/Aktif"
                                                        class="btn btn-sm btn-warning">
                                                        Tidak Aktif
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('Admin/Rekeningedit/'.$rek['id_rekening']) ?>"
                                                        class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editRekening<?= $rek['id_rekening'] ?>"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="<?= base_url('Admin/hapusRekening/'.$rek['id_rekening']) ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="deleteConfirmation('<?= base_url(); ?>Admin/hapusRekening/<?= $rek['id_rekening']; ?>')"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php foreach($rekening as $rek): ?>
<!-- Modal Upload Bukti Bayar -->
<div class="modal fade" id="editRekening<?= $rek['id_rekening'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Rekening</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/editRekening/'); ?><?= $rek['id_rekening'] ?>" method="post">
                    <div class="row mx-auto">
                        <div class="col-md-5 my-1">
                            <input type="text" class="form-control" name="nama_bank" id="nama_bank"
                                placeholder="Nama Bank . . ." value="<?= $rek['nama_bank'] ?>" required>
                        </div>
                        <div class="col-md-5 my-1">
                            <input type="number" class="form-control" name="no_rekening" id="no_rekening"
                                placeholder="No Rekening . . . " value="<?= $rek['no_rekening'] ?>" required>
                        </div>
                        <div class="col-md-2 my-1 text-center">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>