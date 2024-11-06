<!--================Cart Area =================-->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>PESANAN</h3>
            </div>
            <div class="card-body">
                <div class="cart_inner">
                    <?php if ($this->session->flashdata('message')): ?>
                    <div class="row">
                        <div class="col text-center">
                            <h5><?= $this->session->flashdata('message'); ?></h5>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Pesanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $ps): ?>
                                <tr>
                                    <!-- Produk -->
                                    <td>
                                        <a href="<?= base_url(); ?>User/detail/<?= $ps['id_produk'] ?>"
                                            style="text-decoration: none; color: inherit;">
                                            <div class="media" style="width: 350px;">
                                                <img src="<?= base_url($ps['image'] ? './assets/upload/produk/' . $ps['image'] : './assets/upload/produk/no_image.jpg') ?>"
                                                    class="img-fluid rounded"
                                                    style="width: 100px; height: 100px; margin-right: 10px;">
                                                <div class="media-body">
                                                    <h5 class="mt-0"><?= $ps['nama_produk'] ?></h5>
                                                    <small class="text-muted"><?= $ps['nama_kategori'] ?></small>
                                                </div>
                                            </div>
                                        </a>

                                    </td>

                                    <td>
                                        <ul class="list-unstyled" style="width: 250px;">
                                            <li class="d-flex">
                                                <strong class="col-5">Jumlah</strong>
                                                <span class="col">: <?= $ps['jml_pesanan'] ?></span>
                                            </li>
                                            <li class="d-flex">
                                                <strong class="col-5">Harga</strong>
                                                <span class="col">:
                                                    Rp.<?= number_format($ps['harga_pesanan'], 0, ',', '.') ?></span>
                                            </li>
                                            <li class="d-flex">
                                                <strong class="col-5">Ongkir</strong>
                                                <span class="col">:
                                                    Rp.<?= number_format($ps['ongkir'], 0, ',', '.') ?></span>
                                            </li>
                                            <li class="d-flex">
                                                <strong class="col-5">Total</strong>
                                                <span class="col">:
                                                    Rp.<?= number_format($ps['total_pembayaran'], 0, ',', '.') ?></span>
                                                </span>
                                            </li>
                                            <li class="d-flex">
                                                <strong class="col-5">Kurir</strong>
                                                <span class="col">: <?= strtoupper($ps['kurir']) ?>
                                                    (<?= $ps['estimasi'] ?> hari)</span>
                                            </li>
                                            <li class="d-flex">
                                                <?php if ($ps['pembayaran'] == "COD") { ?>
                                                <strong class="col-5">Bayar</strong>
                                                <?php } else { ?>
                                                <strong class="col-5">Bukti</strong>
                                                <?php } ?>
                                                <span class="col">:
                                                    <?php if ($ps['pembayaran'] == "COD") { ?>
                                                    COD
                                                    <?php } else { ?>
                                                    <?php if(!$ps['bukti_bayar']) { ?>
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
                                                    <?php } ?>

                                                </span>
                                            </li>
                                        </ul>
                                    </td>


                                    <!-- Status -->
                                    <td align="center">
                                        <a
                                            class="btn btn-sm text-light <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>">
                                            <i
                                                class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                            <?= $ps['status_bayar'] ?>
                                        </a>
                                        <br>
                                        <a class="btn btn-sm mt-2 text-light <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : ($ps['status_pesanan'] == 'Dibatalkan' ? 'btn-danger' : 'btn-warning')) ?>"
                                            <?php if($ps['status_pesanan'] == 'Dikirim' || $ps['status_pesanan'] == 'Dibatalkan'): ?>
                                            data-toggle="modal" data-target="#status-pesanan<?= $ps['id_pesanan'] ?>"
                                            <?php endif; ?>>
                                            <i
                                                class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : ($ps['status_pesanan'] == 'Dibatalkan' ? 'fa-times-circle' : 'fa-truck')) ?>"></i>
                                            <?= $ps['status_pesanan'] ?>
                                        </a>
                                    </td>

                                    <!-- Aksi -->
                                    <td align="center">
                                        <?php if($ps['status_pesanan'] !== 'Selesai') { ?>
                                        <a class="btn btn-sm btn-danger text-light"
                                            onclick="deleteConfirmation('<?= base_url(); ?>User/hapusPesanan/<?= $ps['id_pesanan']; ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <?php } else { ?>
                                        <a class="btn btn-sm btn-secondary text-light"
                                            href="<?= base_url() ?>User/Detail/<?= $ps['id_produk'] ?>">
                                            <i class="fas fa-sticky-note"></i> Review
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>
                </div>
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
                                    <?php foreach($rekening as $rek): ?>
                                    <div class="row">
                                        <div class="col">
                                            <b><?= $rek['no_rekening'] ?></b> (<?= $rek['nama_bank'] ?>)
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <input type="file" class="mt-2" id="bukti_bayar" name="bukti_bayar" required>
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

<!-- Modal Status Pesanan -->
<div class="modal fade" id="status-pesanan<?= $ps['id_pesanan'] ?>">
    <div class="modal-dialog dialog-center">
        <div class="modal-content">
            <div class="modal-header  bg-success">
                <h4 class="modal-title">Status Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('User/editStatusPesanan'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <?php if($ps['status_pesanan'] == "Dikirim") { ?>
                            <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                            <label for="status_bayar">Status Pesanan</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="status_pesanan" name="status_pesanan">
                                    <option value="Dikirim"
                                        <?= $ps['status_pesanan'] == 'Dikirim' ? 'selected' : ''; ?>>Dikirim
                                    </option>
                                    <option value="Selesai"
                                        <?= $ps['status_pesanan'] == 'Selesai' ? 'selected' : ''; ?>>Selesai
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-check"></span>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <label for="status_pesanan">Status Pesanan</label>
                                <div class="input-group">
                                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                        value="<?= $ps['status_pesanan'] ?>" placeholder="Masukkan nama kategori"
                                        readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-money-check"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Input keterangan pesanan, disembunyikan secara default -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan Pembatalan</label>
                                <textarea class="form-control" name="keterangan" rows="3"
                                    readonly><?= $ps['keterangan_pesanan'] ?></textarea>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if($ps['status_pesanan'] == "Dikirim") { ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php } ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach; ?>