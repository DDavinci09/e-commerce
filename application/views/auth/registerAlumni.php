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
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama User">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="No Telp">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Ulang password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Toko">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-store"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <textarea type="text-area" class="form-control" placeholder="Deskripsi Toko"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-sticky-note"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <textarea type="text-area" class="form-control" placeholder="Alamat Toko"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marker"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->