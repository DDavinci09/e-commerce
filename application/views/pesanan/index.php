<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Pesanan</h1>
                </div>
            </div>
            <?php if ($this->session->flashdata('message')): ?>
            <div class="row">
                <div class="col text-center">
                    <h5><?= $this->session->flashdata('message'); ?></h5>
                </div>
            </div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Data Produk</th>
                                        <th>Data Pesanan</th>
                                        <th>Status Pesanan</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($pesanan as $ps): ?>
                                    <tr>
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
                                                                <i class="fas fa-map-marker fa-sm"
                                                                    style="color: black;">
                                                                </i> <?= $ps['alamat_toko'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="card" style="width: 320px;">
                                                <div class="card-body m-0">
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Pembeli</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            : <?= $ps['nama_user'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Pembayaran</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            : <?= $ps['pembayaran'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Tanggal</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            : <?= date("d-m-Y", strtotime($ps['tgl_pesanan'])) ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Jumlah</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            : <?= $ps['jml_pesanan'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Harga</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            :
                                                            Rp.<?= number_format($ps['harga_pesanan'], 0, ',', '.'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-sm-5">
                                                            <b>Total</b>
                                                        </div>
                                                        <div class="col col-sm-5">
                                                            :
                                                            Rp.<?= number_format($ps['total_pembayaran'], 0, ',', '.'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="card" style="width: 310px;">
                                                <div class="card-body">
                                                    <div class="row my-2">
                                                        <div class="col col-md-5">
                                                            <b>Bukti Bayar</b>
                                                        </div>
                                                        <div class="col col-md-7">
                                                            :
                                                            <?php if(!$ps['bukti_bayar']) { ?>
                                                            Menunggu Upload
                                                            <?php } else { ?>
                                                            <a class="btn btn-sm btn-success"
                                                                href="<?= base_url('./assets/upload/bukti/') ?><?= $ps['bukti_bayar'] ?>"
                                                                target="_blank">
                                                                <i class="fas fa-sticky-note"></i> Bukti
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col col-md-5">
                                                            <b>Status Bayar</b>
                                                        </div>
                                                        <div class="col col-md-7">
                                                            :
                                                            <?php if ($user['role'] == 'Admin') { ?>
                                                            <a class="btn btn-sm <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>"
                                                                data-toggle="modal"
                                                                data-target="#status-bayar<?= $ps['id_pesanan'] ?>">
                                                                <i
                                                                    class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                                                <?= $ps['status_bayar'] ?>
                                                            </a>
                                                            <?php } else { ?>
                                                            <a
                                                                class="btn btn-sm <?= $ps['status_bayar'] == 'Belum Bayar' ? 'btn-danger' : 'btn-success' ?>">
                                                                <i
                                                                    class="fas <?= $ps['status_bayar'] == 'Belum Bayar' ? 'fa-times-circle' : 'fa-check-circle' ?>"></i>
                                                                <?= $ps['status_bayar'] ?>
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col col-md-5">
                                                            <b>Status Pesanan</b>
                                                        </div>
                                                        <div class="col col-md-7">
                                                            :
                                                            <?php if ($user['role'] == 'Alumni') { ?>
                                                            <a class="btn btn-sm <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : 'btn-warning') ?>"
                                                                data-toggle="modal"
                                                                data-target="#status-pesanan<?= $ps['id_pesanan'] ?>">
                                                                <i
                                                                    class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : 'fa-times-circle') ?>"></i>
                                                                <?= $ps['status_pesanan'] ?>
                                                            </a>
                                                            <?php } else { ?>
                                                            <a
                                                                class="btn btn-sm <?= $ps['status_pesanan'] == 'Diproses' ? 'btn-primary' : ($ps['status_pesanan'] == 'Selesai' ? 'btn-success' : 'btn-warning') ?>">
                                                                <i
                                                                    class="fas <?= $ps['status_pesanan'] == 'Diproses' ? 'fa-spinner' : ($ps['status_pesanan'] == 'Selesai' ? 'fa-check-circle' : 'fa-times-circle') ?>"></i>
                                                                <?= $ps['status_pesanan'] ?>
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($this->session->userdata('role') !== 'Admin') { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Alumni/DetailPesanan/<?= $ps['id_pesanan'] ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <?php } else { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Admin/DetailPesanan/<?= $ps['id_pesanan'] ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php foreach ($pesanan as $ps): ?>
<!-- Modal Status Pemabayaran -->
<div class="modal fade" id="status-bayar<?= $ps['id_pesanan'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-primary">
                <h4 class="modal-title">Status Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Admin/editStatusPembayaran'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                            <label for="status_pesanan">Status Pembayaran :</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="status_bayar" name="status_bayar">
                                    <option value="Belum Bayar"
                                        <?= $ps['status_bayar'] == 'Belum Bayar' ? 'selected' : ''; ?>>Belum Bayar
                                    </option>
                                    <option value="Lunas" <?= $ps['status_bayar'] == 'Lunas' ? 'selected' : ''; ?>>Lunas
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-check"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
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
            <?php echo form_open('Alumni/editStatusPesanan'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" name="id_pesanan" value="<?= $ps['id_pesanan'] ?>">
                            <label for="status_bayar">Status Pesanan</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="status_pesanan" name="status_pesanan">
                                    <option value="Diproses"
                                        <?= $ps['status_pesanan'] == 'Diproses' ? 'selected' : ''; ?>>Diproses
                                    </option>
                                    <option value="Dikirim"
                                        <?= $ps['status_pesanan'] == 'Dikirim' ? 'selected' : ''; ?>>Dikirim
                                    </option>
                                    <option value="Selesai"
                                        <?= $ps['status_pesanan'] == 'Selesai' ? 'selected' : ''; ?>>Selesai
                                    </option>
                                    <option value="Dibatalkan"
                                        <?= $ps['status_pesanan'] == 'Dibatalkan' ? 'selected' : ''; ?>>
                                        Dibatalkan
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-money-check"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach; ?>