<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
                <?php if ($this->session->userdata('role') == 'Alumni') { ?>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Alumni/tambahProduk">Tambah Data</a>
                </div>
                <?php } ?>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                        <th>Nama Alumni</th>
                                        <?php } ?>
                                        <th>Kategori</th>
                                        <th>Jenis</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Image</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($produk as $p):
                                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p['nama_produk'] ?></td>
                                        <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                        <td><?= $p['nama'] ?></td>
                                        <?php } ?>
                                        <td><?= $p['nama_kategori'] ?></td>
                                        <td><?= $p['jenis_produk'] ?></td>
                                        <td><?= $p['stok_produk'] ?></td>
                                        <td><?= $p['harga_produk'] ?></td>
                                        <td><?= $p['diskon_produk'] ?></td>
                                        <td>
                                            <a href="<?= base_url('./assets/upload/produk/') . $p['image']; ?>"
                                                data-toggle="lightbox">
                                                <?php if (!$p['image']) { ?>
                                                <img src="<?= base_url('assets/upload/produk/') ?>no_image.jpg"
                                                    alt="Gambar Kosong" style="width: 100px;">
                                                <?php } else { ?>
                                                <img src="<?= base_url('assets/upload/produk/') ?><?= $p['image'] ?>"
                                                    alt="Gambar Kosong" style="width: 100px;">
                                                <?php } ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($this->session->userdata('role') !== 'Admin') { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Alumni/DetailProduk/<?= $p['id_produk'] ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary  btn-sm"
                                                href="<?= base_url() ?>Alumni/editProduk/<?= $p['id_produk'] ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger  btn-sm" href="#"
                                                onclick="deleteConfirmation('<?= base_url(); ?>Alumni/hapusProduk/<?= $p['id_produk']; ?>')"><i
                                                    class="fa fa-trash"></i></a>
                                            <?php } else { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Admin/DetailProduk/<?= $p['id_produk'] ?>"><i
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