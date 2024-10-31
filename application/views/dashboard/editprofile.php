<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Edit Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-body">
                    <form action="<?= base_url('Alumni/editProfile'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nama Alumni -->
                                <label for="nama">Nama Alumni</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="<?= $user['nama'] ?>" placeholder="Nama Alumni">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Email -->
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="<?= $user['email'] ?>" placeholder="Email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- No Telp -->
                                <label for="no_telp">No Telp</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="no_telp" id="no_telp"
                                        value="<?= $user['no_telp'] ?>" placeholder="No Telp">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Nomor Rekening -->
                                <label for="no_rekening">Nomor Rekening</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="no_rekening" id="no_rekening"
                                        value="<?= $user['no_rekening'] ?>" placeholder="Nomor Rekening">
                                    <?= form_error('no_rekening', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Provinsi Asal -->
                                <label for="originProvince">Provinsi Asal : <?= $user['nama_provinsi'] ?></label>
                                <div class="form-group">
                                    <select class="form-control" id="originProvince" name="id_provinsi">
                                        <option value="">-- Pilih Provinsi Asal --</option>
                                    </select>
                                    <input type="hidden" id="namaProvinsi" name="nama_provinsi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Kota Asal -->
                                <label for="origin">Kota Asal : <?= $user['nama_kota'] ?></label>
                                <div class="form-group">
                                    <select class="form-control" id="origin" name="id_kota">
                                        <option value="">-- Pilih Kota Asal --</option>
                                    </select>
                                    <input type="hidden" id="namaKota" name="nama_kota">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nama Toko -->
                                <label for="nama_toko">Nama Toko</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama_toko" id="nama_toko"
                                                value="<?= $user['nama_toko'] ?>" placeholder="Nama Toko">
                                        </div>
                                        <?= form_error('nama_toko', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Alamat Toko -->
                                <label for="alamat_toko">Alamat Toko</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <textarea type="text-area" class="form-control" name="alamat_toko"
                                                id="alamat_toko"
                                                placeholder="Alamat Toko"><?= $user['alamat_toko'] ?></textarea>
                                        </div>
                                        <?= form_error('alamat_toko', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Deskripsi Toko -->
                                <label for="keterangan_toko">Deskripsi Toko</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <textarea type="text-area" class="form-control" name="keterangan_toko"
                                                id="keterangan_toko"
                                                placeholder="Deskripsi Toko"><?= $user['keterangan_toko'] ?></textarea>
                                        </div>
                                        <?= form_error('keterangan_toko', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row text-center">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Edit Data</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->