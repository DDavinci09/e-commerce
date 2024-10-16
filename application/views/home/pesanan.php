<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Pesanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($pesanan as $ps): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <?php if (!$ps['image']) { ?>
                                        <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                            href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                            class="img-fluid rounded" style="width: 100px; height: 100px;">
                                        <?php } else { ?>
                                        <img src="<?= base_url('./assets/upload/produk/') . $ps['image']; ?>"
                                            href="<?= base_url('./assets/upload/produk/') ?><?= $ps['image']; ?>"
                                            class="img-fluid rounded" style="width: 100px; height: 100px;">
                                        <?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <h4><?= $ps['nama_produk'] ?></h4>
                                        <p><?= $ps['nama_kategori'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 15px; vertical-align: middle;">
                                <div class="row">
                                    <div class="col-4 col-sm-3 font-weight-bold">
                                        Jumlah
                                    </div>
                                    <div class="col-8 col-sm-9">
                                        : <?= $ps['jml_pesanan'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-sm-3 font-weight-bold">
                                        Harga
                                    </div>
                                    <div class="col-8 col-sm-9">
                                        : Rp.<?= number_format($ps['harga_pesanan'], 0, ',', '.'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-sm-3 font-weight-bold">
                                        Total
                                    </div>
                                    <div class="col-8 col-sm-9">
                                        : Rp.<?= number_format($ps['total_pembayaran'], 0, ',', '.'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 col-sm-3 font-weight-bold">
                                        Bukti
                                    </div>
                                    <div class="col-8 col-sm-9">
                                        : <?php if(!$ps['bukti_bayar']) { ?>
                                        <a class="btn btn-sm btn-info text-light" data-toggle="modal"
                                            data-target="#upload-bukti<?= $ps['id_pesanan'] ?>">
                                            <i class="fas fa-upload"></i> Upload
                                        </a>
                                        <?php } else { ?>
                                        <a class="btn btn-sm btn-success"
                                            href="<?= base_url('./assets/upload/bukti/') . $ps['bukti_bayar'] ?>"
                                            target="_blank">
                                            <i class="fas fa-sticky-note"></i> Bukti
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="row">
                                    <div class="col">
                                        <a
                                            class="btn btn-sm  text-light <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>">
                                            <i
                                                class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                            <?= $ps['status_bayar'] ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <a
                                            class="btn btn-sm  text-light <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : 'btn-warning') ?>">
                                            <i
                                                class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : 'fa-times-circle') ?>"></i>
                                            <?= $ps['status_pesanan'] ?>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <?php if($ps['status_pesanan'] !== 'Selesai' ) { ?>
                                        <a class="btn btn-sm btn-info  text-light" data-toggle="modal"
                                            data-target="#edit-pesanan<?= $ps['id_pesanan'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger  text-light"
                                            onclick="deleteConfirmation('<?= base_url(); ?>User/hapusPesanan/<?= $ps['id_pesanan']; ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php } else { ?>
                                        <a class="btn btn-sm btn-secondary  text-light"
                                            href="<?= base_url() ?>User/Detail/<?= $ps['id_produk'] ?>">
                                            <i class="fas fa-sticky-note"></i> Review
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<?php foreach ($pesanan as $ps): ?>
<!-- Modal Upload Bukti Bayar -->
<div class="modal fade" id="upload-bukti<?= $ps['id_pesanan'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-info">
                <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('User/uploadBuktiBayar'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                                <div class="form-group">
                                    <label for="no_rekening">No Rekening :</label>
                                    <p>
                                        <b>
                                            123-345-567-789 (BRI) <br>
                                            987-765-543-321 (BCA)
                                        </b>
                                    </p>
                                    <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit Pesanan -->
<div class="modal fade" id="edit-pesanan<?= $ps['id_pesanan'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-warning">
                <h4 class="modal-title">Edit Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('User/editPesanan'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="harga_pesanan" value="<?= $ps['harga_pesanan'] ?>">
                            <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                            <input type="hidden" name="id_produk" value="<?= $ps['id_produk'] ?>">
                            <label for="stok_produk">Stok Produk</label>
                            <input class="form-control" name="stok_produk" id="stok_produk" type="text"
                                value="<?= $ps['stok_produk'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="pembayaran">Metode Pembayaran</label>
                                <div class="input-group">
                                    <select type="text" class="form-control" id="pembayaran" name="pembayaran">
                                        <option value="">~ Pilih Metode Pembayaran ~</option>
                                        <option value="Transfer Bank"
                                            <?= $ps['pembayaran'] == 'Transfer Bank' ? 'selected' : ''; ?>>Transfer Bank
                                        </option>
                                        <option value="COD" <?= $ps['pembayaran'] == 'COD' ? 'selected' : ''; ?>>COD
                                        </option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-money-check"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('pembayaran', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jml_pesanan">Jumlah Pesanan</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Jumlah Pesanan"
                                        id="jml_pesanan" name="jml_pesanan" value="<?= $ps['jml_pesanan'] ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-boxes"></span>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('jml_pesanan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach; ?>