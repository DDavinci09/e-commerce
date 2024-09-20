<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="m-0 text-center">SHOP</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Produk Unggulan -->
    <div class="container">
        <div class="row">
            <!-- Kategori (Kolom Kiri) -->
            <div class="col-lg-2 category-list">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5>Jenis Produk</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Jasa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5>Kategori Produk</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav flex-column">
                            <?php foreach ($kategori as $kt) : ?>
                            <li class="nav-item text-dark">
                                <a class="nav-link" href="#"><?= $kt['nama_kategori'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Produk (Kolom Kanan) -->
            <div class="col-lg-10">
                <div class="card p-1">
                    <div class="row m-1">
                        <?php foreach ($produk as $p): ?>
                        <div class="col-md-3 p-0">
                            <div class="card m-1">
                                <div class="card-body p-1">
                                    <?php if ($p['diskon_produk'] > 0 ) { ?>
                                    <span class="discount-badge position-absolute">
                                        <?= $p['diskon_produk'] ?>%
                                    </span>
                                    <?php } ?>
                                    <img src="<?= base_url('./assets/upload/produk/') . $p['image']; ?>"
                                        class="img-fluid rounded" alt="Gambar Kosong">
                                    <div class="row">
                                        <div class="col text-left">
                                            <b><?= word_limiter($p['nama_produk'], 3); ?></b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <?php if ($p['diskon_produk'] > 0 ) { ?>
                                            <span class="text-danger">
                                                Rp. <?= number_format($p['harga_diskon'], 0, ',', '.'); ?>
                                            </span> |
                                            <span class="text-muted text-decoration-line-through">
                                                <s>
                                                    <?= number_format($p['harga_produk'], 0, ',', '.'); ?>
                                                </s>
                                            </span>
                                            <?php } else { ?>
                                            <span>
                                                Rp. <?= number_format($p['harga_produk'], 0, ',', '.'); ?>
                                            </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <i class="fas fa-star fa-sm" style="color: orange;">
                                                <?= $p['rating_produk'] ?></i>
                                        </div>
                                        <div class="col text-right">
                                            <?= $p['jenis_produk'] ?>
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
                                    <div class="row">
                                        <div class="col">
                                            <?php if ($this->session->userdata('role') == 'User') { ?>
                                            <a class="btn btn-success btn-sm btn-block"
                                                href="<?= base_url() ?>User/Detail/<?= $p['id_produk'] ?>">Detail
                                                Produk</a>
                                            <?php } else { ?>
                                            <a class="btn btn-success btn-sm btn-block"
                                                href="<?= base_url() ?>Home/Detail/<?= $p['id_produk'] ?>">Detail
                                                Produk</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

</div>