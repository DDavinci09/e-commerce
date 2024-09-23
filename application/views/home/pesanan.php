<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="col text-center">
                        <h1 class="text-center">PESANAN</h1>
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')): ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h5><?= $this->session->flashdata('message'); ?></h5>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
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
                            <th>Data Produk</th>
                            <th>Data Pesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Aski</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($pesanan as $ps): ?>
                        <tr class="highlight">
                            <td><?= $i++; ?></td>
                            <td>
                                <div class="card m-1" style="width: 200px;">
                                    <div class="card-body p-1">
                                        <?php if ($ps['diskon_produk'] > 0 ) { ?>
                                        <span class="discount-badge position-absolute">
                                            <?= $ps['diskon_produk'] ?>%
                                        </span>
                                        <?php } ?>
                                        <img src="<?= base_url('./assets/upload/produk/') . $ps['image']; ?>"
                                            class="img-fluid rounded" alt="Gambar Kosong">
                                        <div class="row">
                                            <div class="col text-left">
                                                <b><?= word_limiter($ps['nama_produk'], 3); ?></b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <?= word_limiter($ps['nama_kategori'], 3); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <i class="fas fa-star fa-sm" style="color: orange;">
                                                    <?= $ps['rating_produk'] ?></i>
                                            </div>
                                            <div class="col text-center">
                                                | <?= $ps['stok_produk'] ?> |
                                            </div>
                                            <div class="col text-right">
                                                <?= $ps['jenis_produk'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <span>
                                                    <i class="fas fa-map-marker fa-sm" style="color: black;">
                                                    </i> Nama Kota
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card" style="width: 250px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <strong>Pembayaran:</strong> <?= $ps['pembayaran'] ?><br>
                                                <strong>Tanggal:</strong>
                                                <?= date("d-m-Y", strtotime($ps['tgl_pesanan'])) ?><br>
                                                <strong>Jumlah:</strong> <?= $ps['jml_pesanan'] ?><br>
                                                <strong>Harga:</strong> Rp.
                                                <?= number_format($ps['harga_pesanan'], 0, ',', '.'); ?><br>
                                                <strong>Total:</strong> Rp.
                                                <?= number_format($ps['total_pembayaran'], 0, ',', '.'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>">
                                    <i
                                        class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                    <?= $ps['status_bayar'] ?>
                                </a>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : 'btn-warning') ?>">
                                    <i
                                        class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : 'fa-times-circle') ?>"></i>
                                    <?= $ps['status_pesanan'] ?>
                                </a>
                            </td>
                            <td>
                                <?php if($ps['status_pesanan'] !== 'Selesai' ) { ?>
                                <a class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php } else { ?>
                                <a class="btn btn-sm btn-secondary"
                                    href="<?= base_url() ?>User/Detail/<?= $ps['id_produk'] ?>">
                                    <i class="fas fa-sticky-note"></i> Review
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>