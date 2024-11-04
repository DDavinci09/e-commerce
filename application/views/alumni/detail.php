<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail Alumni</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-user mr-2"></i>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username"
                                                value="<?= $alumni['username'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Alumni</label>
                                            <input type="text" class="form-control" id="nama"
                                                value="<?= $alumni['nama'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                value="<?= $alumni['email'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">No Telp</label>
                                            <input type="text" class="form-control" id="noTelp"
                                                value="<?= $alumni['no_telp'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="noRekening">No Rekening</label>
                                            <input type="text" class="form-control" id="noRekening"
                                                value="<?= $alumni['no_rekening'] ?>" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Toko Information -->
                        <div class="col-md-6">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-store mr-2"></i>Toko Information</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="namaToko">Nama Toko</label>
                                            <input type="text" class="form-control" id="namaToko"
                                                value="<?= $alumni['nama_toko'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi"
                                                value="<?= $alumni['nama_provinsi'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="kota">Kota</label>
                                            <input type="text" class="form-control" id="kota"
                                                value="<?= $alumni['nama_kota'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatToko">Alamat Toko</label>
                                            <input type="text" class="form-control" id="alamatToko"
                                                value="<?= $alumni['alamat_toko'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="keteranganToko">Keterangan Toko</label>
                                            <textarea class="form-control" id="keteranganToko" rows="3"
                                                readonly><?= $alumni['keterangan_toko'] ?></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <a class="btn btn-primary btn-md"
                                href="<?= base_url('Admin/ProdukAlumni/') ?><?= $alumni['id_alumni'] ?>">Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->