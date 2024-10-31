<div class="login-box" style="width: 700px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary my-3">
        <div class="card-header text-center">
            <h1" class="h1"><b>Register A</b>lumni</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('auth/registerAlumni'); ?>" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="<?= set_value('nama'); ?>" placeholder="Nama Alumni">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email"
                                    value="<?= set_value('email'); ?>" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" class="form-control" name="no_telp" id="no_telp"
                                    value="<?= set_value('no_telp'); ?>" placeholder="No Telp">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?= set_value('username'); ?>" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password1" id="password1"
                                    value="<?= set_value('password1'); ?>" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password2" id="password2"
                                    value="<?= set_value('password2'); ?>" placeholder="Ulang password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="no_rekening" id="no_rekening"
                                    value="<?= set_value('no_rekening'); ?>" placeholder="Nomor Rekening">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-credit-card"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('no_rekening', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Provinsi Asal -->
                        <div class="form-group">
                            <select class="form-control" id="originProvince" name="id_provinsi" required>
                                <option value="">-- Pilih Provinsi Asal --</option>
                            </select>
                            <input type="hidden" id="namaProvinsi" name="nama_provinsi">
                        </div>

                        <!-- Kota Asal -->
                        <div class="form-group">
                            <select class="form-control" id="origin" name="id_kota" required>
                                <option value="">-- Pilih Kota Asal --</option>
                            </select>
                            <input type="hidden" id="namaKota" name="nama_kota">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_toko" id="nama_toko"
                                    value="<?= set_value('nama_toko'); ?>" placeholder="Nama Toko">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-store"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('nama_toko', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <textarea type="text-area" class="form-control" name="keterangan_toko"
                                    id="keterangan_toko"
                                    placeholder="Deskripsi Toko"><?= set_value('keterangan_toko'); ?></textarea>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-sticky-note"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('keterangan_toko', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <textarea type="text-area" class="form-control" name="alamat_toko" id="alamat_toko"
                                    placeholder="Alamat Toko"><?= set_value('alamat_toko'); ?></textarea>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('alamat_toko', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </div>
            </form>
            <div class="row mt-2">
                <div class="col">
                    <a class="btn btn-sm btn-primary btn-block" href="<?= base_url() ?>Home"><i class="fas fa-home"></i>
                        Home</a>
                </div>
                <div class="col">
                    <a class="btn btn-info btn-sm btn-block" href="<?= base_url(); ?>Auth"><i
                            class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->