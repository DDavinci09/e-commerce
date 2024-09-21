<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Dashboard <?= $user['nama']; ?></h1>
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
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card-body">
                                        <h2>Tentang Kami</h2>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime,
                                            hic nemo magni
                                            voluptate id doloremque obcaecati corrupti laudantium sequi
                                            suscipit, repellendus vitae
                                            voluptates eligendi adipisci quisquam quas tenetur quis
                                            cupiditate.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                                            sunt explicabo asperiores
                                            minima nesciunt, quia voluptatibus, alias, consectetur deleniti
                                            ipsam expedita nisi
                                            commodi quod! Omnis eius ab ipsam placeat repellat.</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <img class="border border-1 border-dark rounded-5" src="../assets/img/image.png"
                                            alt="Gambar Kosong" style="width: 100;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->