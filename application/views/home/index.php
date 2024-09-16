<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-center">
                    <h1 class="m-0 text-center">HOME</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <!-- Section 1 -->
        <div class="container">
            <!-- Carousel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo1.png" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Produk Terbaru</h5>
                            <p>Temukan produk-produk terbaik di sini.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo2.png" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Promo Spesial</h5>
                            <p>Dapatkan diskon menarik hanya di bulan ini!</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url(); ?>/assets/dist/img/photo3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Produk Unggulan</h5>
                            <p>Produk pilihan terbaik untuk Anda.</p>
                        </div>
                        </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
            <!-- end carousel -->
        </div>
        <!-- end Section 1 -->
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

    <!-- Kategori Produk -->
    <div class="container mt-5">
        <h2 class="text-center">Kategori Produk</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Kategori 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori 1</h5>
                        <a href="#" class="btn btn-primary">Lihat Kategori</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Kategori 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori 2</h5>
                        <a href="#" class="btn btn-primary">Lihat Kategori</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Kategori 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori 3</h5>
                        <a href="#" class="btn btn-primary">Lihat Kategori</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Kategori 4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori 4</h5>
                        <a href="#" class="btn btn-primary">Lihat Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Kategori -->

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