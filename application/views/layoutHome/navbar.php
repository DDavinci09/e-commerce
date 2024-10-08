<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark sidebar-collapse">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.jpg" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">E-Commerce</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <?php if ($this->session->userdata('role') !== 'User') { ?>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Home/shop" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Home/Contact" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Home/AboutUs" class="nav-link">About Us</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3" action="<?= base_url(); ?>Home/Pencarian" method="get">
                <div class="input-group input-group-sm">
                    <!-- Search Input -->
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger navbar-badge">5</span>
                </a>
            </li>

            <!-- User Dropdown Login -->
            <li class="nav-item mx-1 mt-1">
                <a class="btn btn-success btn-sm" href="<?= base_url(); ?>Auth"><i class="fas fa-sign-in-alt"></i> Login
                </a>
            </li>

            <!-- User Dropdown Register -->
            <li class="nav-item dropdown mx-2 mt-1">
                <a class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" href="#"><i
                        class="fas fa-registered"></i> Register
                </a>
                <div class="dropdown-menu">
                    <a href="<?= base_url() ?>Auth/registerUser" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>User
                    </a>
                    <a href="<?= base_url() ?>Auth/registerAlumni" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>Alumni
                    </a>
                    <!-- <a href="<?= base_url() ?>Auth/registerAdmin" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>Admin
                    </a> -->
                </div>
            </li>
            <?php } else { ?>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>User" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>User/shop" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>User/DataPesanan" class="nav-link">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>User/Contact" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>User/AboutUs" class="nav-link">About Us</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3" action="<?= base_url(); ?>User/Pencarian" method="get">
                <div class="input-group input-group-sm">
                    <!-- Search Input -->
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
    </div>
    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge badge-danger navbar-badge">5</span>
            </a>
        </li>
        <!-- User Dropdown User -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-user fa-fw"></i>
                <span class="ml-2"><?= $user['nama_user']; ?></span> <!-- Nama pengguna -->
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> Settings
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-calendar-check mr-2"></i> Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a data-toggle="modal" data-target="#logoutModal" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
        <?php } ?>
    </ul>
    </div>
</nav>
<!-- /.navbar -->