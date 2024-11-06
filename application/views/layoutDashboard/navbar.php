<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <?php if ($this->session->userdata('role') == 'Admin') { ?>
                <?php $menungguProses = $this->modelPesanan->menungguProsesAdmin() ?>
                <span class="badge badge-danger navbar-badge"><?= count($menungguProses) ?></span>
                <?php } else { ?>
                <?php $menungguProses = $this->modelPesanan->menungguProsesAlumni() ?>
                <span class="badge badge-danger navbar-badge"><?= count($menungguProses) ?></span>
                <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if ($this->session->userdata('role') == 'Admin') { ?>
                <?php $menungguProses = $this->modelPesanan->menungguProsesAdmin() ?>
                <span class="dropdown-item dropdown-header">Notifikasi (<?= count($menungguProses) ?>)</span>
                <div class="dropdown-divider"></div>
                <?php if (!empty($menungguProses)): ?>
                <?php $i=1; foreach ($menungguProses as $menunggu): ?>
                <a href="#" class="dropdown-item">
                    <?= $i++; ?>. <?= $menunggu['nama_user'] ?>
                    <span
                        class="float-right text-muted text-sm"><?= date('d M Y', strtotime($menunggu['tgl_pesanan'])) ?>
                        | <?= $menunggu['status_pesanan'] ?></span>
                </a>
                <?php endforeach; ?>
                <?php else: ?>
                <a href="#" class="dropdown-item text-center">Tidak ada notifikasi</a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>Admin/PesananDiproses" class="dropdown-item dropdown-footer">Lihat semua
                    notifikasi . . .</a>
                <?php } else { ?>
                <?php $menungguProses = $this->modelPesanan->menungguProsesAlumni() ?>
                <span class="dropdown-item dropdown-header">Notifikasi (<?= count($menungguProses) ?>)</span>
                <div class="dropdown-divider"></div>
                <?php if (!empty($menungguProses)): ?>
                <?php $i=1; foreach ($menungguProses as $menunggu): ?>
                <a href="#" class="dropdown-item">
                    <?= $i++; ?>. <?= $menunggu['nama_user'] ?>
                    <span
                        class="float-right text-muted text-sm"><?= date('d M Y', strtotime($menunggu['tgl_pesanan'])) ?>
                        | <?= $menunggu['status_pesanan'] ?></span>
                </a>
                <?php endforeach; ?>
                <?php else: ?>
                <a href="#" class="dropdown-item text-center">Tidak ada notifikasi</a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>Alumni/PesananDiproses" class="dropdown-item dropdown-footer">Lihat semua
                    notifikasi . . .</a>
                <?php } ?>
            </div>
        </li>
        <!-- User Dropdown User -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-user fa-fw"></i>
                <span class="ml-2"><?= $user['nama']; ?></span> <!-- Nama pengguna -->
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
    </ul>
</nav>
<!-- /.navbar -->