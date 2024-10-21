<h1>Hasil Ongkos Kirim</h1>
<p>Kurir: <?= $cost['rajaongkir']['results'][0]['name']; ?></p>
<ul>
    <?php foreach ($cost['rajaongkir']['results'][0]['costs'] as $service) : ?>
    <li><?= $service['service']; ?> - Ongkir: Rp<?= number_format($service['cost'][0]['value']); ?>, Estimasi:
        <?= $service['cost'][0]['etd']; ?> hari</li>
    <?php endforeach; ?>
</ul>