<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="col text-center">
                        <h1 class="text-center">HOME</h1>
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
        </div>
    </div>

    <!-- Section 1 Carousel -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="card-body">
                            <!-- Carousel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 rounded"
                                            src="<?= base_url(); ?>/assets/dist/img/home1.jpg" style="height: 400px;"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 rounded"
                                            src="<?= base_url(); ?>/assets/dist/img/home2.jpg" style="height: 400px;"
                                            alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100 rounded"
                                            src="<?= base_url(); ?>/assets/dist/img/home3.jpg" style="height: 400px;"
                                            alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- end carousel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2 Jenis Produk -->
    <section class="content mt-4">
        <div class="container">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h2>Jenis Produk</h2>
                </div>
                <div class="card-body">
                    <?php 
                    // Tentukan controller berdasarkan peran
                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                    ?>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-sm" href="<?= base_url($controller . '/getJenisProduk/Barang') ?>">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h4>BARANG</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p>
                                            Jenis Produk yang berupa jasa yang ditawarkan oleh Alumni seperti
                                            Jasa
                                            pembuatan aplikasi Website, Android, Desain Grafis serta jenis Jasa lainnya
                                            yang ditawarkan oleh Alumni.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a class="btn btn-sm" href="<?= base_url($controller . '/getJenisProduk/Barang') ?>">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h4>JASA</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p>
                                            Jenis Produk yang berupa barang fisik yang dijual oleh Alumni seperti
                                            Hardware dan Software PC, Laptop dan Notebook, Smartphone dan HP serta jenis
                                            Barang lainnya
                                            yang dijual oleh Alumni.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Kategori -->
    <section class="content mt-4">
        <div class="container">
            <div class="card" style="height: 350px;">
                <div class="card-header text-center bg-primary">
                    <h2>Kategori Produk</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id="kategori-produk" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php foreach (array_chunk($kategori, 4) as $index => $kat_group): ?>
                                    <li data-target="#kategori-produk" data-slide-to="<?= $index; ?>"
                                        class="<?= $index == 0 ? 'active' : ''; ?>"></li>
                                    <?php endforeach; ?>
                                </ol>

                                <!-- Carousel Items -->
                                <div class="carousel-inner">
                                    <?php foreach (array_chunk($kategori, 4) as $index => $kat_group): ?>
                                    <div class="carousel-item <?= $index == 0 ? 'active' : ''; ?>">
                                        <div class="row">
                                            <?php 
                                                // Tentukan controller berdasarkan peran
                                                $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                            ?>
                                            <?php foreach ($kat_group as $kat): ?>
                                            <div class="col-md-3">
                                                <div class="card h-100">
                                                    <div class="card-header bg-info text-center">
                                                        <a class="h5"
                                                            href="<?= base_url($controller . '/getKategoriProduk/' . urlencode($kat['id_kategori'])) ?>"><?= $kat['nama_kategori'] ?></a>
                                                    </div>
                                                    <div class="card-body d-flex flex-column">
                                                        <p class="text-justify">
                                                            <?php
                                                                    // Memotong keterangan jika terlalu panjang
                                                                    $max_length = 150;
                                                                    echo strlen($kat['keterangan_kategori']) > $max_length ?
                                                                        substr($kat['keterangan_kategori'], 0, $max_length) . '... <a href="#">Selengkapnya</a>' :
                                                                        $kat['keterangan_kategori'];
                                                                ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#kategori-produk" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#kategori-produk" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Kategori -->



    <!-- Produk Unggulan -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center bg-success">
                <h2 class="text-center">Produk Terbaru</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php foreach ($terbaru as $tb) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1 card-outline card-success">
                            <div class="card-body p-1">
                                <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $tb['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$tb['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $tb['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $tb['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } ?>
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($tb['nama_produk'], 2); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?= word_limiter($tb['nama_kategori'], 2); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp.<?= number_format($tb['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp.<?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <i class="fas fa-star fa-sm" style="color: orange;">
                                            <?= $tb['rating_produk'] ?></i>
                                    </div>
                                    <div class="col text-center">
                                        | <?= $tb['stok_produk'] ?> |
                                    </div>
                                    <div class="col text-right">
                                        <?= $tb['jenis_produk'] ?>
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
                                            href="<?= base_url() ?>User/Detail/<?= $tb['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } else { ?>
                                        <a class="btn btn-success btn-sm btn-block"
                                            href="<?= base_url() ?>Home/Detail/<?= $tb['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-2">
                    <div class="col text-right">
                        <a href="#" class="h1 btn-sm">List Produk Terbaru . . .</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

    <!-- Produk Diskon -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center bg-danger">
                <h2 class="text-center">Produk Diskon</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php foreach ($diskon as $dk) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1 card-outline card-success">
                            <div class="card-body p-1">
                                <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $dk['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$dk['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $dk['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $dk['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } ?>
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($dk['nama_produk'], 2); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?= word_limiter($dk['nama_kategori'], 2); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp.<?= number_format($dk['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp.<?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <i class="fas fa-star fa-sm" style="color: orange;">
                                            <?= $dk['rating_produk'] ?></i>
                                    </div>
                                    <div class="col text-center">
                                        | <?= $dk['stok_produk'] ?> |
                                    </div>
                                    <div class="col text-right">
                                        <?= $dk['jenis_produk'] ?>
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
                                            href="<?= base_url() ?>User/Detail/<?= $dk['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } else { ?>
                                        <a class="btn btn-success btn-sm btn-block"
                                            href="<?= base_url() ?>Home/Detail/<?= $dk['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-2">
                    <div class="col text-right">
                        <a href="#" class="h1 btn-sm">List Produk Diskon . . .</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

    <!-- Produk Teratas -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center bg-warning">
                <h2 class="text-center">Produk Teratas</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php foreach ($teratas as $tr) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1 card-outline card-success">
                            <div class="card-body p-1">
                                <?php if ($tr['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $tr['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$tr['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $tr['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $tr['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } ?>
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($tr['nama_produk'], 2); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?= word_limiter($tr['nama_kategori'], 2); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($tr['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp.<?= number_format($tr['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($tr['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp.<?= number_format($tr['harga_produk'], 0, ',', '.'); ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <i class="fas fa-star fa-sm" style="color: orange;">
                                            <?= $tr['rating_produk'] ?></i>
                                    </div>
                                    <div class="col text-center">
                                        | <?= $tr['stok_produk'] ?> |
                                    </div>
                                    <div class="col text-right">
                                        <?= $tr['jenis_produk'] ?>
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
                                            href="<?= base_url() ?>User/Detail/<?= $tr['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } else { ?>
                                        <a class="btn btn-success btn-sm btn-block"
                                            href="<?= base_url() ?>Home/Detail/<?= $tr['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-2">
                    <div class="col text-right">
                        <a href="#" class="h1 btn-sm">List Produk Teratas . . .</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

    <?php if ($this->session->userdata('role') == 'User') { ?>
    <!-- Produk Baru dibeli -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center bg-secondary">
                <h2 class="text-center">Produk Baru Dibeli</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php if(!$barudibeli) { ?>
                    <div class="col col-6 text-center mx-auto">
                        <div class="card">
                            <h5>Belum Ada Produk yang dibeli!</h5>
                        </div>
                    </div>
                    <?php } ?>
                    <?php foreach ($barudibeli as $db) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1 card-outline card-success">
                            <div class="card-body p-1">
                                <?php if ($db['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $db['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <?php if (!$db['image']) { ?>
                                <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } else { ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $db['image']; ?>"
                                    href="<?= base_url('./assets/upload/produk/') ?><?= $db['image']; ?>"
                                    class="img-fluid rounded" data-toggle="lightbox"
                                    style="width: 300px; height: 130px;">
                                <?php } ?>
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($db['nama_produk'], 2); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($db['nama_kategori'], 2); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($db['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp.<?= number_format($db['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($db['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp.<?= number_format($db['harga_produk'], 0, ',', '.'); ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <i class="fas fa-star fa-sm" style="color: orange;">
                                            <?= $db['rating_produk'] ?></i>
                                    </div>
                                    <div class="col text-center">
                                        | <?= $db['stok_produk'] ?> |
                                    </div>
                                    <div class="col text-right">
                                        <?= $db['jenis_produk'] ?>
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
                                            href="<?= base_url() ?>User/Detail/<?= $db['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } else { ?>
                                        <a class="btn btn-success btn-sm btn-block"
                                            href="<?= base_url() ?>Home/Detail/<?= $db['id_produk'] ?>">Detail
                                            Produk</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-2">
                    <div class="col text-right">
                        <a href="#" class="h1 btn-sm">List Produk Baru Dibeli . . .</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Baru Dibeli -->
    <?php } ?>

    <!-- Promo Spesial -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-success">
                <h2 class="text-center">Promo Spesial</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title">Diskon 50% untuk Produk Tertentu</h5>
                                <p class="card-text">Dapatkan diskon besar-besaran untuk produk pilihan selama bulan
                                    ini.
                                </p>
                                <a href="#" class="btn btn-dark">Belanja Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-info">
                            <div class="card-body text-center">
                                <h5 class="card-title">Beli 2 Gratis 1</h5>
                                <p class="card-text">Promo spesial beli 2 produk dapat 1 produk gratis. Hanya hari ini!
                                </p>
                                <a href="#" class="btn btn-dark">Dapatkan Promo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Review Pelanggan -->
    <div class="container mt-4 py-1">
        <div class="card">
            <div class="card-header bg-primary">
                <h2 class="text-center">Review User</h2>
            </div>
            <div class="card-body">
                <div id="carouselTestimoni" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if(!$reviews) { ?>
                        <div class="col col-6 text-center mx-auto">
                            <div class="card">
                                <h5>Belum Ada Review yang dapat ditampilkan!</h5>
                            </div>
                        </div>
                        <?php } ?>
                        <?php 
                    $active = true; 
                    $counter = 0; 
                    foreach ($reviews as $review) : 
                        if ($counter % 3 == 0): // Setiap tiga item baru, buat carousel-item baru
                    ?>
                        <div class="carousel-item <?php if ($active) { echo 'active'; $active = false; } ?>">
                            <div class="row justify-content-center">
                                <?php endif; ?>

                                <div class="col-md-4">
                                    <div class="card card-success card-outline">
                                        <div class="card-body text-center">
                                            <!-- Isi Testimoni -->
                                            <div class="row">
                                                <div class="col">
                                                    <?php if ($this->session->userdata('role') == 'User') { ?>
                                                    <a class="btn btn-success btn-sm btn-block"
                                                        href="<?= base_url() ?>User/Detail/<?= $review['id_produk'] ?>"><?= $review['nama_produk'] ?></a>
                                                    <?php } else { ?>
                                                    <a class="btn btn-success btn-sm btn-block"
                                                        href="<?= base_url() ?>Home/Detail/<?= $review['id_produk'] ?>"><?= $review['nama_produk'] ?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <p style="font-size: 1.1rem;">
                                                "<?= $review['isi_review']; ?>"<br>
                                                <i class="fas fa-star fa-sm" style="color: orange;">
                                                    <?= $review['rating_review'] ?></i>
                                            </p>
                                            <h6 class="font-weight-bold">
                                                ~ <?= $review['nama_user']; ?></h6>
                                            <!-- Nama Pelanggan -->
                                        </div>
                                    </div>
                                </div>

                                <?php 
                        $counter++;
                        if ($counter % 3 == 0): // Menutup div carousel-item setelah tiga testimonial
                    ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Jika jumlah item tidak kelipatan 3, tutup carousel-item terakhir -->
                        <?php if ($counter % 3 != 0): ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#carouselTestimoni" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselTestimoni" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Review -->
</div>
</div>
<!-- End Content Wrapper -->