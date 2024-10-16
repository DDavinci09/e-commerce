<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="col text-center">
                        <h1 class="text-center">PESANAN</h1>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Produk Unggulan -->
    <div class="container py-1">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data Produk</th>
                            <th>Data Pesanan</th>
                            <th>Bukti Bayar</th>
                            <th>Status Bayar</th>
                            <th>Status Pesanan</th>
                            <th>Aski</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($pesanan as $ps): ?>
                        <tr class="highlight">
                            <td><?= $i++; ?></td>
                            <td>
                                <div class="card m-1" style="width: 200px;">
                                    <div class="card-body p-1">
                                        <?php if ($ps['diskon_produk'] > 0 ) { ?>
                                        <span class="discount-badge position-absolute">
                                            <?= $ps['diskon_produk'] ?>%
                                        </span>
                                        <?php } ?>
                                        <?php if (!$ps['image']) { ?>
                                        <img src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                            href="<?= base_url('./assets/upload/produk/no_image.jpg') ?>"
                                            class="img-fluid rounded" data-toggle="lightbox"
                                            style="width: 300px; height: 130px;">
                                        <?php } else { ?>
                                        <img src="<?= base_url('./assets/upload/produk/') . $ps['image']; ?>"
                                            href="<?= base_url('./assets/upload/produk/') ?><?= $ps['image']; ?>"
                                            class="img-fluid rounded" data-toggle="lightbox"
                                            style="width: 300px; height: 130px;">
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col text-left">
                                                <b><?= word_limiter($ps['nama_produk'], 3); ?></b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <?= word_limiter($ps['nama_kategori'], 3); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <i class="fas fa-star fa-sm" style="color: orange;">
                                                    <?= $ps['rating_produk'] ?></i>
                                            </div>
                                            <div class="col text-center">
                                                | <?= $ps['stok_produk'] ?> |
                                            </div>
                                            <div class="col text-right">
                                                <?= $ps['jenis_produk'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <span>
                                                    <i class="fas fa-store fa-sm" style="color: brown;">
                                                    </i> <?= $ps['nama_toko'] ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <span>
                                                    <i class="fas fa-map-marker fa-sm" style="color: black;">
                                                    </i> <?= $ps['alamat_toko'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card" style="width: 250px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <strong>Pembayaran:</strong> <?= $ps['pembayaran'] ?><br>
                                                <?php if($ps['pembayaran'] !== "COD") { ?>
                                                <strong>No Rekening:</strong> <?= $ps['no_rekening'] ?><br>
                                                <?php } ?>
                                                <strong>Tanggal:</strong>
                                                <?= date("d-m-Y", strtotime($ps['tgl_pesanan'])) ?><br>
                                                <strong>Jumlah:</strong> <?= $ps['jml_pesanan'] ?><br>
                                                <strong>Harga:</strong> Rp.
                                                <?= number_format($ps['harga_pesanan'], 0, ',', '.'); ?><br>
                                                <strong>Total:</strong> Rp.
                                                <?= number_format($ps['total_pembayaran'], 0, ',', '.'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 80px;">
                                <?php if(!$ps['bukti_bayar']) { ?>
                                <a class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#upload-bukti<?= $ps['id_pesanan'] ?>">
                                    <i class="fas fa-upload"></i> Upload
                                </a>
                                <?php } else { ?>
                                <a class="btn btn-sm btn-success"
                                    href="<?= base_url('./assets/upload/bukti/') ?><?= $ps['bukti_bayar'] ?>"
                                    target="_blank">
                                    <i class="fas fa-sticky-note"></i> Bukti
                                </a>
                                <?php } ?>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>">
                                    <i
                                        class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                    <?= $ps['status_bayar'] ?>
                                </a>
                            </td>
                            <td>
                                <a
                                    class="btn btn-sm <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : 'btn-warning') ?>">
                                    <i
                                        class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : 'fa-times-circle') ?>"></i>
                                    <?= $ps['status_pesanan'] ?>
                                </a>
                            </td>
                            <td style="width: 80px;">
                                <?php if($ps['status_pesanan'] !== 'Selesai' ) { ?>
                                <a class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#edit-pesanan<?= $ps['id_pesanan'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger"
                                    onclick="deleteConfirmation('<?= base_url(); ?>User/hapusPesanan/<?= $ps['id_pesanan']; ?>')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php } else { ?>
                                <a class="btn btn-sm btn-secondary"
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
                                    <label for="bukti_bayar">Upload Bukti Pembayaran</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar"
                                            value="<?= set_value('bukti_bayar'); ?>" onchange="updateFileName()"
                                            required>
                                        <label class="custom-file-label" for="bukti_bayar">Pilih gambar produk</label>
                                    </div>
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