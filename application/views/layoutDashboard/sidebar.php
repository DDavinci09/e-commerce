<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Commerce</span>
    </a><!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Admin -->
                <?php if ($this->session->userdata('role') == 'Admin') { ?>
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Users</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataUser" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataAlumni" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Data Alumni</p>
                    </a>
                </li>
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataKategori" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataProduk" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Data Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataPesanan" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Data Pesanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Admin/DataReview" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Data Review</p>
                    </a>
                </li>
                <?php } ?>

                <!-- Dashboard Alumni -->
                <?php if ($this->session->userdata('role') == 'Alumni') { ?>
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Alumni" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Alumni/DataKategori" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Alumni/DataProduk" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Data Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Alumni/DataPesanan" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Data Pesanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Alumni/DataReview" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Data Review</p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-header">Logout</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>Auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>