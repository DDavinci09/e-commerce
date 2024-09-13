<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
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
                                        <th>Nama Produk</th>
                                        <th>Jenis</th>
                                        <th>Keteragan</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Image</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <?php
                                        $i = 1;
                                        foreach ($produk as $p):
                                            ?>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p['nama_produk'] ?></td>
                                            <td><?= $p['jenis_produk'] ?></td>
                                            <td><?= $p['keterangan_produk'] ?></td>
                                            <td><?= $p['stok_produk'] ?></td>
                                            <td><?= $p['harga_produk'] ?></td>
                                            <td><?= $p['diskon_produk'] ?></td>
                                            <td><?= $p['image'] ?></td>
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