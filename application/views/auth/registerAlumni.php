<div class="login-box" style="width: 700px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary my-3">
        <div class="card-header text-center">
            <h1" class="h1"><b>Register A</b>lumni</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('auth/registerAlumni'); ?>" method="post">
                <!-- Nama -->
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Nama Toko -->
                <div class="form-group">
                    <label for="nama_toko">Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko"
                        value="<?= set_value('nama_toko'); ?>">
                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Keterangan Toko -->
                <div class="form-group">
                    <label for="keterangan_toko">Keterangan Toko</label>
                    <textarea class="form-control" id="keterangan_toko"
                        name="keterangan_toko"><?= set_value('keterangan_toko'); ?></textarea>
                    <?= form_error('keterangan_toko', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Alamat Toko -->
                <div class="form-group">
                    <label for="alamat_toko">Alamat Toko</label>
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko"
                        value="<?= set_value('alamat_toko'); ?>">
                    <?= form_error('alamat_toko', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- No Telepon -->
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="<?= set_value('no_telp'); ?>">
                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->