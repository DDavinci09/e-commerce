<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <!-- Kategori -->
                <div class="sidebar-categories">
                    <div class="head">Kategori Produk</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul>
                                    <?php 
                                // Tentukan controller berdasarkan peran
                                $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                ?>
                                    <li class="filter-list"><a href="<?= base_url($controller . '/shop/') ?>">Semua
                                            Kategori</a></label></li>
                                    <?php foreach ($kategori as $kt) : ?>
                                    <li class="filter-list"><a
                                            href="<?= base_url($controller . '/getKategoriProduk/' . urlencode($kt['id_kategori'])) ?>"><?= $kt['nama_kategori'] ?></a></label>
                                    </li>
                                    <?php endforeach; ?>

                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar" style="background-color: #384AEB;">
                    <div class="row">
                        <div class="col mt-1">
                            <h5 style="color:white;"><?= $title; ?></h5>
                        </div>
                        <div class="col text-right mt-1">
                            <h5 style="color:white;">Total Produk : <?= $totalproduk; ?></h5>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <?php foreach ($produk as $p): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <?php if ($p['diskon_produk'] > 0 ) { ?>
                                    <div class="discount-badge">
                                        <?= $p['diskon_produk'] ?>%
                                    </div>
                                    <?php } ?>
                                    <?php if (!$p['image']) { ?>
                                    <img class="card-img" src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                        href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                                        style="height: 250px; width: 250px;">
                                    <?php } else { ?>
                                    <img class="card-img"
                                        src="<?= base_url('./assets/upload/produk/') . $p['image']; ?>"
                                        href="<?= base_url('./assets/upload/produk/') ?><?= $p['image']; ?>" alt=""
                                        style="height: 250px; width: 250px;">
                                    <?php } ?>
                                    <ul class="card-product__imgOverlay">
                                        <li><a
                                                href="<?= base_url($controller . '/detail/' . urlencode($p['id_produk'])) ?>"><button><i
                                                        class="ti-search"></i></button></a></li>
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <li><button><i class="ti-heart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p><?= $p['nama_kategori']; ?></p>
                                    <?php 
                                    // Tentukan controller berdasarkan peran
                                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                                    <h4 class="card-product__title"><a
                                            href="<?= base_url($controller . '/detail/' . urlencode($p['id_produk'])) ?>"><?= $p['nama_produk']; ?></a>
                                    </h4>
                                    <p class="card-product__price">
                                        <?php if ($p['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp.<?= number_format($p['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through small">
                                            <s>
                                                <?= number_format($p['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp.<?= number_format($p['harga_produk'], 0, ',', '.'); ?>
                                        </span>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(!$produk) { ?>
                        <div class="col">
                            <div class="card text-center" style="width: 100%;">
                                <div class="row">
                                    <div class="col">
                                        <h1 style=" color: gray;">Tidak ada produk</h1>
                                        <p>Maaf, tidak ada produk yang tersedia saat ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
<!-- ================ category section end ================= -->