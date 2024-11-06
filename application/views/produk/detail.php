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
                <div class="row">
                    <div class="col-12 col-md-5 mb-3">
                        <div class="card position-relative">
                            <!-- Badge diskon -->
                            <?php if ($produk['diskon_produk'] > 0) { ?>
                            <span class="discount-badge position-absolute">
                                <?= $produk['diskon_produk'] ?>%
                            </span>
                            <?php } ?>
                            <!-- Gambar produk -->
                            <?php if (!$produk['image']) { ?>
                            <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" class="img-fluid rounded"
                                data-toggle="lightbox"
                                style="width: 100%; height: auto; max-width: 450px; max-height: 350px;">
                            <?php } else { ?>
                            <img src="<?= base_url('./assets/upload/produk/') . $produk['image']; ?>"
                                href="<?= base_url('./assets/upload/produk/') ?><?= $produk['image']; ?>"
                                class="img-fluid rounded" data-toggle="lightbox"
                                style="width: 100%; height: auto; max-width: 450px; max-height: 350px;">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="row mb-2">
                            <div class="col">
                                <h2><?= $produk['nama_produk'] ?></h2>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 col-sm-3 col-md-2">
                                <h5>Kategori</h5>
                            </div>
                            <div class="col-8 col-sm-9 col-md-10">
                                <h5>: <?= $produk['nama_kategori'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 col-sm-3 col-md-2">
                                <h5>Diskon</h5>
                            </div>
                            <div class="col-8 col-sm-9 col-md-10">
                                <h5>: <?= $produk['diskon_produk'] ?>%</h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 col-sm-3 col-md-2">
                                <h5>Harga</h5>
                            </div>
                            <div class="col-8 col-sm-9 col-md-10">
                                <h5>:
                                    <?php if ($produk['diskon_produk'] > 0) { ?>
                                    <span class="text-danger">
                                        Rp.<?= number_format($produk['harga_diskon'], 0, ',', '.'); ?>
                                    </span> |
                                    <span class="text-muted text-decoration-line-through">
                                        <s>
                                            <?= number_format($produk['harga_produk'], 0, ',', '.'); ?>
                                        </s>
                                    </span>
                                    <?php } else { ?>
                                    <span>
                                        Rp.<?= number_format($produk['harga_produk'], 0, ',', '.'); ?>
                                    </span>
                                    <?php } ?>
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 col-sm-3 col-md-2">
                                <h5>Berat</h5>
                            </div>
                            <div class="col-8 col-sm-9 col-md-10">
                                <h5>: <?= $produk['berat_produk'] ?> Gram</h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 col-sm-3 col-md-2">
                                <h5>Stok</h5>
                            </div>
                            <div class="col-8 col-sm-9 col-md-10">
                                <h5>: <?= $produk['stok_produk'] ?></h5>
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
            <div class="container">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true">Keterangan Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Keterangan Toko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                            aria-controls="review" aria-selected="false">Review Produk</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p><?= nl2br(htmlspecialchars($produk['keterangan_produk'])); ?></p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>Nama Alumni</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['nama'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>Email</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['email'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>No Telp</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['no_telp'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>No Rekening</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['no_rekening'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>Nama Toko</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['nama_toko'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>Alamat Toko</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['alamat_toko'] ?></h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <h5>Keterangan Toko</h5>
                            </div>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-9">
                                <h5>: <?= $produk['keterangan_toko'] ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="row">
                            <div class="col">
                                <div class="box_total text-center">
                                    <h5>Overall Rating</h5>
                                    <h4>
                                        <?php
                                $overallRating = $produk['rating_produk'];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $overallRating) {
                                        echo '<i class="fa fa-star" style="color: yellow;"></i>';
                                    } else {
                                        echo '<i class="fa fa-star" style="color: gray;"></i>';
                                    }
                                }
                                ?>
                                    </h4>
                                    <h6><?= count($review) ?> Review</h6>
                                </div>
                                <div class="review_list">
                                    <?php foreach ($review as $r) : ?>
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4><?= $r['nama_user'] ?>
                                                    (<?= date("d-m-Y", strtotime($r['tgl_review'])) ?>)</h4>
                                                <?php
                                        $rating = $r['rating_review'];
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star" style="color: gray;"></i>';
                                            }
                                        }
                                        ?>
                                            </div>
                                        </div>
                                        <p><?= $r['isi_review']; ?></p>
                                    </div>
                                    <?php endforeach; ?>
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