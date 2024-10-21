<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Daftar Kota</h2>

        <?php if (isset($error_message)): ?>
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($cities)): ?>
        <div class="form-group">
            <label for="city">Pilih Kota:</label>
            <select class="form-control" id="city" name="city">
                <option value="">-- Pilih Kota --</option>
                <?php foreach ($cities as $city): ?>
                <option value="<?php echo $city['city_id']; ?>">
                    <?php echo $city['city_name']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>