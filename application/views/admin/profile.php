<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Profile</h1>
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
                        <!-- Tambah Rekening -->
                        <div class="col">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <!-- Nama dan Isi Profil -->
                                    <h2><?= $profil['nama_profil']; ?></h2>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Gambar Profil -->
                                            <img src="<?= base_url('assets/upload/profile/' . $profil['gambar_profil']); ?>"
                                                class="img-fluid rounded" alt="Gambar Profil">
                                        </div>
                                        <div class="col-md-8 text-justify">
                                            <p><?= nl2br(htmlspecialchars($profil['isi_profil'])); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!-- Submit Button -->
                                    <div class="form-group row">
                                        <div class="col">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editProfile">Edit Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Edit Profil -->
<div class=" modal fade" id="editProfile">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/editProfile'); ?>" method="post" enctype="multipart/form-data">
                    <!-- Input Nama Profil -->
                    <div class="form-group">
                        <label for="nama_profil">Nama Profil</label>
                        <input type="text" class="form-control" id="nama_profil" name="nama_profil"
                            value="<?= $profil['nama_profil']; ?>" required>
                    </div>

                    <!-- Input Isi Profil -->
                    <div class="form-group">
                        <label for="isi_profil">Isi Profil</label>
                        <textarea class="form-control" id="isi_profil" name="isi_profil" rows="5"
                            required><?= $profil['isi_profil']; ?></textarea>
                    </div>

                    <!-- Gambar Profil -->
                    <div class="form-group">
                        <label for="gambar_profil">Gambar Profil</label><br>
                        <input type="file" class="form-control-file" id="gambar_profil" name="gambar_profil">
                        <small class="form-text text-muted">Unggah gambar baru jika ingin mengganti (format: jpg, png,
                            gif).</small>
                    </div>

                    <!-- Hidden Input untuk ID Profil -->
                    <input type="hidden" name="id_profile" value="<?= $profil['id_profil']; ?>">

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->