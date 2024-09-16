<!-- Modal Login -->

<!-- Modal Login User -->
<div class="modal fade" id="LoginUser">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class=" login-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <!-- /.login-logo -->
                <p class="text-center">Login Sebagai User</p>
                <div class="card">
                    <div class="card-body login-card-body">

                        <form action="" method="post">
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
                            <div class="row">
                                <!-- /.col -->
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">LogiIn</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Login Alumni -->
<div class="modal fade" id="LoginAlumni">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="login-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <!-- /.login-logo -->
                <p class="text-center">Login Sebagai Alumni</p>
                <div class="card">
                    <div class="card-body login-card-body">
                        <form action="" method="post">
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
                            <div class="row">
                                <!-- /.col -->
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Login Admin -->
<div class="modal fade" id="LoginAdmin">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="login-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <p class="text-center">Login Sebagai Admin</p>
                <!-- /.login-logo -->
                <div class="card">
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body login-card-body">
                        <form action="<?= base_url('Auth/loginAdmin'); ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
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
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Register -->

<!--Modal Register User -->
<div class="modal fade" id="RegisterUser">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="register-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <p class="text-center">Registrasi User</p>
                <div class="card">
                    <div class="card-body register-card-body">
                        <form action="" method="post">
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
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal Register Alumni -->
<div class="modal fade" id="RegisterAlumni">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="register-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <p class="text-center">Registrasi Alumni</p>
                <div class="card">
                    <div class="card-body register-card-body">
                        <form action="" method="post">
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
                                        <textarea type="text-area" class="form-control"
                                            placeholder="Deskripsi Toko"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-sticky-note"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <textarea type="text-area" class="form-control"
                                            placeholder="Alamat Toko"></textarea>
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
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Modal Register Admin -->
<div class="modal fade" id="RegisterAdmin">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="register-logo">
                    <h1><b>E-C</b>ommerce</h1>
                </div>
                <p class="text-center">Registrasi Admin</p>
                <div class="card">
                    <div class="card-body register-card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nama Admin">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
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
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Footer -->
<footer class="main-footer bg-primary text-white mt-5 pt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>Tentang Kami</h5>
                <p>E-Commerce kami menyediakan berbagai macam produk berkualitas tinggi dengan harga terjangkau. Kami
                    berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Produk</a></li>
                    <li><a href="#" class="text-white">Kontak</a></li>
                    <li><a href="#" class="text-white">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact & Social Media Section -->
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p>Email: support@ecommerce.com</p>
                <p>Telepon: +62 123 456 789</p>
                <h5>Ikuti Kami</h5>
                <div>
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <hr class="bg-light">

        <!-- Copyright Section -->
        <div class="row">
            <div class="col text-center">
                <p>&copy; 2024 E-Commerce. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<script>
< /body>

<
/html>