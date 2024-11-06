<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail Produk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row m-1">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <?php if ($produk['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $produk['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$produk['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 450px; height: 350px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $produk['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $produk['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 450px; height: 350px;">
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h2><?= $produk['nama_produk'] ?></h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h5>Kategori</h5>
                                            </div>
                                            <div class="col-9">
                                                <h5>: <?= $produk['nama_kategori'] ?></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h5>Berat</h5>
                                            </div>
                                            <div class="col-9">
                                                <h5>: <?= $produk['berat_produk'] ?> gram</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <h5>Harga</h5>
                                            </div>
                                            <div class="col-9">
                                                <h5>:
                                                    <?php if ($produk['diskon_produk'] > 0 ) { ?>
                                                    <span class="text-danger">
                                                        Rp. <?= number_format($produk['harga_diskon'], 0, ',', '.'); ?>
                                                    </span> |
                                                    <span class="text-muted text-decoration-line-through">
                                                        <s>
                                                            <?= number_format($produk['harga_produk'], 0, ',', '.'); ?>
                                                        </s>
                                                    </span>
                                                    <?php } else { ?>
                                                    <span>
                                                        Rp. <?= number_format($produk['harga_produk'], 0, ',', '.'); ?>
                                                    </span>
                                                    <?php } ?>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-3">
                                                <h5>Rating</h5>
                                            </div>
                                            <div class="col col-3">
                                                : <i class="fas fa-star fa-md" style="color: orange;">
                                                    <?= $produk['rating_produk'] ?></i>
                                            </div>
                                            <div class="col col-3 text-right">
                                                <h5>Stok</h5>
                                            </div>
                                            <div class="col col-3 text-right">
                                                : <?= $produk['stok_produk'] ?>
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
                                                                <h5><?= $produk['keterangan_produk'] ?></h5>
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
                                                                        <h5>Nama Alumni</h5>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h5>: <?= $produk['nama'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>Email</h5>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h5>: <?= $produk['email'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>No Telp</h5>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h5>: <?= $produk['no_telp'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>No Rekening</h5>
                                                                    </div>
                                                                    <div class="col col-9">
                                                                        <h5>: <?= $produk['no_rekening'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>Nama Toko</h5>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5>: <?= $produk['nama_toko'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>Alamat Toko</h5>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5>: <?= $produk['alamat_toko'] ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col col-3">
                                                                        <h5>Keterangan Toko</h5>
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5>: <?= $produk['keterangan_toko'] ?></h5>
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

    <!-- Main content -->
    <section class="content py-1">
        <div class="container">
            <div class="card" id="review">
                <div class="card-header bg-secondary">
                    <h3>Review Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($review as $r) : ?>
                        <div class="col col-6">
                            <div class="card">
                                <h5><?= $r['nama_user'] ?></h5>
                                <h5>
                                    Tanggal : <?= date("d-m-Y", strtotime($r['tgl_review'])) ?><br>
                                    Rating : ★ <?= $r['rating_review'] ?><br>
                                    Review : "<?= $r['isi_review'] ?>"
                                </h5>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(!$review) { ?>
                        <div class="col col-6 text-center mx-auto">
                            <div class="card">
                                <h5>Belum Ada Review yang dapat ditampilkan!</h5>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->