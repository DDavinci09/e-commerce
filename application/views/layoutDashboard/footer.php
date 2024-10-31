<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar Sekarang?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda ingin meninggalkan sesi ini? Klik "Logout" untuk keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url(); ?>Auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<footer class="main-footer">
    <div class="d-none d-sm-block">
        <!-- Copyright Section -->
        <div class="row">
            <div class="col text-center">
                &copy; 2024 E-Commerce. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
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
<script>
$(function() {
    $('#example1').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "paging": true, // Mengaktifkan pagination
        "searching": true, // Mengaktifkan pencarian
        "ordering": false, // Mengaktifkan pengurutan
        "info": true // Menampilkan informasi tabel
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<!-- Hapus Data Confirm -->
<script>
function deleteConfirmation(url) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        window.location.href = url;
    }
}
</script>

<!-- Ekko Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
<!-- Keterangan Pesanan -->
<script>
$(document).ready(function() {
    // Buat event listener dinamis untuk setiap dropdown status_pesanan
    $('[id^=status_pesanan]').each(function() {
        var pesananId = $(this).attr('id').split('_')[2]; // Ambil ID pesanan dari ID element
        var $statusPesanan = $('#status_pesanan_' + pesananId);
        var $keteranganPesanan = $('#keterangan_pesanan_' + pesananId);

        // Saat dropdown berubah
        $statusPesanan.change(function() {
            if ($(this).val() == 'Dibatalkan') {
                $keteranganPesanan.show();
            } else {
                $keteranganPesanan.hide();
            }
        });

        // Cek saat halaman dimuat apakah status 'Dibatalkan' sudah dipilih
        if ($statusPesanan.val() == 'Dibatalkan') {
            $keteranganPesanan.show();
        } else {
            $keteranganPesanan.hide();
        }
    });
});
</script>

<!-- Mendapatkan Provinsi dan Kota Asal -->
<script>
$(document).ready(function() {
    // Ambil data provinsi asal
    $.ajax({
        url: "<?php echo base_url('rajaongkir/get_provinces'); ?>",
        method: "GET",
        success: function(response) {
            const data = JSON.parse(response);
            if (data.status === 'success') {
                data.data.forEach(function(provinsi) {
                    $('#originProvince').append(
                        `<option value="${provinsi.province_id}">${provinsi.province}</option>`
                    );
                });
            }
        }
    });

    // Ambil kota asal berdasarkan provinsi asal
    $('#originProvince').change(function() {
        const provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "<?php echo base_url('rajaongkir/get_cities/') ?>" + provinceId,
                method: "POST",
                success: function(response) {
                    const data = JSON.parse(response);
                    $('#origin').empty().append(
                        "<option value=''>-- Pilih Kota Asal --</option>");
                    if (data.status === 'success') {
                        data.data.forEach(function(kota) {
                            $('#origin').append(
                                `<option value="${kota.city_id}">${kota.city_name}</option>`
                            );
                        });
                    }
                }
            });
        }
    });

    // Set nama provinsi ketika memilih provinsi
    $('#originProvince').change(function() {
        const selectedOption = $(this).find('option:selected');
        $('#namaProvinsi').val(selectedOption.text());
    });

    // Set nama kota ketika memilih kota
    $('#origin').change(function() {
        const selectedOption = $(this).find('option:selected');
        $('#namaKota').val(selectedOption.text());
    });
});
</script>


<!-- Script untuk menampilkan modal jika validasi gagal -->
<script>
$(document).ready(function() {
    <?php if ($this->session->flashdata('edit_modal')): ?>
    $('#editModal').modal('show');
    <?php endif; ?>
});
</script>
</body>

</html>