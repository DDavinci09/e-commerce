-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2024 pada 19.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', '$2y$10$Ucs6.RdldG7PIbpXNt5vhuRu1p2yJWlXfS9LEbGTj422U7hYQErGm', 'BPVP', 'Admin'),
(2, 'admin2', '$2y$10$0fEqgmzCUhr9R47NgKGVJONIVBOKAzHkhI9S38YN93aUBzMmOdBWW', 'BPVP II', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `keterangan_toko` longtext NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `alamat_toko` longtext NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` enum('Approve','Decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `username`, `password`, `nama`, `email`, `nama_toko`, `keterangan_toko`, `no_telp`, `no_rekening`, `alamat_toko`, `role`, `status`) VALUES
(1, 'adit', '$2y$10$zlfU8Hr/xMX1ws69bM4YIuisfeecNSHdyBhHWej/vfaJrQDPIU9GS', 'Adit', 'adit@gmail.com', 'Toko Adit', 'Menjual Perlengkapan IT', '089999999999', '123999999999', 'Padang', 'Alumni', 'Approve'),
(2, 'rafli', '$2y$10$O8Z8LfGxKQfgKW2ufBpI.uvhx03sPOE.letuWU7eja3xNi4Cgtt5C', 'Rafli', 'rafli@gmail.com', 'Toko Raflie', 'Jasa pembuatan sistem informasi berbasis web, desktop, dan mobile.', '098888888888', '123888888888', 'Bukittinggi', 'Alumni', 'Approve'),
(3, 'reska', '$2y$10$Py/b3QTGWnWeqISQ0xZlkeklDhRL5Vq5OPd8lOCuF/aGuqPiFYO6a', 'Reska', 'reska@gmail.com', 'Toko PC Reska', 'Menjual perlengkapan PC, Laptop dan lainnya', '0877777777', '123321231', 'Batusangkar', 'Alumni', 'Approve'),
(4, 'hafiz', '$2y$10$/XbPPhM1RxtPvIZ0IS5aL.xpAx87SP3OKXi0oKI2y/Fe3Z6IpTgoa', 'hafiz', 'hafiz@gmail.com', 'Toko hafiz', 'menjual apa saja', '087777777', '8732367812', 'Payakumbuh', 'Alumni', 'Approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan_kategori` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`) VALUES
(1, 'Pembuatan Aplikasi Web', 'Proses pembuatan dan pemeliharaan situs web, termasuk front-end dan back-end development.'),
(2, 'Laptop dan Notebook', 'Menjual beraneka jenis merk Laptop dan Notebook'),
(3, 'Desain Grafis', 'Jasa pembuatan desain grafis untuk berbagai keperluan.'),
(4, 'Hardware PC', 'Menjual perangkat keras untuk komputer/PC.'),
(5, 'Penulisan Artikel dan Jurnal', 'Jasa pembuatan artikel dan jurnal.'),
(6, 'Pembuatan Aplikasi Android', 'Jasa pembuatan aplikasi berbasis Android.'),
(7, 'Software PC', 'Menjual beraneka jenis software untuk komputer/PC.'),
(8, 'Smartphone/HP', 'Menjual beraneka jenis Smartphone/HP dari berbagai Merk.'),
(9, 'Pakaian', 'Menjual pakaian berbagai merk\r\n'),
(10, 'Kipas dan AC', 'Menjual kipas dan ac dari yang terbaru dan juga second');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `tgl_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jml_pesanan` int(11) NOT NULL,
  `harga_pesanan` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `id_user`, `id_alumni`, `tgl_pesanan`, `jml_pesanan`, `harga_pesanan`, `total_pembayaran`, `pembayaran`, `bukti_bayar`, `status_bayar`, `status_pesanan`) VALUES
(1, 5, 1, 3, '2024-09-24 16:08:11', 3, 8000000, 24000000, 'Transfer Bank', 'Bukti_Bayar_21.pdf', 'Lunas', 'Selesai'),
(2, 12, 1, 3, '2024-09-24 16:09:55', 5, 1500000, 7500000, 'COD', 'Bukti_bayar_11.png', 'Lunas', 'Selesai'),
(3, 17, 1, 1, '2024-09-24 17:05:35', 1, 270000, 270000, 'Transfer Bank', 'Bukti_Bayar_2.pdf', 'Lunas', 'Selesai'),
(6, 16, 1, 1, '2024-09-24 17:05:29', 1, 1125000, 1125000, 'Transfer Bank', 'Bukti_bayar_1.png', 'Lunas', 'Selesai'),
(7, 7, 2, 2, '2024-09-24 16:53:09', 1, 750000, 750000, 'Transfer Bank', 'Bukti_bayar_13.png', 'Lunas', 'Selesai'),
(8, 20, 2, 2, '2024-09-24 16:36:01', 1, 6300000, 6300000, 'Transfer Bank', '', 'Belum Bayar', 'Diproses'),
(9, 11, 2, 2, '2024-09-24 16:52:21', 1, 675000, 675000, 'Transfer Bank', 'Bukti_Bayar_22.pdf', 'Lunas', 'Selesai'),
(10, 15, 2, 1, '2024-09-26 07:23:01', 5, 70000, 350000, 'Transfer Bank', 'Bukti_Bayar_23.pdf', 'Lunas', 'Diproses'),
(11, 19, 2, 1, '2024-09-24 17:05:17', 10, 250000, 2500000, 'COD', 'Bukti_bayar_12.png', 'Lunas', 'Selesai'),
(12, 4, 2, 3, '2024-09-25 04:42:37', 6, 3120000, 18720000, 'COD', 'Bukti_Bayar_24.pdf', 'Lunas', 'Selesai'),
(13, 5, 2, 3, '2024-09-26 16:57:38', 3, 8000000, 24000000, 'Transfer Bank', 'Bukti_bayar_14.png', 'Lunas', 'Selesai'),
(14, 2, 2, 1, '2024-09-25 04:42:59', 1, 300000, 300000, 'Transfer Bank', '', 'Belum Bayar', 'Diproses'),
(15, 22, 4, 3, '2024-09-26 16:21:13', 3, 800000, 2400000, 'Transfer Bank', 'Bukti_bayar_15.png', 'Lunas', 'Selesai'),
(16, 22, 4, 3, '2024-09-26 16:23:45', 1, 800000, 800000, 'COD', 'Bukti_Bayar_25.pdf', 'Lunas', 'Selesai'),
(17, 23, 4, 3, '2024-09-26 16:41:04', 4, 156000, 624000, 'Transfer Bank', 'Bukti_bayar_16.png', 'Lunas', 'Selesai'),
(18, 23, 1, 3, '2024-09-26 16:42:24', 2, 156000, 312000, 'COD', 'Bukti_Bayar_26.pdf', 'Lunas', 'Selesai'),
(19, 23, 2, 3, '2024-09-26 16:43:49', 12, 156000, 1872000, 'Transfer Bank', 'Bukti_Bayar_27.pdf', 'Lunas', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_alumni` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `keterangan_produk` longtext NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `diskon_produk` int(11) NOT NULL,
  `rating_produk` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_alumni`, `id_kategori`, `nama_produk`, `jenis_produk`, `keterangan_produk`, `stok_produk`, `harga_produk`, `diskon_produk`, `rating_produk`, `image`, `create_at`, `update_at`) VALUES
(1, 1, 7, 'Adobe Photoshop', 'Barang', 'Software pengeditan foto dan desain grafis terkemuka yang digunakan oleh fotografer, desainer, dan profesional kreatif untuk mengedit gambar dan membuat desain digital.', 400, 2000000, 30, 0, 'photoshop.jpg', '2024-09-24 07:31:45', '2024-09-24 07:32:55'),
(2, 1, 7, 'WinRAR', 'Barang', 'Alat kompresi file yang memungkinkan pengguna untuk mengarsipkan dan mengekstrak file dengan format RAR, ZIP, dan format arsip lainnya.', 349, 500000, 40, 0, 'winrar.jpg', '2024-09-24 07:34:41', '2024-09-24 07:35:39'),
(3, 1, 4, 'NVIDIA GeForce RTX 3080', 'Barang', 'Graphics Card (GPU) kelas atas dari NVIDIA dengan memori GDDR6X 10GB, ideal untuk gaming 4K dan rendering video. Mendukung ray tracing dan DLSS.', 400, 15000000, 70, 0, 'gtx.png', '2024-09-24 07:39:14', '2024-09-24 07:39:14'),
(4, 3, 4, 'Intel Core i7-11700K', 'Barang', 'Prosesor Intel generasi ke-11 dengan 8 core dan 16 thread, kecepatan hingga 5.0 GHz. Ideal untuk gaming, content creation, dan multitasking berat.', 294, 5200000, 40, 0, 'i7.jpg', '2024-09-24 07:42:14', '2024-09-24 07:42:14'),
(5, 3, 2, 'Lenovo IdeaPad 5', 'Barang', 'Laptop tipis dan ringan dengan layar 14 inci Full HD, didukung oleh prosesor Intel Core i5-1135G7 (generasi ke-11), 8GB RAM, dan SSD 512GB. Cocok untuk produktivitas sehari-hari dan multitasking ringan.', 524, 10000000, 20, 4, 'lenovo.jpg', '2024-09-24 07:44:55', '2024-09-24 07:44:55'),
(6, 3, 8, 'Samsung Galaxy S23 Ultra', 'Barang', 'Smartphone flagship dari Samsung dengan layar Dynamic AMOLED 6,8 inci, prosesor Exynos 2200, RAM 12GB, penyimpanan 256GB, dan kamera utama 200MP. Mendukung S Pen dan memiliki baterai 5000mAh.', 330, 20000000, 60, 0, 'samsung.jpg', '2024-09-24 07:46:43', '2024-09-24 07:48:28'),
(7, 2, 1, 'Website E-Commerce', 'Jasa', 'Layanan pembuatan website e-commerce profesional dengan fitur lengkap, termasuk manajemen produk, pembayaran online, dan integrasi dengan kurir. Termasuk desain responsif dan SEO-friendly.', 299, 1000000, 25, 4, '', '2024-09-24 07:59:08', '2024-09-24 07:59:08'),
(8, 2, 6, 'Aplikasi Android Booking Service', 'Jasa', 'Aplikasi Android untuk layanan booking (misalnya salon, spa, atau restoran). Fitur mencakup jadwal booking, notifikasi pengingat, dan manajemen user. Desain responsif dan user-friendly.', 400, 15000000, 0, 0, '', '2024-09-24 08:00:02', '2024-09-24 08:00:02'),
(9, 2, 1, 'Website Portfolio Pribadi', 'Jasa', 'Pembuatan website pribadi untuk menampilkan portfolio profesional. Dilengkapi dengan halaman tentang, kontak, dan galeri untuk memamerkan karya. Cocok untuk freelancer, fotografer, dan desainer.', 500, 5000000, 55, 0, '', '2024-09-24 08:00:49', '2024-09-24 08:00:49'),
(10, 2, 3, 'Desain Logo Perusahaan', 'Jasa', 'Layanan desain logo profesional untuk bisnis atau perusahaan, termasuk 3 opsi desain dan 2 kali revisi. Format final disediakan dalam berbagai format (PNG, JPG, dan vector).', 350, 4500000, 20, 0, '', '2024-09-24 08:02:30', '2024-09-24 08:02:30'),
(11, 2, 3, 'Desain Poster Event', 'Jasa', ' Jasa pembuatan poster untuk acara/event, dengan desain menarik yang disesuaikan untuk promosi online dan cetak. Dapat disesuaikan dengan identitas branding acara.', 399, 750000, 10, 3, '', '2024-09-24 08:02:32', '2024-09-24 08:05:40'),
(12, 3, 8, 'Vivo X80 Pro', 'Barang', 'HP flagship dengan layar AMOLED 6,78 inci, prosesor Qualcomm Snapdragon 8 Gen 1, RAM 12GB, penyimpanan 256GB, dan kamera 50MP dengan teknologi ZEISS Optics.', 245, 1500000, 0, 4, 'vivo.jpg', '2024-09-24 08:40:05', '2024-09-24 08:40:05'),
(13, 3, 2, 'Lenovo Legion 7i', 'Barang', 'Laptop gaming kelas atas dengan layar 15,6 inci Full HD 240Hz, prosesor Intel Core i9-10980HK, kartu grafis NVIDIA RTX 2080 Super, RAM 32GB, dan SSD 1TB. Dirancang untuk gamer hardcore dan content creator.', 100, 45000000, 70, 0, 'Lenovo_Legion_7i.jpg', '2024-09-24 08:41:43', '2024-09-24 08:41:56'),
(14, 3, 4, 'ASUS TUF Gaming VG27AQ 27\" 2K 165Hz', 'Barang', 'Monitor gaming 27 inci dengan resolusi 2K (2560x1440), refresh rate 165Hz, dan dukungan G-Sync. Cocok untuk gaming kompetitif dan visual berkualitas tinggi.', 350, 7500000, 50, 0, 'asusmonitor.jpg', '2024-09-24 08:44:33', '2024-09-24 08:44:33'),
(15, 1, 7, 'Microsoft Office 365', 'Barang', 'Suite produktivitas yang mencakup aplikasi seperti Word, Excel, PowerPoint, dan Outlook. Berbasis langganan dan menyertakan penyimpanan cloud OneDrive.', 535, 100000, 30, 0, 'Office365.jpg', '2024-09-24 08:46:36', '2024-09-24 08:46:36'),
(16, 1, 7, 'CorelDRAW Graphics Suite', 'Barang', 'Software desain grafis yang digunakan untuk ilustrasi vektor, layout, pengeditan foto, dan typography, populer di kalangan desainer grafis dan profesional kreatif.', 299, 1500000, 25, 5, 'coreldraw.jpg', '2024-09-24 08:47:44', '2024-09-24 08:47:44'),
(17, 1, 7, 'CCleaner', 'Barang', 'Alat optimasi sistem yang membantu membersihkan file sampah, cache, dan registry pada PC, serta mengoptimalkan performa komputer.', 249, 300000, 10, 4, 'ccleaner.png', '2024-09-24 08:49:49', '2024-09-24 08:49:49'),
(18, 1, 4, 'Cooler Master MasterLiquid ML240L RGB', 'Barang', 'Sistem pendingin cair untuk CPU dengan radiator 240mm dan dua kipas RGB, memberikan pendinginan yang efektif dan suara kipas yang rendah.', 45, 1400000, 45, 0, 'coolersistem.jpg', '2024-09-24 08:51:49', '2024-09-24 08:51:49'),
(19, 1, 4, 'Logitech M241 Mouse Wireless Bluetooth', 'Barang', 'Mouse ramping yang nyaman dan dapat dibawa bepergian ini cukup kecil untuk dimasukkan ke dalam tas. Desainnya yang sangat cerdas akan memandu tangan kanan atau kirimu ke posisi yang nyaman.\r\nMouse Bluetooth dengan jangkauan jauh yang andal ini dapat digunakan hingga 10m dari komputermu.', 340, 250000, 0, 0, 'mouselogitetch.jpg', '2024-09-24 08:55:15', '2024-09-24 08:55:28'),
(20, 2, 1, 'Website Perusahaan', 'Jasa', ' Layanan pembuatan website perusahaan dengan desain modern, halaman profil, layanan, dan blog. Termasuk manajemen konten (CMS) dan optimasi SEO dasar.', 449, 9000000, 30, 0, '', '2024-09-24 08:56:47', '2024-09-24 08:56:47'),
(21, 2, 6, 'Aplikasi Android E-Commerce', 'Jasa', 'Layanan pengembangan aplikasi Android untuk e-commerce. Fitur termasuk katalog produk, keranjang belanja, checkout, dan notifikasi push. Integrasi pembayaran online dan manajemen produk.', 40, 1500000, 20, 0, '', '2024-09-24 08:57:48', '2024-09-24 08:57:48'),
(22, 3, 4, 'Printer epson', 'Barang', 'Printer terbaru', 2, 1000000, 20, 5, 'printeredpson.jpg', '2024-09-25 04:40:45', '2024-09-25 04:41:12'),
(23, 3, 10, 'Maspion Kipas Angin Meja', 'Barang', 'Maspion Desk fan 12 Inch EF-30 P2 :\r\n\r\n• BLADE SIZE : 300 mm (12”)\r\n\r\n• VOLTAGE : 220V~ 50Hz\r\n\r\n• WATTAGE : 40W\r\n\r\n• MANUAL SWITCH ( 3 SPEED & OFF )\r\n\r\n• L - R OSCILLATION\r\n\r\n• THERMOFUSE PROTECTION\r\n\r\n• RPM : 1190 - 1400 Rpm/Min.\r\n\r\n• AIR VELOCITY : 246 M/Min. 3\r\n\r\n• AIR DELIVERY : 48 M /Min. E', 212, 240000, 35, 2, 'kipasberu.jpg', '2024-09-26 16:33:06', '2024-09-26 16:33:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_review` longtext NOT NULL,
  `rating_review` int(11) NOT NULL,
  `tgl_review` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_produk`, `id_user`, `isi_review`, `rating_review`, `tgl_review`) VALUES
(1, 12, 1, 'Produk baik dan cukup puas dengan pesanannya.', 4, '2024-09-24 16:32:03'),
(2, 5, 1, 'Produk sesuai dengan deskripsi, sangat puas dengan pesanan', 5, '2024-09-24 16:33:54'),
(3, 11, 2, 'Pembuatan Logo yang profesional dengan hasil yang sesuai harapan', 3, '2024-09-24 16:54:27'),
(4, 7, 2, 'Website e-commerce memberi kemudahan untuk melakukan transanlsi online', 4, '2024-09-24 16:55:47'),
(5, 5, 2, 'Produk cukup bagus sesuai deskripsi', 3, '2024-09-24 17:00:46'),
(6, 16, 1, 'Produk sesuai dengan deskripsi dan orisinil', 5, '2024-09-24 17:19:42'),
(7, 17, 1, 'Produk orisinil', 4, '2024-09-24 17:20:05'),
(8, 22, 4, 'Puas dengan barang', 5, '2024-09-26 16:21:50'),
(9, 23, 4, 'produk kw', 2, '2024-09-26 16:41:23'),
(10, 23, 1, 'lumayan bagus walau kw', 3, '2024-09-26 16:42:54'),
(11, 23, 2, 'Buruk sekali', 1, '2024-09-26 16:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_user`, `no_telp`, `role`) VALUES
(1, 'derry', '$2y$10$aXTw2VdP3Li0MG277VB5..J8IIU4g/b.OcgIN6vxki.G5UduJukaO', 'derry@gmail.com', 'Derry', '08777777723', 'User'),
(2, 'reza', '$2y$10$49R33m2MYikn6qNHb1pQYuekstc1TzyzOeVHHasnNJAOBqWQhl7HW', 'reza@gmail.com', 'Reza', '08666653333', 'User'),
(3, 'ando', '$2y$10$KXOV01FLre4s3JTa.cjMG.AzFtnkgvA5zYb/EkBLVIbjd5lI3lvtm', 'ando@gmail.com', 'Ando', '08655532532', 'User'),
(4, 'fizi', '$2y$10$Oc9ffA9URO9zkQvXT8IUKOBfOvkaJT94XcsKvt6Ud4JfEXFO/x8Sa', 'fizi@gmail.com', 'fizi', '123123123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
