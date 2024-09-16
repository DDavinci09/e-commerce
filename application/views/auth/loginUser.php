<div class="register-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1" class="h1"><b>Login U</b>ser</h1>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url(); ?>Auth/loginUser" method="post">
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->