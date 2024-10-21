<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ongkos Kirim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Cek Ongkos Kirim</h2>
        <form id="ongkirForm">
            <div class="form-group">
                <label for="origin">Kota Asal:</label>
                <select class="form-control" id="origin" name="origin" required>
                    <option value="">-- Pilih Kota Asal --</option>
                    <!-- Options kota asal akan diisi dengan JavaScript -->
                </select>
            </div>

            <div class="form-group">
                <label for="destination">Kota Tujuan:</label>
                <select class="form-control" id="destination" name="destination" required>
                    <option value="">-- Pilih Kota Tujuan --</option>
                    <!-- Options kota tujuan akan diisi dengan JavaScript -->
                </select>
            </div>

            <div class="form-group">
                <label for="weight">Berat (gram):</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Masukkan berat barang"
                    required>
            </div>

            <div class="form-group">
                <label for="courier">Ekspedisi:</label>
                <select class="form-control" id="courier" name="courier" required>
                    <option value="">-- Pilih Ekspedisi --</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS Indonesia</option>
                    <option value="tiki">TIKI</option>
                    <!-- Tambahkan ekspedisi lain sesuai kebutuhan -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cek Ongkir</button>
        </form>

        <div id="result" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // Ambil data kota asal dan tujuan
        $.ajax({
            url: "<?php echo base_url('rajaongkir/get_provinces'); ?>",
            method: "GET",
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    // Mengisi data kota asal dan kota tujuan
                    data.data.forEach(function(provinsi) {
                        $('#origin').append(
                            `<option value="${provinsi.province_id}">${provinsi.province}</option>`
                        );
                        $('#destination').append(
                            `<option value="${provinsi.province_id}">${provinsi.province}</option>`
                        );
                    });
                }
            }
        });

        // Ambil kota berdasarkan provinsi
        $('#origin').change(function() {
            const provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: "<?php echo base_url('rajaongkir/get_cities/') ?>" + provinceId,
                    method: "POST",
                    success: function(response) {
                        const data = JSON.parse(response);
                        $('#destination').empty().append(
                            "<option value=''>-- Pilih Kota Tujuan --</option>");
                        if (data.status === 'success') {
                            data.data.forEach(function(kota) {
                                $('#destination').append(
                                    `<option value="${kota.city_id}">${kota.city_name}</option>`
                                );
                            });
                        }
                    }
                });
            }
        });

        // Submit form untuk cek ongkos kirim
        $('#ongkirForm').submit(function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?php echo base_url('rajaongkir/get_shipping_cost'); ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    const data = JSON.parse(response);
                    let resultHtml = '';
                    if (data.status === 'success') {
                        data.data[0].costs.forEach(function(cost) {
                            resultHtml +=
                                `<p>${cost.service} - Rp. ${cost.cost[0].value} (Estimasi: ${cost.cost[0].etd} hari)</p>`;
                        });
                    } else {
                        resultHtml = `<p>${data.message}</p>`;
                    }
                    $('#result').html(resultHtml);
                }
            });
        });
    });
    </script>

</body>

</html>