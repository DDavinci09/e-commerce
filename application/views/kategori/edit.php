<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Tambah Data Kategori</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- Form untuk tambah data kategori -->
                    <div class="card card-primary">
                        <form action="<?= base_url('Admin/editKategori'); ?>" method="post">
                            <input type="hidden" name="id_kategori" value="<?= $kt['id_kategori'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori :</label>
                                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                        value="<?= $kt['nama_kategori'] ?>" placeholder="Masukkan nama kategori">
                                    <?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_kategori">Keterangan :</label>
                                    <textarea name="keterangan_kategori" class="form-control" id="keterangan_kategori"
                                        rows="3"
                                        placeholder="Masukkan keterangan kategori"><?= $kt['keterangan_kategori'] ?></textarea>
                                    <?= form_error('keterangan_kategori', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->