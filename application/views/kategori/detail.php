<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail Kategori</h1>
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
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori :</label>
                                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                        value="<?= $kategori['nama_kategori'] ?>" placeholder="Masukkan nama kategori"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_kategori">Keterangan :</label>
                                    <textarea name="keterangan_kategori" class="form-control" id="keterangan_kategori"
                                        rows="3" placeholder="Masukkan keterangan kategori"
                                        readonly><?= $kategori['keterangan_kategori'] ?></textarea>
                                </div>
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