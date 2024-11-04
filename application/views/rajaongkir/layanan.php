<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pilih Kota Asal dan Tujuan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Pilih Kota Asal dan Tujuan</h1>

    <form action="#" method="post">
        <!-- Provinsi Asal -->
        <label for="provinceOrigin">Provinsi Asal:</label>
        <select id="provinceOrigin" name="provinceOrigin" required>
            <option value="">-- Pilih Provinsi Asal --</option>
        </select><br>

        <!-- Kota Asal -->
        <label for="cityOrigin">Kota Asal:</label>
        <select id="cityOrigin" name="cityOrigin" required>
            <option value="">-- Pilih Kota Asal --</option>
        </select><br>

        <!-- Provinsi Tujuan -->
        <label for="provinceDestination">Provinsi Tujuan:</label>
        <select id="provinceDestination" name="provinceDestination" required>
            <option value="">-- Pilih Provinsi Tujuan --</option>
        </select><br>

        <!-- Kota Tujuan -->
        <label for="cityDestination">Kota Tujuan:</label>
        <select id="cityDestination" name="cityDestination" required>
            <option value="">-- Pilih Kota Tujuan --</option>
        </select><br>

        <!-- Kurir -->
        <div class="form-group">
            <label for="courier">Kurir :</label>
            <select class="form-control" id="courier" name="courier" required>
                <option value="">-- Pilih Ekspedisi --</option>
                <option value="jne">JNE</option>
                <option value="pos">POS Indonesia</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>

        <!-- Layanan Ekspedisi -->
        <div class="form-group">
            <label for="service">Layanan Ekspedisi:</label>
            <select class="form-control" id="service" name="service" required>
                <option value="">-- Pilih Layanan Ekspedisi --</option>
            </select>
        </div>

        <script>
        $(document).ready(function() {
            // Mengambil layanan ekspedisi setelah kurir dipilih
            $('#courier').change(function() {
                let courier = $(this).val();
                let origin = $('#cityOrigin').val();
                let destination = $('#cityDestination').val();
                let weight = $('input[name="berat_pesanan"]').val();

                if (courier && origin && destination && weight) {
                    $.ajax({
                        url: "<?= base_url('Rajaongkir/get_costs') ?>",
                        type: "POST",
                        data: {
                            origin: origin,
                            destination: destination,
                            weight: weight,
                            courier: courier
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#service').empty().append(
                                '<option value="">-- Pilih Layanan Ekspedisi --</option>'
                            );

                            if (response.status === 'success') {
                                $.each(response.data, function(index, service) {
                                    $('#service').append(
                                        `<option value="${service.service}" data-cost="${service.cost[0].value}" data-estimate="${service.cost[0].etd}">${service.service} - Rp ${service.cost[0].value} (${service.cost[0].etd} hari)</option>`
                                    );
                                });
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });

            // Menampilkan estimasi waktu dan ongkir setelah memilih layanan ekspedisi
            $('#service').change(function() {
                let selectedOption = $(this).find('option:selected');
                let cost = selectedOption.data('cost');
                let estimate = selectedOption.data('estimate');

                // Tampilkan estimasi dan ongkir jika diperlukan
                console.log('Ongkir: Rp ' + cost);
                console.log('Estimasi waktu: ' + estimate + ' hari');
            });
        });
        </script>

</body>

</html>