<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
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
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $i = 1;
                                        foreach ($users as $user):
                                            ?>
                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['nama_user'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['no_telp'] ?></td>
                                            <td>
                                                <a class="btn btn-primary  btn-sm" data-bs-toggle="modal"
                                                    data-bs-target=""><i class="fa fa-edit"></i></a>

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