<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
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
                        <ul class="nav flex-column text-center">
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
                <div class="card p-2">
                    <div class="row">
                        <?php foreach ($produk as $p): ?>
                        <div class="col-md-3 product-item">
                            <div class="card">
                                <img src="<?= base_url('./assets/upload/produk/') . $p['image']; ?>"
                                    class="card-img-top product-img" alt="Product 1">
                                <div class="card-body">
                                    <h5 class="card-title product-title"><?= $p['nama_produk'] ?></h5>
                                    <p class="card-text">Rp.<?= $p['harga_produk'] ?></p>
                                    <a href="#" class="btn btn-primary btn-sm">View Product</a>
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