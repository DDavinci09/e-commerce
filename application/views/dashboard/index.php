<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Dashboard <?= $user['role']; ?></h1>
                </div>
            </div>
            <?php if ($this->session->flashdata('message')): ?>
            <div class="row">
                <div class="col text-center">
                    <h5><?= $this->session->flashdata('message'); ?></h5>
                </div>
            </div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php if ($this->session->userdata('role') == 'Alumni') { ?>
                        <!-- Data Total Pesanan -->
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Rp.<?= number_format($totalPendapatan, 0, ',', '.'); ?></h3>
                                    <p>Total Pendapatan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-check"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php if ($this->session->userdata('role') == 'Admin') { ?>
                        <!-- Data User -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $totalUser; ?></h3>
                                    <p>Total Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- Total Data Alumni -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $totalAlumni; ?></h3>
                                    <p>Total Alumni</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer nav-link dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    More info <i class="fas fa-arrow-circle-down"></i>
                                </a>
                                <ul class="dropdown-menu border-0 shadow w-100">
                                    <li><a href="#" class="dropdown-item">Aktif (<?= $totalApprove; ?>)</a></li>
                                    <li><a href="#" class="dropdown-item">Belum Aktif (<?= $totalDecline; ?>)</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- Data Kategori -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $totalKategori; ?></h3>
                                    <p>Total Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <?php } ?>

                        <!-- Data Produk -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= $totalProduk; ?></h3>
                                    <p>Total Produk</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->


                        <!-- Data Total Pesanan -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $totalPesanan; ?></h3>
                                    <p>Total Pesanan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-truck-loading"></i>
                                </div>
                                <a href="#" class="small-box-footer nav-link dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    More info <i class="fas fa-arrow-circle-down"></i>
                                </a>
                                <ul class="dropdown-menu border-0 shadow w-100">
                                    <li><a href="#" class="dropdown-item">Belum Dibayar (<?= $totalBelumBayar; ?>)</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Lunas (<?= $totalLunas; ?>)</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a href="#" class="dropdown-item">Diproses (<?= $totalDiproses; ?>)</a></li>
                                    <li><a href="#" class="dropdown-item">Selesai (<?= $totalSelesai; ?>)</a></li>
                                    <li><a href="#" class="dropdown-item">Dibatalkan (<?= $totalDibatalkan; ?>)</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- Data Review -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?= $totalReview; ?></h3>
                                    <p>Total Review</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->