<!-- Footer -->
<footer class="main-footer bg-primary text-white mt-5 pt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h5>Tentang Kami</h5>
                <p>E-Commerce kami menyediakan berbagai macam produk berkualitas tinggi dengan harga terjangkau. Kami
                    berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Produk</a></li>
                    <li><a href="#" class="text-white">Kontak</a></li>
                    <li><a href="#" class="text-white">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact & Social Media Section -->
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p>Email: support@ecommerce.com</p>
                <p>Telepon: +62 123 456 789</p>
                <h5>Ikuti Kami</h5>
                <div>
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <hr class="bg-light">

        <!-- Copyright Section -->
        <div class="row">
            <div class="col text-center">
                <p>&copy; 2024 E-Commerce. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script></script>
<script>
$(document).ready(function() {
    // Initialize DataTables
    var table = $('#productsTable').DataTable();

    // Extract data from DataTables and inject into cards
    var products = table.rows().data().toArray();
    var $productCards = $('#productCards');

    products.forEach(function(product) {
        var cardHtml = `
                    <div class="card product-card">
                        <img src="${product[0]}" class="card-img-top product-img" alt="${product[1]}">
                        <div class="card-body">
                            <h5 class="card-title">${product[1]}</h5>
                            <p class="card-text">${product[2]}</p>
                            <a href="#" class="btn btn-primary">${product[3]}</a>
                        </div>
                    </div>
                `;
        $productCards.append(cardHtml);
    });
});
</script>
</body>

</html>