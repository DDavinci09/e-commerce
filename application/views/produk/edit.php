<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Edit Data Produk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Form untuk tambah data kategori -->
                    <div class="card card-primary">
                        <form action="<?= base_url('Alumni/editProduk/'); ?><?= $produk['id_produk'] ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                            <input type="hidden" name="id_alumni" value="<?= $produk['id_alumni'] ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                                value="<?= $produk['nama_produk'] ?>"
                                                placeholder="Masukkan nama produk">
                                            <?= form_error('nama_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori Produk</label>
                                            <select type="text" name="id_kategori" class="form-control" id="id_kategori"
                                                value="<?= set_value('id_kategori'); ?>"
                                                placeholder="Masukkan kategori produk">
                                                <option value="">-- Pilih kategori produk --</option>
                                                <?php foreach ($kategori as $kt): ?>
                                                <?php if ($kt['id_kategori'] == $produk['id_kategori']): ?>
                                                <option value="<?= $kt['id_kategori']; ?>" selected>
                                                    <?= $kt['nama_kategori']; ?>
                                                </option>
                                                <?php else: ?>
                                                <option value="<?= $kt['id_kategori']; ?>"><?= $kt['nama_kategori']; ?>
                                                </option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_produk">Jenis Produk</label>
                                            <select type="text" name="jenis_produk" class="form-control"
                                                id="jenis_produk" value="<?= $produk['jenis_produk'] ?>"
                                                placeholder="Masukkan jenis produk">
                                                <?php foreach ($jenis as $jns): ?>
                                                <?php if ($jns == $produk['jenis_produk']): ?>
                                                <option value="<?= $jns; ?>" selected><?= $jns; ?></option>
                                                <?php else: ?>
                                                <option value="<?= $jns; ?>"><?= $jns; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('jenis_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan_produk">Keterangan Produk</label>
                                            <textarea name="keterangan_produk" class="form-control"
                                                id="keterangan_produk" rows="3"
                                                placeholder="Masukkan keterangan produk"><?= $produk['keterangan_produk'] ?></textarea>
                                            <?= form_error('keterangan_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="stok_produk">Stok Produk</label>
                                            <input type="number" name="stok_produk" class="form-control"
                                                id="stok_produk" value="<?= $produk['stok_produk'] ?>"
                                                placeholder="Masukkan stok produk">
                                            <?= form_error('stok_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_produk">Harga Produk</label>
                                            <input type="number" step="0.01" name="harga_produk" class="form-control"
                                                id="harga_produk" value="<?= $produk['harga_produk'] ?>"
                                                placeholder="Masukkan harga produk">
                                            <?= form_error('harga_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="diskon_produk">Diskon Produk</label>
                                            <input type="number" name="diskon_produk" class="form-control"
                                                id="diskon_produk" value="<?= $produk['diskon_produk'] ?>"
                                                placeholder="Masukkan diskon produk">
                                            <?= form_error('diskon_produk', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Gambar Produk</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image"
                                                    value="<?= set_value('image'); ?>">
                                                <label class="custom-file-label" for="image">Pilih gambar produk</label>
                                                <small><?= $produk['image'] ?></small>
                                            </div>
                                            <?= form_error('image', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->