<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Alumni</h1>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nama Toko</th>
                                        <th>No Telp</th>
                                        <th>Status</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($alumni as $alm):
                                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $alm['nama'] ?></td>
                                        <td><?= $alm['email'] ?></td>
                                        <td><?= $alm['nama_toko'] ?></td>
                                        <td><?= $alm['no_telp'] ?></td>
                                        <td>
                                            <?php if ($alm['status'] == "Approve") { ?>
                                                <a href="<?= base_url(); ?>Admin/editStatus/<?= $alm['id_alumni']; ?>/Decline"
                                                    class="btn btn-sm btn-success m-1">Approved</a>
                                            <?php } else { ?>
                                                <a href="<?= base_url(); ?>Admin/editStatus/<?= $alm['id_alumni']; ?>/Approve"
                                                    class="btn btn-sm btn-danger m-1">Declined</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target=""><i class="fa fa-edit"></i></a>

                                            <a class="btn btn-danger  btn-sm" href=""><i class="fa fa-trash"></i></a>
                                        </td>
                                        <?php endforeach; ?>
                                    </tr>
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