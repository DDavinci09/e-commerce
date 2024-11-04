<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Detail User</h1>
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
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" value="<?= $users['username'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama_user"
                                    value="<?= $users['nama_user'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $users['email'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="noTelp">No Telp</label>
                                <input type="text" class="form-control" id="noTelp" value="<?= $users['no_telp'] ?>"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat_user">Alamat Toko</label>
                                <div class="form-group">
                                    <textarea type="text-area" class="form-control" name="alamat_user" id="alamat_user"
                                        placeholder="Alamat User" readonly><?= $users['alamat_user'] ?></textarea>
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