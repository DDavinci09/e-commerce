<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Banner Home</h1>
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
                                    <form action="<?= base_url('Admin/Banner'); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <div class="row mx-auto">
                                            <div class="col-md-5 my-1">
                                                <input type="text" class="form-control" name="nama_banner"
                                                    id="nama_banner" placeholder="Nama Banner . . ."
                                                    value="<?= set_value('nama_banner'); ?>">
                                                <?= form_error('nama_banner', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-5 my-1">
                                                <input type="file" name="file" id="file"
                                                    placeholder="No Rekening . . . " value="<?= set_value('file'); ?>">
                                                <?= form_error('file', '<small class="text-danger">', '</small>'); ?>
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
                                                <th>No</th>
                                                <th>Nama Banner</th>
                                                <th>Banner</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($banner as $bn): ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $bn['nama_banner'] ?></td>
                                                <td><?= $bn['file'] ?></td>
                                                <td>
                                                    <?php if ($bn['status'] == "Aktif") { ?>
                                                    <a href="<?= base_url(); ?>Admin/statusBanner/<?= $bn['id_banner']; ?>/Tidak_Aktif"
                                                        class="btn btn-sm btn-success">
                                                        Aktif
                                                    </a>
                                                    <?php } else { ?>
                                                    <a href="<?= base_url(); ?>Admin/statusBanner/<?= $bn['id_banner']; ?>/Aktif"
                                                        class="btn btn-sm btn-warning">
                                                        Tidak Aktif
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('Admin/hapusBanner/'.$bn['id_banner']) ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="deleteConfirmation('<?= base_url(); ?>Admin/hapusBanner/<?= $bn['id_banner']; ?>')"><i
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


<?php foreach($banner as $bn): ?>
<!-- Modal Upload Bukti Bayar -->
<div class="modal fade" id="editRekening<?= $bn['id_banner'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Rekening</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/editRekening/'); ?><?= $bn['id_banner'] ?>" method="post">
                    <div class="row mx-auto">
                        <div class="col-md-5 my-1">
                            <input type="text" class="form-control" name="nama_bank" id="nama_bank"
                                placeholder="Nama Bank . . ." value="<?= $bn['nama_bank'] ?>" required>
                        </div>
                        <div class="col-md-5 my-1">
                            <input type="number" class="form-control" name="no_rekening" id="no_rekening"
                                placeholder="No Rekening . . . " value="<?= $bn['no_rekening'] ?>" required>
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