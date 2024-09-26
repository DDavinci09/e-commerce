<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                                                value="<?= $user['username'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Alumni</label>
                                            <input type="text" class="form-control" id="nama"
                                                value="<?= $user['nama'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                value="<?= $user['email'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">No Telp</label>
                                            <input type="text" class="form-control" id="noTelp"
                                                value="<?= $user['no_telp'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="noRekening">No Rekening</label>
                                            <input type="text" class="form-control" id="noRekening"
                                                value="<?= $user['no_rekening'] ?>" readonly>
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
                                                value="<?= $user['nama_toko'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatToko">Alamat Toko</label>
                                            <input type="text" class="form-control" id="alamatToko"
                                                value="<?= $user['alamat_toko'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="keteranganToko">Keterangan Toko</label>
                                            <textarea class="form-control" id="keteranganToko" rows="3"
                                                readonly><?= $user['keterangan_toko'] ?></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Footer -->
                <div class="card-footer">
                    <button class="btn btn-primary">Edit Profile</button>
                    <button class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->