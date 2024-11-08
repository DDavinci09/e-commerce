<!--================Single Product Area =================-->
<div class="section">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Detail Produk</h3>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('message')): ?>
                <div class="row">
                    <div class="col text-center">
                        <h5 style="color: red;"><?= $this->session->flashdata('message'); ?></h5>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <?php if ($produk['diskon_produk'] > 0) { ?>
                            <span class="discount-badge position-absolute">
                                <?= $produk['diskon_produk'] ?>%
                            </span>
                            <?php } ?>
                            <?php if (!$produk['image']) { ?>
                            <img class="img-fluid rounded mx-auto"
                                src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                style="hight: 500px; width: 500px;">
                            <?php } else { ?>
                            <img class="img-fluid rounded  mx-auto"
                                src="<?= base_url('./assets/upload/produk/') . $produk['image']; ?>"
                                href="<?= base_url('./assets/upload/produk/') ?><?= $produk['image']; ?>"
                                style="hight: 500px; width: 500px;">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col">
                                <h2><?= $produk['nama_produk'] ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <h5>Kategori</h5>
                            </div>
                            <div class="col-10">
                                <h5>: <?= $produk['nama_kategori'] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <h5>Berat</h5>
                            </div>
                            <div class="col-10">
                                <h5>: <?= $produk['berat_produk'] ?> Gram</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <h5>Harga</h5>
                            </div>
                            <div class="col-10">
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
                        <div class="row">
                            <div class="col-2">
                                <h5>Stok</h5>
                            </div>
                            <div class="col-10">
                                <h5>: <?= $produk['stok_produk'] ?></h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <form action="<?= base_url('User/detail/' . $produk['id_produk']); ?>" method="post">
                                    <?php if ($produk['diskon_produk'] > 0) { ?>
                                    <input type="hidden" name="harga_pesanan" value="<?= $produk['harga_diskon'] ?>">
                                    <?php } else { ?>
                                    <input type="hidden" name="harga_pesanan" value="<?= $produk['harga_produk'] ?>">
                                    <?php } ?>
                                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                    <input type="hidden" name="id_alumni" value="<?= $produk['id_alumni'] ?>">
                                    <?php if (empty($this->session->userdata('role') !== 'User')) { ?>
                                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                    <?php } ?>

                                    <div class="row">
                                        <!-- Metode Pembayaran -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pembayaran" style="margin: 0;">Metode Pembayaran</label>
                                                <select class="form-control" id="pembayaran" name="pembayaran"
                                                    value="<?= set_value('pembayaran'); ?>">
                                                    <option selected>Pilih disini:</option>
                                                    <option value="Transfer Bank">Transfer Bank</option>
                                                    <option value="COD">COD</option>
                                                </select>
                                                <?= form_error('pembayaran', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <!-- Jumlah Pesanan -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jml_pesanan" style="margin: 0;">Jumlah Pesanan</label>
                                                <input type="number" class="form-control" placeholder="0"
                                                    id="jml_pesanan" name="jml_pesanan"
                                                    value="<?= set_value('jml_pesanan'); ?>">
                                                <?= form_error('jml_pesanan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Berat Produk dan Kota Asal -->
                                    <input type="hidden" name="berat_pesanan" value="<?= $produk['berat_produk'] ?>">
                                    <input type="hidden" name="origin" id="origin" value="<?= $produk['id_kota'] ?>">
                                    <input type="hidden" name="nama_kotaAsal" id="nama_kotaAsal"
                                        value="<?= $produk['nama_kota'] ?>">

                                    <div class="row">
                                        <div class="col">
                                            <!-- Provinsi Tujuan -->
                                            <div class="form-group">
                                                <label for="destinationProvince">Provinsi Tujuan:</label>
                                                <select class="form-control" id="destinationProvince"
                                                    name="destinationProvince" required>
                                                    <option value="">-- Pilih Provinsi Tujuan --</option>
                                                    <!-- Options provinsi tujuan akan diisi dengan JavaScript -->
                                                </select>
                                                <input type="hidden" id="namaProvinsiTujuan" name="nama_provinsiTujuan">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Kota Tujuan -->
                                            <div class="form-group">
                                                <label for="destination">Kota Tujuan:</label>
                                                <select class="form-control" id="destination" name="destination"
                                                    required>
                                                    <option value="">-- Pilih Kota Tujuan --</option>
                                                    <!-- Options kota tujuan akan diisi dengan JavaScript -->
                                                </select>
                                                <input type="hidden" id="namaKotaTujuan" name="nama_kotaTujuan">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ekspedisi -->
                                    <div class="form-group">
                                        <label for="courier">Ekspedisi:</label>
                                        <select class="form-control" id="courier" name="courier" required>
                                            <option value="">-- Pilih Ekspedisi --</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS Indonesia</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>

                                    <!-- Tombol Beli -->
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger btnbelicustom">Beli</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                <p>
                    <?= nl2br(htmlspecialchars($produk['keterangan_produk'])); ?>
                </p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row ">
                    <div class="col col-3">
                        <h5>Nama Alumni</h5>
                    </div>
                    <div class="col col-9">
                        <h5>: <?= $produk['nama'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>Email</h5>
                    </div>
                    <div class="col col-9">
                        <h5>: <?= $produk['email'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>No Telp</h5>
                    </div>
                    <div class="col col-9">
                        <h5>: <?= $produk['no_telp'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>No Rekening</h5>
                    </div>
                    <div class="col col-9">
                        <h5>: <?= $produk['no_rekening'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>Nama Toko</h5>
                    </div>
                    <div class="col">
                        <h5>: <?= $produk['nama_toko'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>Alamat Toko</h5>
                    </div>
                    <div class="col">
                        <h5>: <?= $produk['alamat_toko'] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-3">
                        <h5>Keterangan Toko</h5>
                    </div>
                    <div class="col">
                        <h5>: <?= $produk['keterangan_toko'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row total_rate">
                            <div class="col">
                                <div class="box_total">
                                    <h5>Overall Rating</h5>
                                    <h4>
                                        <?php
                                        // Tampilkan bintang untuk rating produk
                                        $overallRating = $produk['rating_produk'];
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $overallRating) {
                                                echo '<i class="fa fa-star" style="color: yellow;"></i>'; // Bintang aktif
                                            } else {
                                                echo '<i class="fa fa-star" style="color: gray;"></i>'; // Bintang tidak aktif
                                            }
                                        }
                                        ?>
                                    </h4>
                                    <h6><?= count($review) ?> Review</h6>
                                </div>
                            </div>
                        </div>

                        <div class="review_list">
                            <?php foreach ($review as $r) : ?>
                            <div class="review_item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4>
                                            <?= $r['nama_user'] ?> (<?= date("d-m-Y", strtotime($r['tgl_review'])) ?>)
                                        </h4>
                                        <!-- Menampilkan bintang berdasarkan rating -->
                                        <?php
                                            // Ambil rating
                                            $rating = $r['rating_review'];

                                            // Tampilkan bintang
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fa fa-star"></i>'; // Bintang aktif
                                                } else {
                                                    echo '<i class="fa fa-star" style="color: gray;"></i>'; // Bintang tidak aktif
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
                    <div class="col-lg-6">
                        <div class="review">
                            <?php if ($this->session->userdata('role') == 'User') { ?>
                            <?php if ($bisaReview) { ?>
                            <?php if (isset($reviewuser['id_user']) && $reviewuser['id_user'] === $user['id_user']) { ?>
                            <h5>Anda sudah memberikan ulasan untuk produk ini.</h5>
                            <?php } else { ?>
                            <h4>Tambahkan Review</h4>
                            <form action="<?= base_url('User/TambahReview'); ?>" method="post">
                                <div class="row">
                                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="rating_review">Rating Produk</label>
                                            <div class="input-group">
                                                <select name="rating_review" id="rating_review" class="form-control"
                                                    required>
                                                    <option value="" disabled selected>Pilih Rating</option>
                                                    <option value="5">5 - Sangat Puas</option>
                                                    <option value="4">4 - Puas</option>
                                                    <option value="3">3 - Cukup</option>
                                                    <option value="2">2 - Kurang Puas</option>
                                                    <option value="1">1 - Sangat Tidak Puas</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-star"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= form_error('rating_review', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="isi_review">Isi Review</label>
                                            <div class="input-group">
                                                <textarea name="isi_review" id="isi_review" class="form-control"
                                                    rows="3" required></textarea>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-sticky-note"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= form_error('isi_review', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary"> Tambah Review </button>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->