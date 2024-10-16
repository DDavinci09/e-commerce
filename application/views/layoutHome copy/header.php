<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce : Home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ekko Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- Diskon -->
    <style>
    .discount-badge {
        position: absolute;
        top: 10px;
        /* Jarak dari atas */
        right: 10px;
        /* Jarak dari kanan */
        background-color: red;
        /* Ubah sesuai dengan desain kamu */
        color: white;
        /* Warna teks logo diskon */
        padding: 5px;
        /* Kurangi padding untuk ukuran badge yang lebih kecil */
        border-radius: 50%;
        /* Membuat badge menjadi bulat */
        text-align: center;
        font-size: 10px;
        /* Kecilkan ukuran font */
        font-weight: bold;
        width: 30px;
        /* Sesuaikan lebar badge */
        height: 30px;
        /* Sesuaikan tinggi badge */
        line-height: 30px;
        /* Atur tinggi badge agar teks berada di tengah */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    </style>
    <!-- BG Image -->
    <style>
    /* Atur background image */
    .content-wrapper {
        background-image: url('<?= base_url("assets/dist/img/bg2.jpg"); ?>');
        background-size: cover;
        /* Membuat background memenuhi layar */
    }

    .carousel-control-prev,
    .carousel-control-next {
        top: 70%;
        /* Mengubah posisi vertikal tombol */
        transform: translateY(-50%);
        /* Memastikan tombol tetap terpusat secara vertikal */
    }
    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-fixed"
    style="font-family: 'Times New Roman', serif;">
    <div class="wrapper">