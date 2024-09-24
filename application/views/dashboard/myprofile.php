<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-3">
                            <h6>Username</h6>
                        </div>
                        <div class="col col-9">
                            <h6>: <?= $user['username'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>Nama Alumni</h6>
                        </div>
                        <div class="col col-9">
                            <h6>: <?= $user['nama'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>Email</h6>
                        </div>
                        <div class="col col-9">
                            <h6>: <?= $user['email'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>No Telp</h6>
                        </div>
                        <div class="col col-9">
                            <h6>: <?= $user['no_telp'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>No Rekening</h6>
                        </div>
                        <div class="col col-9">
                            <h6>: <?= $user['no_rekening'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>Nama Toko</h6>
                        </div>
                        <div class="col">
                            <h6>: <?= $user['nama_toko'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>Alamat Toko</h6>
                        </div>
                        <div class="col">
                            <h6>: <?= $user['alamat_toko'] ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <h6>Keterangan Toko</h6>
                        </div>
                        <div class="col">
                            <h6>: <?= $user['keterangan_toko'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->