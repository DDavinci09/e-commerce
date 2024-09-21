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
    <section class="content mt-5">
        <div class="container">
            <div class="card">
                <div class="row text-center">
                    <div class="col">
                        <div class="card">
                            <h1>Jenis Produk</h1>
                        </div>
                    </div>
                </div>
                <?php 
                    // Tentukan controller berdasarkan peran
                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                ?>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm" href="<?= base_url($controller . '/getJenisProduk/Barang') ?>">
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <h3>BARANG</h3>
                                </div>
                                <div class="card-body text-justify">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis similique tenetur
                                        expedita
                                        dolores repellat voluptates rerum voluptatum dicta maiores adipisci, totam nam
                                        inventore
                                        repellendus architecto tempora reiciendis voluptas omnis. Fugiat.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-sm" href="<?= base_url($controller . '/getJenisProduk/Barang') ?>">
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h3>JASA</h3>
                                </div>
                                <div class="card-body text-justify">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis similique tenetur
                                        expedita
                                        dolores repellat voluptates rerum voluptatum dicta maiores adipisci, totam nam
                                        inventore
                                        repellendus architecto tempora reiciendis voluptas omnis. Fugiat.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section 2 Kategori -->
    <section class="content mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Kategori Produk</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div id="kategori-produk" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php foreach (array_chunk($kategori, 4) as $index => $kat_group): ?>
                                    <li data-target="#kategori-produk" data-slide-to="<?= $index; ?>"
                                        class="<?= $index == 0 ? 'active' : ''; ?>">
                                    </li>
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
                                            <div class="col-md-3 mb-3">
                                                <div class="card h-130">
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
                                <div class="carousel-control">
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
        </div>
    </section>



    <!-- Produk Unggulan -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="text-center">Produk Terbaru</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php foreach ($terbaru as $tb) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1">
                            <div class="card-body p-1">
                                <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $tb['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $tb['image']; ?>"
                                    class="img-fluid rounded" alt="Gambar Kosong">
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($tb['nama_produk'], 3); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($tb['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp. <?= number_format($tb['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp. <?= number_format($tb['harga_produk'], 0, ',', '.'); ?>
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
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="text-center">Produk Promo Diskon</h2>
            </div>
            <div class="card-cody">
                <div class="row m-1">
                    <?php foreach ($diskon as $dk) : ?>
                    <div class="col-md-2 p-0">
                        <div class="card m-1">
                            <div class="card-body p-1">
                                <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                <span class="discount-badge position-absolute">
                                    <?= $dk['diskon_produk'] ?>%
                                </span>
                                <?php } ?>
                                <img src="<?= base_url('./assets/upload/produk/') . $dk['image']; ?>"
                                    class="img-fluid rounded" alt="Gambar Kosong">
                                <div class="row">
                                    <div class="col text-left">
                                        <b><?= word_limiter($dk['nama_produk'], 3); ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <?php if ($dk['diskon_produk'] > 0 ) { ?>
                                        <span class="text-danger">
                                            Rp. <?= number_format($dk['harga_diskon'], 0, ',', '.'); ?>
                                        </span> |
                                        <span class="text-muted text-decoration-line-through">
                                            <s>
                                                <?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
                                            </s>
                                        </span>
                                        <?php } else { ?>
                                        <span>
                                            Rp. <?= number_format($dk['harga_produk'], 0, ',', '.'); ?>
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
                        <a href="#" class="h1 btn-sm">List Produk Promo Diskon . . .</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

    <!-- Promo Spesial -->
    <div class="container mt-5">
        <h2 class="text-center">Promo Spesial</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-warning">
                    <div class="card-body text-center">
                        <h5 class="card-title">Diskon 50% untuk Produk Tertentu</h5>
                        <p class="card-text">Dapatkan diskon besar-besaran untuk produk pilihan selama bulan ini.</p>
                        <a href="#" class="btn btn-dark">Belanja Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-info">
                    <div class="card-body text-center">
                        <h5 class="card-title">Beli 2 Gratis 1</h5>
                        <p class="card-text">Promo spesial beli 2 produk dapat 1 produk gratis. Hanya hari ini!</p>
                        <a href="#" class="btn btn-dark">Dapatkan Promo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Review Pelanggan -->
    <div class="container mt-5">
        <h2 class="text-center">Testimoni Pelanggan</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p>"Produk ini sangat bagus dan berkualitas tinggi!"</p>
                        <h5>- Pelanggan 1</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p>"Layanan pelanggan yang sangat baik dan pengiriman cepat."</p>
                        <h5>- Pelanggan 2</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p>"Saya sangat puas dengan produk ini. Saya akan kembali membeli."</p>
                        <h5>- Pelanggan 3</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Review -->
</div>
<!-- End Content Wrapper -->