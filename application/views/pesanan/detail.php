<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail Pesanan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="row m-1">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <?php if ($pesanan['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $pesanan['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$pesanan['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 450px; height: 350px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $pesanan['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $pesanan['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 450px; height: 350px;">
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h2><?= $pesanan['nama_produk'] ?></h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h6>Kategori</h6>
                                            </div>
                                            <div class="col-9">
                                                <h6>: <?= $pesanan['nama_kategori'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h6>Jenis</h6>
                                            </div>
                                            <div class="col-9">
                                                <h6>: <?= $pesanan['jenis_produk'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h6>Harga</h6>
                                            </div>
                                            <div class="col-9">
                                                <h6>:
                                                    <?php if ($pesanan['diskon_produk'] > 0 ) { ?>
                                                    <span class="text-danger">
                                                        Rp. <?= number_format($pesanan['harga_diskon'], 0, ',', '.'); ?>
                                                    </span> |
                                                    <span class="text-muted text-decoration-line-through">
                                                        <s>
                                                            <?= number_format($pesanan['harga_produk'], 0, ',', '.'); ?>
                                                        </s>
                                                    </span>
                                                    <?php } else { ?>
                                                    <span>
                                                        Rp. <?= number_format($pesanan['harga_produk'], 0, ',', '.'); ?>
                                                    </span>
                                                    <?php } ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-3">
                                                <h6>Rating</h6>
                                            </div>
                                            <div class="col col-3">
                                                : <i class="fas fa-star fa-md" style="color: orange;">
                                                    <?= $pesanan['rating_produk'] ?></i>
                                            </div>
                                            <div class="col col-3 text-right">
                                                <h6>Stok</h6>
                                            </div>
                                            <div class="col col-3 text-right">
                                                : <?= $pesanan['stok_produk'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h3>Data Pesanan</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Nama</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>: <?= $pesanan['nama_user'] ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Tanggal Pesanan</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>: <?= date("d-m-Y", strtotime($pesanan['tgl_pesanan'])) ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Status Bayar</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>: <?= $pesanan['status_bayar'] ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Status Pesanan</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>: <?= $pesanan['status_pesanan'] ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Total Pembayaran</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>: Rp.<?= number_format($pesanan['total_pembayaran'], 0, ',', '.'); ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pembayaran">Metode Pembayaran</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="pembayaran"
                                                    name="pembayaran" value="<?= $pesanan['pembayaran'] ?>" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-money-check"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jml_pesanan">Jumlah Pesanan</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Jumlah Pesanan"
                                                    id="jml_pesanan" name="jml_pesanan"
                                                    value="<?= $pesanan['jml_pesanan'] ?>" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-boxes"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col">
                                <div class="card card-primary card-outline card-outline-tabs">
                                    <div class="card-header p-0 border-bottom-0 text-center">
                                        <ul class="nav nav-tabs justify-content-center" id="custom-tabs-four-tab"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-four-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                                                    aria-controls="custom-tabs-four-home" aria-selected="true">
                                                    <h5>Keterangan Produk</h5>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-four-profile" role="tab"
                                                    aria-controls="custom-tabs-four-profile" aria-selected="false">
                                                    <h5>Keterangan Toko</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body text-justify">
                                        <div class="tab-content" id="custom-tabs-four-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>Keterangan Produk :</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>
                                                                <h6><?= $pesanan['keterangan_produk'] ?></h6>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-four-profile-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col text-center">
                                                                        <h5>Keterangan Toko Alumni</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>Nama Alumni</h6>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h6>: <?= $pesanan['nama'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>Email</h6>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h6>: <?= $pesanan['email'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>No Telp</h6>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h6>: <?= $pesanan['no_telp'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>No Rekening</h6>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h6>: <?= $pesanan['no_rekening'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>Nama Toko</h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>: <?= $pesanan['nama_toko'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>Alamat Toko</h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>: <?= $pesanan['alamat_toko'] ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h6>Keterangan Toko</h6>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6>: <?= $pesanan['keterangan_toko'] ?></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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