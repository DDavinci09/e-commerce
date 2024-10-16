<main class="site-main">

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="../assets/home/img/home/hero-banner.png" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Shop is fun</h4>
                        <h1>Browse Our Premium Product</h1>
                        <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth
                            without morning over third. Their male dry. They are great appear whose land fly grass.
                        </p>
                        <a class="button button-hero" href="#">Browse Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
        <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel__slide">
                <img src="<?= base_url() ?>assets/home/img/home/hero-slide1.png" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="<?= base_url() ?>assets/home/img/home/hero-slide2.png" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="<?= base_url() ?>assets/home/img/home/hero-slide3.png" alt="" class="img-fluid">
                <a href="#" class="hero-carousel__slideOverlay">
                    <h3>Wireless Headphone</h3>
                    <p>Accessories Item</p>
                </a>
            </div>
        </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Produk Rating Tertinggi</p>
                <h2>Produk <span class="section-intro__style">Teratas</span></h2>
            </div>
            <div class="row">
                <?php foreach ($teratas as $tr) : ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <?php if ($tr['diskon_produk'] > 0 ) { ?>
                            <div class="discount-badge">
                                <?= $tr['diskon_produk'] ?>%
                            </div>
                            <?php } ?>
                            <?php if (!$tr['image']) { ?>
                            <img class="card-img mx-auto" src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                                style="height: 200px; width: 200px;">
                            <?php } else { ?>
                            <img class="card-img mx-auto"
                                src="<?= base_url('./assets/upload/produk/') . $tr['image']; ?>"
                                href="<?= base_url('./assets/upload/produk/') ?><?= $tr['image']; ?>" alt=""
                                style="height: 200px; width: 200px;">
                            <?php } ?>
                            <ul class="card-product__imgOverlay">
                                <li><button><i class="ti-search"></i></button></li>
                                <li><button><i class="ti-shopping-cart"></i></button></li>
                                <li><button><i class="ti-heart"></i></button></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p><?= $tr['nama_kategori']; ?></p>
                            <?php 
                                    // Tentukan controller berdasarkan peran
                                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                            <h4 class="card-product__title"><a
                                    href="<?= base_url($controller . '/detail/' . urlencode($tr['id_produk'])) ?>"><?= $tr['nama_produk']; ?></a>
                            </h4>
                            <p class="card-product__price">
                                <?php if ($tr['diskon_produk'] > 0 ) { ?>
                                <span class="text-danger">
                                    Rp.<?= number_format($tr['harga_diskon'], 0, ',', '.'); ?>
                                </span> |
                                <span class="text-muted text-decoration-line-through small">
                                    <s>
                                        <?= number_format($tr['harga_produk'], 0, ',', '.'); ?>
                                    </s>
                                </span>
                                <?php } else { ?>
                                <span>
                                    Rp.<?= number_format($tr['harga_produk'], 0, ',', '.'); ?>
                                </span>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <h2>Produk <span class="section-intro__style">Terbaru</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <?php foreach ($terbaru as $tb) : ?>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <?php if ($tb['diskon_produk'] > 0 ) { ?>
                        <div class="discount-badge">
                            <?= $tb['diskon_produk'] ?>%
                        </div>
                        <?php } ?>
                        <?php if (!$tb['image']) { ?>
                        <img class="card-img mx-auto" src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                            href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                            style="height: 200px; width: 200px;">
                        <?php } else { ?>
                        <img class="card-img mx-auto" src="<?= base_url('./assets/upload/produk/') . $tb['image']; ?>"
                            href="<?= base_url('./assets/upload/produk/') ?><?= $tb['image']; ?>" alt=""
                            style="height: 200px; width: 200px;">
                        <?php } ?>
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p><?= $tb['nama_kategori']; ?></p>
                        <?php 
                                    // Tentukan controller berdasarkan peran
                                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                        <h4 class="card-product__title"><a
                                href="<?= base_url($controller . '/detail/' . urlencode($tb['id_produk'])) ?>"><?= $tb['nama_produk']; ?></a>
                        </h4>
                        <p class="card-product__price">
                            <?php if ($tb['diskon_produk'] > 0 ) { ?>
                            <span class="text-danger">
                                Rp.<?= number_format($tb['harga_diskon'], 0, ',', '.'); ?>
                            </span> |
                            <span class="text-muted text-decoration-line-through small">
                                <s>
                                    <?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
                                </s>
                            </span>
                            <?php } else { ?>
                            <span>
                                Rp.<?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
                            </span>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->

    <!-- Best Rating -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Produk yang memiliki Diskon</p>
                <h2>Produk <span class="section-intro__style">Diskon</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestRatingCarousel">
                <?php foreach ($diskon as $dk) : ?>
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <?php if ($dk['diskon_produk'] > 0 ) { ?>
                        <span class="badge badge-danger discount-badge">
                            <?= $dk['diskon_produk'] ?>%
                        </span>
                        <?php } ?>
                        <?php if (!$dk['image']) { ?>
                        <img class="card-img mx-auto" src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                            href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                            style="height: 200px; width: 200px;">
                        <?php } else { ?>
                        <img class="card-img  mx-auto" src="<?= base_url('./assets/upload/produk/') . $dk['image']; ?>"
                            href="<?= base_url('./assets/upload/produk/') ?><?= $dk['image']; ?>" alt=""
                            style="height: 200px; width: 200px;">
                        <?php } ?>
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p><?= $dk['nama_kategori']; ?></p>
                        <?php 
                                    // Tentukan controller berdasarkan peran
                                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                        <h4 class="card-product__title"><a
                                href="<?= base_url($controller . '/detail/' . urlencode($tb['id_produk'])) ?>"><?= $tb['nama_produk']; ?></a>
                        </h4>
                        <p class="card-product__price">
                            <?php if ($dk['diskon_produk'] > 0 ) { ?>
                            <span class="text-danger">
                                Rp.<?= number_format($dk['harga_diskon'], 0, ',', '.'); ?>
                            </span> |
                            <span class="text-muted text-decoration-line-through small">
                                <s>
                                    <?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
                                </s>
                            </span>
                            <?php } else { ?>
                            <span>
                                Rp.<?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
                            </span>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>