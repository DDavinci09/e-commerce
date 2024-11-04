<main class="site-main">

    <div class="container ">
        <!-- carousel banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <?php foreach ($banner as $index => $bn) { ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= base_url('./assets/upload/banner/'); ?><?= $bn['file'] ?>" class="d-block w-100"
                        alt="...">
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- end -->



    </div>

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Produk Rating Tertinggi</p>
                <h2>Produk <span class="section-intro__style">Teratas</span></h2>
            </div>
            <div class="row">
                <?php foreach ($teratas as $tr) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card text-center card-product">
                        <div class="card-product__img" style="aspect-ratio: 1 / 1; width: 100%; overflow: hidden;">
                            <?php if ($tr['diskon_produk'] > 0 ) { ?>
                            <div class="discount-badge">
                                <?= $tr['diskon_produk'] ?>%
                            </div>
                            <?php } ?>
                            <?php if (!$tr['image']) { ?>
                            <img class="card-img mx-auto" src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <?php } else { ?>
                            <img class="card-img mx-auto"
                                src="<?= base_url('./assets/upload/produk/') . $tr['image']; ?>"
                                href="<?= base_url('./assets/upload/produk/') ?><?= $tr['image']; ?>" alt=""
                                style="width: 100%; height: 100%; object-fit: cover;">
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

    <!-- Produk Terbaru -->
    <section class="section-margin">
        <div class="container">
            <div class="section-intro pb-60px">
                <h2>Produk <span class="section-intro__style">Terbaru</span></h2>
            </div>
            <div id="carouselTerbaru" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php 
                    $isActive = true;
                    $counter = 0;
                    
                    foreach ($terbaru as $tb) :
                        // Buka carousel-item baru dan row baru setiap 4 produk
                        if ($counter % 4 == 0): ?>
                    <div class="carousel-item <?= $isActive ? 'active' : ''; ?>">
                        <div class="row">
                            <?php $isActive = false; endif; ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <div class="card text-center card-product">
                                    <div class="card-product__img"
                                        style="aspect-ratio: 1 / 1; width: 100%; overflow: hidden;">
                                        <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                        <div class="discount-badge"><?= $tb['diskon_produk'] ?>%</div>
                                        <?php } ?>
                                        <img class="card-img mx-auto"
                                            src="<?= base_url('./assets/upload/produk/') . ($tb['image'] ?: 'no_image.jpg'); ?>"
                                            alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                        <ul class="card-product__imgOverlay">
                                            <li><button><i class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p><?= $tb['nama_kategori']; ?></p>
                                        <?php 
                                        $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                                        <h4 class="card-product__title">
                                            <a
                                                href="<?= base_url($controller . '/detail/' . urlencode($tb['id_produk'])) ?>"><?= word_limiter($tb['nama_produk'], 3.5); ?></a>
                                        </h4>
                                        <p class="card-product__price">
                                            <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                            <span
                                                class="text-danger">Rp.<?= number_format($tb['harga_diskon'], 0, ',', '.'); ?></span>
                                            |
                                            <span class="text-muted text-decoration-line-through small">
                                                <s><?= number_format($tb['harga_produk'], 0, ',', '.'); ?></s>
                                            </span>
                                            <?php } else { ?>
                                            <span>Rp.<?= number_format($tb['harga_produk'], 0, ',', '.'); ?></span>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php 
                        $counter++;
                        // Tutup carousel-item dan row setelah 4 produk
                        if ($counter % 4 == 0 || $counter == count($terbaru)): ?>
                        </div>
                    </div>
                    <?php endif; 
                    endforeach; ?>
                </div>

                <!-- Carousel controls -->
                <a class="carousel-control-prev custom-carousel-control" href="#carouselTerbaru" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next custom-carousel-control" href="#carouselTerbaru" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="false"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Produk Diskon -->
    <section class="section-margin">
        <div class="container">
            <div class="section-intro pb-60px">
                <h2>Produk <span class="section-intro__style">Diskon</span></h2>
            </div>
            <div id="carouselDiskon" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php 
                    $isActive = true;
                    $counter = 0;
                    
                    foreach ($diskon as $dk) :
                        // Buka carousel-item baru dan row baru setiap 4 produk
                        if ($counter % 4 == 0): ?>
                    <div class="carousel-item <?= $isActive ? 'active' : ''; ?>">
                        <div class="row">
                            <?php $isActive = false; endif; ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <div class="card text-center card-product">
                                    <div class="card-product__img"
                                        style="aspect-ratio: 1 / 1; width: 100%; overflow: hidden;">
                                        <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                        <div class="discount-badge"><?= $dk['diskon_produk'] ?>%</div>
                                        <?php } ?>
                                        <img class="card-img mx-auto"
                                            src="<?= base_url('./assets/upload/produk/') . ($dk['image'] ?: 'no_image.jpg'); ?>"
                                            alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                        <ul class="card-product__imgOverlay">
                                            <li><button><i class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p><?= $dk['nama_kategori']; ?></p>
                                        <?php 
                                        $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                    ?>
                                        <h4 class="card-product__title">
                                            <a
                                                href="<?= base_url($controller . '/detail/' . urlencode($dk['id_produk'])) ?>"><?= word_limiter($dk['nama_produk'], 3.5); ?></a>
                                        </h4>
                                        <p class="card-product__price">
                                            <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                            <span
                                                class="text-danger">Rp.<?= number_format($dk['harga_diskon'], 0, ',', '.'); ?></span>
                                            |
                                            <span class="text-muted text-decoration-line-through small">
                                                <s><?= number_format($dk['harga_produk'], 0, ',', '.'); ?></s>
                                            </span>
                                            <?php } else { ?>
                                            <span>Rp.<?= number_format($dk['harga_produk'], 0, ',', '.'); ?></span>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php 
                        $counter++;
                        // Tutup carousel-item dan row setelah 4 produk
                        if ($counter % 4 == 0 || $counter == count($diskon)): ?>
                        </div>
                    </div>
                    <?php endif; 
                    endforeach; ?>
                </div>

                <!-- Carousel controls -->
                <a class="carousel-control-prev custom-carousel-control" href="#carouselDiskon" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next custom-carousel-control" href="#carouselDiskon" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="false"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

</main>