<!--================Cart Area =================-->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>My Profile</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 mx-auto">
                        <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <?php endif; ?>
                        <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" value="<?= $user['username'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama_user" value="<?= $user['nama_user'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $user['email'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="noTelp">No Telp</label>
                                <input type="text" class="form-control" id="noTelp" value="<?= $user['no_telp'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat_user">Alamat Toko</label>
                                <div class="form-group">
                                    <textarea type="text-area" class="form-control" name="alamat_user" id="alamat_user"
                                        placeholder="Alamat User" readonly><?= $user['alamat_user'] ?></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <a class="btn btn-primary btn-md" href="<?= base_url('User/editProfile') ?>" data-toggle="modal"
                            data-target="#editProfile">Edit
                            Profile</a>
                        <a class="btn btn-danger btn-md" href="<?= base_url('User/editPassword') ?>" data-toggle="modal"
                            data-target="#editUsername">Edit Username
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->


<!-- Modal Edit Username dan Password -->
<div class="modal fade" id="editUsername" tabindex="-1" aria-labelledby="editUsernameLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('User/editUsernamePassword'); ?>" method="post">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editUsernameLabel">Edit Username & Password</h5>
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
                            value="<?= $user['username']; ?>" placeholder="Username" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password" class="form-control" name="password1" id="password1"
                            placeholder="Password Baru" required>
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password Baru</label>
                        <input type="password" class="form-control" name="password2" id="password2"
                            placeholder="Ulangi Password Baru" required>
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

<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('User/editProfile'); ?>" method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <!-- Nama Alumni -->
                            <label for="nama_user">Nama User</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_user" id="nama_user"
                                    value="<?= $user['nama_user'] ?>" placeholder="Nama User . . ." required>
                                <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <!-- Email -->
                            <label for="email">Email</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email"
                                    value="<?= $user['email'] ?>" placeholder="Email . . ." required>
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <!-- Email -->
                            <label for="no_telp">No Telp</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_telp" id="no_telp"
                                    value="<?= $user['no_telp'] ?>" placeholder="No Telp . . ." required>
                                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <!-- Alamat Toko -->
                            <label for="alamat_user">Alamat Toko</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <textarea type="text-area" class="form-control" name="alamat_user"
                                            id="alamat_user"
                                            placeholder="Alamat User"><?= $user['alamat_user'] ?></textarea>
                                    </div>
                                    <?= form_error('alamat_user', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
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