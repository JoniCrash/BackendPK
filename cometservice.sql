-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2025 pada 22.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cometservice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adm`
--

CREATE TABLE `adm` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adm`
--

INSERT INTO `adm` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'iwan', 'iwan', 'iwan', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `kecepatan` varchar(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `kecepatan`, `harga`) VALUES
(1, 'Lite', '30 MBPS', 250000.00),
(2, 'Family', '50 MBPS', 320000.00),
(3, 'Max', '100 MBPS', 500000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nomor_Identitas_KTP` varchar(20) NOT NULL,
  `Alamat_Pemasangan` varchar(255) NOT NULL,
  `provinsi` varchar(10) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nomor_Hp_1` varchar(20) NOT NULL,
  `Nomor_Hp_2` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `Foto_KTP` varchar(255) NOT NULL,
  `Foto_Depan_Rumah` varchar(255) NOT NULL,
  `Status` enum('Aktif','NonAktif','','') NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `provinsi`, `kota`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `Foto_KTP`, `Foto_Depan_Rumah`, `Status`, `dibuat_pada_`) VALUES
(3015, 'maskina', '3274035003720009', 'Perumahan Grand Firdaus Residance 2 blok E-11, Mundumesigit, Kec. Mundu, Kabupaten Cirebon, Jawa Barat 45173, Indonesia', 'Jawa Barat', 'Cirebon', -6.767365, 108.591789, 'maskina@gmail.com', '089694375484', '089694375484', 2, 'fotoktp_3015.jpg', 'fotoDepanRumah_3015.jpg', 'Aktif', '2025-05-01'),
(3016, 'Lukman pratin', '3209196607850003', 'Jl. Kanggraksan Selatan No.15, RT.05 RT02, Harjamukti, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45143, Indonesia', 'Jawa Barat', 'Cirebon', -6.741460, 108.546570, 'Lukmanpratin@gmail.com', '083461845273', '083461845273', 1, 'fotoktp_3016.jpg', 'fotoDepanRumah_3016.jpg', 'Aktif', '2025-05-01'),
(3017, 'haryanto', '3274051611870008', 'Jl. Perjuangan III, Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45131, Indonesia', 'Jawa Barat', 'Cirebon', -6.732336, 108.530655, 'haryanto@gmail.com', '081315070711', '081315070711', 3, 'fotoktp_3017.jpg', 'fotoDepanRumah_3017.jpg', 'Aktif', '2025-05-01'),
(3018, 'ferry ferdiansyah', '3274031710830005', 'Jl. Saladara, Karyamulya, Kec. Kesambi, Kota Cirebon, Jawa Barat 45135, Indonesia', 'Jawa Barat', 'Cirebon', -6.745041, 108.528030, 'ferry@gmail.com', '0895351463838', '0895351463838', 2, 'fotoktp_3018.jpg', 'fotoDepanRumah_3018.jpg', 'Aktif', '2025-05-01'),
(3019, 'Mochammad teguh ramadhan', '3210171501990001', 'Jl. Kapuk VIII No.e49, Kedawung, Kec. Kedawung, Kabupaten Cirebon, Jawa Barat 45153, Indonesia', 'Jawa Barat', 'Cirebon', -6.716309, 108.528801, 'teguh@gmail.com', '082130545108', '082130545108', 1, 'fotoktp_3019.jpg', 'fotoDepanRumah_3019.jpg', 'Aktif', '2025-05-01'),
(3020, 'Rafael mikko wenzelo', '3274051206070002', 'Jl. Tentara Pelajar No.9, Pekiringan, Kec. Kesambi, Kota Cirebon, Jawa Barat 45131, Indonesia', 'Jawa Barat', 'Cirebon', -6.715886, 108.556259, 'rafael@gmail.com', '0895320173461', '0895320173461', 2, 'fotoktp_3020.jpg', 'fotoDepanRumah_3020.jpg', 'Aktif', '2025-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(10) NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `Status` enum('Lunas','BelumLunas','') NOT NULL DEFAULT 'BelumLunas',
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_tagihan`, `bukti_pembayaran`, `periode`, `Status`, `dibuat_pada_`) VALUES
(5009, 4007, 'bukti_5009_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01'),
(5010, 4008, 'bukti_5010_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01'),
(5011, 4009, 'bukti_5011_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01'),
(5012, 4010, 'bukti_5012_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01'),
(5013, 4011, 'bukti_5013_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01'),
(5014, 4012, 'bukti_5014_May_2025.jpg', 'May_2025', 'Lunas', '2025-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nomor_Identitas_KTP` varchar(20) NOT NULL,
  `Alamat_Pemasangan` varchar(255) NOT NULL,
  `provinsi` varchar(10) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nomor_Hp_1` varchar(20) NOT NULL,
  `Nomor_Hp_2` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `kecepatan` varchar(11) NOT NULL,
  `Foto_KTP` varchar(255) NOT NULL,
  `Foto_Depan_Rumah` varchar(255) NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('Belum Lunas','Lunas','','') NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pelanggan`, `id_paket`, `periode`, `total_harga`, `status`, `dibuat_pada_`) VALUES
(4007, 3015, 2, '', 320000.00, 'Belum Lunas', '2025-05-01'),
(4008, 3016, 1, '', 250000.00, 'Belum Lunas', '2025-05-01'),
(4009, 3017, 3, '', 500000.00, 'Belum Lunas', '2025-05-01'),
(4010, 3018, 1, '', 250000.00, 'Belum Lunas', '2025-05-01'),
(4011, 3019, 1, '', 250000.00, 'Belum Lunas', '2025-05-01'),
(4012, 3020, 3, '', 500000.00, 'Belum Lunas', '2025-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_terminasi`
--

CREATE TABLE `tb_terminasi` (
  `id_terminasi` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_terminasi`
--

INSERT INTO `tb_terminasi` (`id_terminasi`, `id_pelanggan`, `Nama_Lengkap`, `dibuat_pada_`) VALUES
(701, 3017, 'haryanto', '2025-07-07'),
(702, 3020, 'Rafael mikko wenzelo', '2025-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_app`
--

CREATE TABLE `user_app` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_app`
--

INSERT INTO `user_app` (`id_user`, `username`, `email`, `pass`, `dibuat_pada_`) VALUES
(1003, 'iwan', 'iwan@gmail.com', 'iwan123???', '2025-02-27'),
(1005, 'maskina', 'maskina@gmail.com', 'maskina123', '2025-05-01'),
(1006, 'Lukman pratin', 'lukmanpratin@gmail.com', 'lukmanpratin123', '2025-05-01'),
(1007, 'haryanto', 'haryanto@gmil.com', 'haryanto123', '2025-05-01'),
(1008, 'ferry', 'ferry@gmail.com', 'ferry123', '2025-05-01'),
(1009, 'teguh', 'teguh@gmail.com', 'teguh123', '2025-05-01'),
(1010, 'rafael', 'rafael@gmail.com', 'rafael123', '2025-05-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD UNIQUE KEY `kecepatan` (`kecepatan`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`) USING BTREE;

--
-- Indeks untuk tabel `tb_terminasi`
--
ALTER TABLE `tb_terminasi`
  ADD PRIMARY KEY (`id_terminasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `user_app`
--
ALTER TABLE `user_app`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3021;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5015;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2029;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4013;

--
-- AUTO_INCREMENT untuk tabel `tb_terminasi`
--
ALTER TABLE `tb_terminasi`
  MODIFY `id_terminasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT untuk tabel `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_app` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `tb_terminasi`
--
ALTER TABLE `tb_terminasi`
  ADD CONSTRAINT `tb_terminasi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
