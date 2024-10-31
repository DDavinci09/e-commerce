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
        <div class="container">
            <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>
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
                                            <label for="provinsi">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi"
                                                value="<?= $user['nama_provinsi'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="kota">Kota</label>
                                            <input type="text" class="form-control" id="kota"
                                                value="<?= $user['nama_kota'] ?>" readonly>
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
                    <div class="row text-center">
                        <div class="col">
                            <a class="btn btn-primary btn-md" href="<?= base_url('Alumni/editProfile') ?>">Edit
                                Profile</a>
                            <a class="btn btn-danger btn-md" href="<?= base_url('Alumni/editPassword') ?>"
                                data-toggle="modal" data-target="#editModal">Edit Username
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('Alumni/editUsernamePassword'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Username & Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="<?= $user['username']; ?>" placeholder="Username">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password" class="form-control" name="password1" id="password1"
                            placeholder="Password Baru">
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password Baru</label>
                        <input type="password" class="form-control" name="password2" id="password2"
                            placeholder="Ulangi Password Baru">
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>