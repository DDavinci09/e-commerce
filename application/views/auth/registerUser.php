<div class="login-box" style="width: 700px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary my-3">
        <div class="card-header text-center">
            <h1" class="h1"><b>Register U</b>ser</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>Auth/registerUser" method="post">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                placeholder="Nama User">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password1" name="password1"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password2" name="password2"
                                placeholder="Ulang password">
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
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a href="">Login</a>
        </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->