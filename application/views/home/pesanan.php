<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="m-0 text-center">Data Pesanan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Produk Unggulan -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Metode Pembayaran</th>
                            <th>Tanggal Pesanan</th>
                            <th>Jumlah Pesanan</th>
                            <th>Harga Pesanan</th>
                            <th>Total Pemabayaran</th>
                            <th>Aski</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($pesanan as $ps): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $ps['pembayaran'] ?></td>
                            <td><?= $ps['tgl_pesanan'] ?></td>
                            <td><?= $ps['jml_pesanan'] ?></td>
                            <td><?= $ps['harga_pesanan'] ?></td>
                            <td><?= $ps['total_pembayaran'] ?></td>
                            <td>
                                aksi
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>