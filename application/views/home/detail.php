<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="m-0 text-center">Detail Produk</h1>
                    <?= $this->session->flashdata('message'); ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Produk Unggulan -->
    <div class="container">
        <div class="card">
            <div class="row m-1">
                <div class="col-lg-5">
                    <div class="card">
                        <?php if ($produk['diskon_produk'] > 0 ) { ?>
                        <span class="discount-badge position-absolute">
                            <?= $produk['diskon_produk'] ?>%
                        </span>
                        <?php } ?>
                        <img src="<?= base_url('./assets/upload/produk/') . $produk['image']; ?>"
                            class="img-fluid rounded" alt="Gambar Kosong">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col">
                            <h2><?= $produk['nama_produk'] ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-2">
                            <h5>Harga</h5>
                        </div>
                        <div class="col col-10">
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
                        <div class="col col-2">
                            <h5>Rating</h5>
                        </div>
                        <div class="col col-4">
                            : <i class="fas fa-star fa-md" style="color: orange;">
                                <?= $produk['rating_produk'] ?></i>
                        </div>
                        <div class="col col-2">
                            <h5>Stok</h5>
                        </div>
                        <div class="col col-4">
                            : <?= $produk['stok_produk'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="<?= base_url('User/detail/'.$produk['id_produk']); ?>" method="post">
                                <?php if ($produk['diskon_produk'] > 0 ) { ?>
                                <input type="text" name="harga_pesanan" value="<?= $produk['harga_diskon'] ?>">
                                <?php } else { ?>
                                <input type="text" name="harga_pesanan" value="<?= $produk['harga_produk'] ?>">
                                <?php } ?>
                                <input type="text" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                <input type="text" name="id_alumni" value="<?= $produk['id_alumni'] ?>">
                                <input type="text" name="id_user" value="<?= $user['id_user'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pembayaran">Metode Pembayaran</label>
                                            <div class="input-group mb-3">
                                                <select type="text" class="form-control" id="pembayaran"
                                                    name="pembayaran">
                                                    <option value="Transfer Bank">Transfer Bank</option>
                                                    <option value="COD">COD</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-money-check"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?= form_error('pembayaran', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jml_pesanan">Jumlah Pesanan</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" placeholder="Jumlah Pesanan"
                                                    id="jml_pesanan" name="jml_pesanan">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-boxes"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?= form_error('jml_pesanan', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-danger"> Beli </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0 text-center">
                            <ul class="nav nav-tabs justify-content-center" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                        href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                        aria-selected="true">Keterangan Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-four-profile" role="tab"
                                        aria-controls="custom-tabs-four-profile" aria-selected="false">Keterangan
                                        Toko</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body text-justify">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="row">
                                        <div class="col col-lg-6">
                                            <div class="row">
                                                <div class="col col-2">
                                                    <h5>Kategori</h5>
                                                </div>
                                                <div class="col col-10">
                                                    <h5>: <?= $produk['nama_kategori'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-2">
                                                    <h5>Jenis</h5>
                                                </div>
                                                <div class="col col-10">
                                                    <h5>: <?= $produk['jenis_produk'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-6">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Keterangan :</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5><?= $produk['keterangan_produk'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-profile-tab">
                                    <div class="row">
                                        <div class="col col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <h3>Alumi</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-2">
                                                            <h5>Nama</h5>
                                                        </div>
                                                        <div class="col col-10">
                                                            <h5>: <?= $produk['nama'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-2">
                                                            <h5>Email</h5>
                                                        </div>
                                                        <div class="col col-10">
                                                            <h5>: <?= $produk['email'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-2">
                                                            <h5>No Telp</h5>
                                                        </div>
                                                        <div class="col col-10">
                                                            <h5>: <?= $produk['no_telp'] ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col text-center">
                                                            <h3>Toko</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Nama Toko :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5><?= $produk['nama_toko'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Alamat Toko :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5><?= $produk['alamat_toko'] ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Keterangan Toko :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5><?= $produk['keterangan_toko'] ?></h5>
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