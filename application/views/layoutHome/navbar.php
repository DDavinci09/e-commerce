<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white sidebar-collapse">
    <div class="container">
        <a href="<?= base_url('assets'); ?>/index3.html" class="navbar-brand">
            <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
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
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Dropdown</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                </li>

                                <!-- Level three dropdown-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-item dropdown-toggle">level 2</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    </ul>
                                </li>
                                <!-- End Level three -->

                                <li><a href="#" class="dropdown-item">level 2</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <!-- Dropdown for Categories -->
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-tags"></i> Kategori
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Category 1</a>
                            <a class="dropdown-item" href="#">Category 2</a>
                            <a class="dropdown-item" href="#">Category 3</a>
                            <a class="dropdown-item" href="#">Category 4</a>
                        </div>
                    </div>
                    <!-- Search Input -->
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
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
            <li class="nav-item dropdown">
                <a class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" href="#">Login
                </a>
                <div class="dropdown-menu">
                    <a href="<?= base_url() ?>Auth/loginUser" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Login User
                    </a>
                    <a href="<?= base_url() ?>Auth/loginAlumni" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Login Alumni
                    </a>
                    <a href="<?= base_url() ?>Auth/loginAdmin" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Login Admin
                    </a>
                </div>
            </li>
            <!-- User Dropdown Register -->
            <li class="nav-item dropdown ml-2">
                <a class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" href="#">Register
                </a>
                <div class="dropdown-menu">
                    <a href="<?= base_url() ?>Auth/registerUser" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>User
                    </a>
                    <a href="<?= base_url() ?>Auth/registerAlumni" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>Alumni
                    </a>
                    <a href="<?= base_url() ?>Auth/registerAdmin" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>Admin
                    </a>
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
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Dropdown</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                </li>

                                <!-- Level three dropdown-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-item dropdown-toggle">level 2</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    </ul>
                                </li>
                                <!-- End Level three -->

                                <li><a href="#" class="dropdown-item">level 2</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <!-- Dropdown for Categories -->
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-tags"></i> Kategori
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Category 1</a>
                            <a class="dropdown-item" href="#">Category 2</a>
                            <a class="dropdown-item" href="#">Category 3</a>
                            <a class="dropdown-item" href="#">Category 4</a>
                        </div>
                    </div>
                    <!-- Search Input -->
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
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
                <a href="<?= base_url() ?>Auth/logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
        <?php } ?>
    </ul>
    </div>
</nav>
<!-- /.navbar -->