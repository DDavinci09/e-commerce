<!-- ================ category section start ================= -->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>SHOP</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <!-- Start Filter Bar -->
                            <div class="filter-bar" style="background-color: #384AEB;">
                                <div class="row">
                                    <div class="col text-left mt-1" id="toggleSidebar">
                                        <h5 class="btn btn-primary" style="color: white;"> <i
                                                class="fas fa-chevron-down" style="color: white;"></i> Kategori :
                                            <?= $title; ?>
                                        </h5>
                                    </div>
                                    <div class="col text-right mt-1">
                                        <h5 style="color:white;">Total Produk : <?= $totalproduk; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Filter Bar -->
                            <!-- Start Best Seller -->
                            <section class="lattest-product-area category-list">
                                <div class="row">
                                    <?php 
                                // Tentukan controller berdasarkan peran
                                $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                                foreach ($produk as $p): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card text-center card-product">
                                            <div class="card-product__img"
                                                style="aspect-ratio: 1 / 1; width: 100%; overflow: hidden;">
                                                <?php if ($p['diskon_produk'] > 0 ) { ?>
                                                <div class="discount-badge">
                                                    <?= $p['diskon_produk'] ?>%
                                                </div>
                                                <?php } ?>
                                                <?php if (!$p['image']) { ?>
                                                <img class="card-img"
                                                    src="<?= base_url('./assets/upload/produk/no_image.jpg') ?>" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                <?php } else { ?>
                                                <img class="card-img"
                                                    src="<?= base_url('./assets/upload/produk/') . $p['image']; ?>"
                                                    alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                                <?php } ?>
                                                <ul class="card-product__imgOverlay">
                                                    <li><a
                                                            href="<?= base_url($controller . '/detail/' . urlencode($p['id_produk'])) ?>"><button><i
                                                                    class="ti-search"></i></button></a></li>
                                                    <li><button><i class="ti-shopping-cart"></i></button></li>
                                                    <li><button><i class="ti-heart"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <p><?= $p['nama_kategori']; ?></p>
                                                <?php 
                    $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
                ?>
                                                <h4 class="card-product__title"><a
                                                        href="<?= base_url($controller . '/detail/' . urlencode($p['id_produk'])) ?>"><?= $p['nama_produk']; ?></a>
                                                </h4>
                                                <p class="card-product__price">
                                                    <?php if ($p['diskon_produk'] > 0 ) { ?>
                                                    <span
                                                        class="text-danger">Rp.<?= number_format($p['harga_diskon'], 0, ',', '.'); ?></span>
                                                    |
                                                    <span
                                                        class="text-muted text-decoration-line-through small"><s><?= number_format($p['harga_produk'], 0, ',', '.'); ?></s></span>
                                                    <?php } else { ?>
                                                    <span>Rp.<?= number_format($p['harga_produk'], 0, ',', '.'); ?></span>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                    <?php if(!$produk) { ?>
                                    <div class="col">
                                        <div class="card text-center" style="width: 100%;">
                                            <div class="row">
                                                <div class="col">
                                                    <h1 style=" color: gray;">Tidak ada produk</h1>
                                                    <p>Maaf, tidak ada produk yang tersedia saat ini.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </section>
                            <!-- End Best Seller -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ================ category section end ================= -->

<!-- Sidebar Kategori -->
<div class="sidebar" id="kategoriSidebar" style="display: none;">
    <div class="row">
        <button class="close-sidebar" id="closeSidebar"
            style="float: right; background: none; border: none; color: #007bff;">
            <i class="fas fa-times"></i> <!-- Ikon untuk menutup -->
        </button>
        <div class="col">
            <h5>Kategori Produk</h5>
        </div>
    </div>
    <ul class="main-categories">
        <?php 
        // Tentukan controller berdasarkan peran
        $controller = ($this->session->userdata('role') !== 'User') ? 'Home' : 'User';
        ?>
        <li class="filter-list">
            <a href="<?= base_url($controller . '/shop/') ?>">Semua Kategori</a>
        </li>
        <?php foreach ($kategori as $kt) : ?>
        <li class="filter-list">
            <a href="<?= base_url($controller . '/getKategoriProduk/' . urlencode($kt['id_kategori'])) ?>">
                <?= $kt['nama_kategori'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<style>
.sidebar {
    position: fixed;
    /* Mengatur sidebar tetap pada satu tempat */
    top: 0;
    right: 0;
    /* Letakkan di sebelah kanan */
    width: 250px;
    /* Lebar sidebar */
    height: 100%;
    /* Tinggi penuh */
    background-color: #f8f9fa;
    /* Warna latar belakang */
    border-left: 1px solid #ddd;
    /* Garis pemisah */
    padding: 15px;
    /* Jarak di dalam sidebar */
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    /* Bayangan sidebar */
    z-index: 1000;
    /* Agar tetap di atas konten lainnya */
}
</style>

<script>
document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('kategoriSidebar');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
        sidebar.style.display = 'block'; // Tampilkan sidebar
    } else {
        sidebar.style.display = 'none'; // Sembunyikan sidebar
    }
});

document.getElementById('closeSidebar').addEventListener('click', function() {
    document.getElementById('kategoriSidebar').style.display = 'none'; // Sembunyikan sidebar
});
</script>