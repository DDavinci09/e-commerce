<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Home</title>
    <link rel="icon" href="<?= base_url('assets'); ?>/home/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/css/style.css">
    <!-- Ekko Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- Diskon -->
    <style>
    .discount-badge {
        position: absolute;
        /* Memungkinkan badge untuk diposisikan di sudut */
        top: 10px;
        /* Jarak dari atas */
        right: 10px;
        /* Jarak dari kanan */
        background-color: rgba(255, 0, 0, 0.8);
        /* Warna latar belakang dengan transparansi */
        color: #fff;
        /* Warna teks badge */
        padding: 5px 10px;
        /* Menambahkan padding untuk memberikan ruang di dalam badge */
        border-radius: 15px;
        /* Membulatkan sudut badge */
        font-size: 1em;
        /* Ukuran font badge */
    }
    </style>
    <style>
    .nav-item.active .nav-link {
        font-weight: bold;
        /* Mengatur tulisan menjadi bold */
    }

    .btncustom {
        background-color: #384AEB;
        color: white;

    }

    .btncustom:hover {
        background-color: #091057;
        color: gray;

    }

    .btncustomSrc {
        background-color: #384AEB;
        color: white;

    }

    .btncustomSrc:hover {
        background-color: #091057;
        color: gray;
    }

    .inputcustom {
        height: 38px;
    }

    .form-control {
        height: 40px;
        /* Tinggi yang seragam */
        line-height: 40px;
        /* Sesuaikan line-height dengan tinggi */
        padding: 0 12px;
        /* Sesuaikan padding dalam select */
    }

    /* Khusus untuk option di dalam select */
    select.form-control option {
        height: 40px;
        /* Sesuaikan tinggi option */
        line-height: 40px;
        /* Pastikan line-height option sama */
    }

    .btnbelicustom {
        margin-top: 24px;
        height: 40px;
        /* Sesuaikan dengan input dan select */
        line-height: 40px;
        /* Pastikan teks di dalamnya rata */
        padding: 0 20px;
        /* Padding horizontal */
    }

    .sidebar-categories a {
        color: black;
    }

    .sidebar-categories a:hover {
        color: #384AEB;
    }
    </style>
</head>

<body>