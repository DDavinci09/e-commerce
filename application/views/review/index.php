<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Review</h1>
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
                                        <th>Nama User</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Toko</th>
                                        <th>Isi Review</th>
                                        <th>Rating</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($review as $rv):
                                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $rv['nama_user'] ?></td>
                                        <td><?= $rv['nama_produk'] ?></td>
                                        <td><?= $rv['nama_toko'] ?></td>
                                        <td>"<?= $rv['isi_review'] ?>"</td>
                                        <td>
                                            <i class="fas fa-star fa-md" style="color: orange;"></i>
                                            <?= $rv['rating_review'] ?>
                                        </td>
                                        <td>
                                            <?php if ($this->session->userdata('role') !== 'Admin') { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Alumni/DetailProduk/<?= $rv['id_produk'] ?>#review"><i
                                                    class="fa fa-eye"></i></a>
                                            <?php } else { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Admin/DetailProduk/<?= $rv['id_produk'] ?>#review"><i
                                                    class="fa fa-eye"></i></a>
                                            <?php } ?>
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