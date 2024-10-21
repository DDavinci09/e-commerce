<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
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



</body>

</html>