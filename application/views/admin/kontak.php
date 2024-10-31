<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Kontak</h1>
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

                                </div>
                                <div class="card-body">
                                    <!-- Form Start -->
                                    <form action="" method="post">
                                        <!-- id_kontak (hidden field) -->
                                        <input type="hidden" name="id_kontak" value="<?= $kontak['id_kontak'] ?>">
                                        <!-- Email -->
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?= $kontak['email'] ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- Instagram -->
                                        <div class="form-group row">
                                            <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="instagram" name="instagram"
                                                    value="<?= $kontak['instagram'] ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- Tiktok -->
                                        <div class="form-group row">
                                            <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tiktok" name="tiktok"
                                                    value="<?= $kontak['tiktok'] ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- Youtube -->
                                        <div class="form-group row">
                                            <label for="youtube" class="col-sm-2 col-form-label">YouTube</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="youtube" name="youtube"
                                                    value="<?= $kontak['youtube'] ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- Whatsapp -->
                                        <div class="form-group row">
                                            <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                                    value="<?= $kontak['whatsapp'] ?>" readonly>
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                                    readonly><?= $kontak['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                    <!-- Submit Button -->
                                    <div class="form-group row">
                                        <div class="col-sm-10 offset-sm-2">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editKontak">Edit Kontak</button>
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

<!-- Modal Upload Bukti Bayar -->
<div class=" modal fade" id="editKontak">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Kontak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Start -->
                <form action="<?= base_url('Admin/editKontak'); ?>" method="post">
                    <!-- id_kontak (hidden field) -->
                    <input type="hidden" name="id_kontak" value="<?= $kontak['id_kontak'] ?>">

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $kontak['email'] ?>" required>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="form-group row">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                value="<?= $kontak['instagram'] ?>">
                        </div>
                    </div>

                    <!-- Tiktok -->
                    <div class="form-group row">
                        <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tiktok" name="tiktok"
                                value="<?= $kontak['tiktok'] ?>">
                        </div>
                    </div>

                    <!-- Youtube -->
                    <div class="form-group row">
                        <label for="youtube" class="col-sm-2 col-form-label">YouTube</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="youtube" name="youtube"
                                value="<?= $kontak['youtube'] ?>">
                        </div>
                    </div>

                    <!-- Whatsapp -->
                    <div class="form-group row">
                        <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                value="<?= $kontak['whatsapp'] ?>">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat"
                                rows="3"><?= $kontak['alamat'] ?></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->