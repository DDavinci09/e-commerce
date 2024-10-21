<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="#"><img src="<?= base_url('assets'); ?>/home/img/logo.png"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <?php if ($this->session->userdata('role') !== 'User') { ?>
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto align-items-center">
                        <li class="nav-item <?= ($active_menu == 'home') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>Home">Home</a></li>
                        <li class="nav-item <?= ($active_menu == 'shop') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>Home/shop">Shop</a></li>
                        </li>
                        <li class="nav-item <?= ($active_menu == 'contact') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>Home/Contact">Contact</a></li>
                        <li class="nav-item <?= ($active_menu == 'aboutus') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>Home/AboutUs">About Us</a></li>
                        <!-- Search form -->
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="<?= base_url(); ?>home/Pencarian"
                                method="get">
                                <div class="input-group">
                                    <input class="form-control mr-sm-2" type="search" name="keyword"
                                        placeholder="Search products..." aria-label="Search" required>
                                    <div class="input-group-append">
                                        <button class="btn btncustom" type="submit">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item dropdown" style="margin-right: 0;">
                            <!-- Tombol Login -->
                            <a class="btn btncustom" href="<?= base_url(); ?>Auth">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>

                            <!-- Tombol Dropdown Registrasi -->
                            <a class="btn btncustom  dropdown-toggle" data-toggle="dropdown" href="#"
                                id="registerDropdown">
                                <i class="fas fa-registered"></i> Register
                            </a>

                            <!-- Isi Dropdown -->
                            <div class="dropdown-menu" aria-labelledby="registerDropdown">
                                <a href="<?= base_url() ?>Auth/registerUser" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i>User
                                </a>
                                <a href="<?= base_url() ?>Auth/registerAlumni" class="dropdown-item">
                                    <i class="fas fa-user-graduate mr-2"></i>Alumni
                                </a>
                            </div>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto align-items-center">
                        <li class="nav-item <?= ($active_menu == 'home') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>User">Home</a></li>
                        <li class="nav-item <?= ($active_menu == 'shop') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>User/shop">Shop</a></li>
                        <li class="nav-item <?= ($active_menu == 'pesanan') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>User/DataPesanan">Pesanan</a>
                        </li>
                        <li class="nav-item <?= ($active_menu == 'contact') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>User/Contact">Contact</a></li>
                        <li class="nav-item <?= ($active_menu == 'aboutus') ? 'active' : '' ?>"><a class="nav-link"
                                href="<?= base_url(); ?>User/AboutUs">About Us</a></li>
                        <!-- Search form -->
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="<?= base_url(); ?>home/Pencarian"
                                method="get">
                                <div class="input-group">
                                    <input class="form-control mr-sm-2" type="search" name="keyword"
                                        placeholder="Search products..." aria-label="Search" required>
                                    <div class="input-group-append">
                                        <button class="btn btncustom" type="submit">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i>
                                <span><?= $user['nama_user']; ?></span> <!-- Nama pengguna -->
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-cogs"></i> Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-calendar-check"></i> Activity Log
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->