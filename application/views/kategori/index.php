<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Data Kategori</h1>
                </div>
                <?php if ($this->session->userdata('role') == 'Admin') { ?>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Admin/tambahKategori">Tambah Data</a>
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
                            <table id="example1" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Keteragan</th>
                                        <th>Produk</th>
                                        <th>Aski</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($kategori as $kt):
                                            ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $kt['nama_kategori'] ?></td>
                                        <td style="width: 500px;"><?= $kt['keterangan_kategori'] ?></td>
                                        <td>
                                            <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                            <a class="btn btn-sm btn-success"
                                                href="<?= base_url() ?>Admin/getProdukKategori/<?= $kt['id_kategori'] ?>"><i
                                                    class="fas fa-box fa-sm"></i> <?= $kt['total_produk'] ?></a>
                                            <?php } else { ?>
                                            <a class="btn btn-sm btn-success"
                                                href="<?= base_url() ?>Alumni/getProdukKategori/<?= $kt['id_kategori'] ?>"><i
                                                    class="fas fa-box fa-sm"></i> <?= $kt['total_produk'] ?></a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($this->session->userdata('role') == 'Admin') { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Admin/DetailKategori/<?= $kt['id_kategori'] ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary  btn-sm"
                                                href="<?= base_url() ?>Admin/editKategori/<?= $kt['id_kategori'] ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger  btn-sm" href="#"
                                                onclick="deleteConfirmation('<?= base_url(); ?>Admin/hapusKategori/<?= $kt['id_kategori']; ?>')"><i
                                                    class="fa fa-trash"></i></a>
                                            <?php } else { ?>
                                            <a class="btn btn-info btn-sm"
                                                href="<?= base_url() ?>Alumni/DetailKategori/<?= $kt['id_kategori'] ?>"><i
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