<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col text-center">
                    <h1 class="m-0 text-center">HOME</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1 Carousel -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="col--4 mx-auto">
                        <div class="card-body">
                            <!-- Carousel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                                style="heigth: 100px;">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo1.png"
                                            alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Produk Terbaru</h5>
                                            <p>Temukan produk-produk terbaik di sini.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo2.png"
                                            alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Promo Spesial</h5>
                                            <p>Dapatkan diskon menarik hanya di bulan ini!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo3.jpg"
                                            alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Produk Unggulan</h5>
                                            <p>Produk pilihan terbaik untuk Anda.</p>
                                        </div>
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
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm" href="#">
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
                        <a class="btn btn-sm" href="#">
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
                                            <?php foreach ($kat_group as $kat): ?>
                                            <div class="col-md-3 mb-4">
                                                <div class="card h-100">
                                                    <div class="card-header bg-info text-center">
                                                        <a class="h5" href=""><?= $kat['nama_kategori'] ?></a>
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
        <h2 class="text-center">Produk Unggulan</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 1</h5>
                        <p class="card-text">Deskripsi singkat produk 1.</p>
                        <a href="#" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk 2">
                    <div class="card-body">
                        <h5 class="card-title">Produk 2</h5>
                        <p class="card-text">Deskripsi singkat produk 2.</p>
                        <a href="#" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk 3</h5>
                        <p class="card-text">Deskripsi singkat produk 3.</p>
                        <a href="#" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Produk Unggulan -->

    <!-- Produk Terlaris -->
    <div class="container mt-5">
        <h2 class="text-center">Produk Terlaris</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk Terlaris 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk Terlaris 1</h5>
                        <p class="card-text">Deskripsi singkat produk terlaris 1.</p>
                        <a href="#" class="btn btn-success">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk Terlaris 2">
                    <div class="card-body">
                        <h5 class="card-title">Produk Terlaris 2</h5>
                        <p class="card-text">Deskripsi singkat produk terlaris 2.</p>
                        <a href="#" class="btn btn-success">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk Terlaris 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk Terlaris 3</h5>
                        <p class="card-text">Deskripsi singkat produk terlaris 3.</p>
                        <a href="#" class="btn btn-success">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Prodk Terlaris -->

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