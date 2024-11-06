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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/home/css/style.css">
    <!-- Ekko Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

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

    .modal {
        z-index: 1055;
        /* Pastikan z-index lebih tinggi dari navbar */
    }

    .modal-backdrop {
        z-index: 1050;
        /* Pastikan backdrop modal di bawah modal tetapi di atas elemen lainnya */
    }

    .header_area {
        z-index: 1000;
        /* Pastikan navbar memiliki z-index lebih rendah dari modal */
    }

    /* Carousel */
    /* Style untuk tombol carousel dengan warna biru dan bentuk kotak */
    .custom-carousel-control {
        width: 50px;
        height: 50px;
        background-color: rgba(0, 123, 255, 0.8);
        /* Biru dengan transparansi */
        border-radius: 0;
        /* Hapus border-radius untuk bentuk kotak */
        top: 50%;
        /* Posisikan di tengah secara vertikal */
        transform: translateY(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        /* Warna icon putih */
    }

    .custom-carousel-control:hover {
        background-color: rgba(0, 123, 255, 1);
        /* Warna biru lebih pekat saat hover */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 20px 20px;
        /* Sesuaikan ukuran icon */
    }

    .carousel-control-prev {
        left: -25px;
        /* Sesuaikan jarak ke kiri */
    }

    .carousel-control-next {
        right: -25px;
        /* Sesuaikan jarak ke kanan */
    }

    /* Ukuran gambar default di layar besar */
    .custom-carousel-img {
        height: 500px;
        /* tinggi gambar untuk layar besar */
        object-fit: cover;
    }
    </style>


</head>

<body>