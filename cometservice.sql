-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'joni', 'joni', 'joni', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `kecepatan` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `kecepatan`, `harga`) VALUES
(1, '30 MBPS', 30, 250.00),
(2, '50 mbps', 50, 320.00),
(3, '100 MBPS', 100, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nomor_Identitas_KTP` int(50) NOT NULL,
  `Alamat_Pemasangan` varchar(100) NOT NULL,
  `provinsi` varchar(10) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nomor_Hp_1` varchar(20) NOT NULL,
  `Nomor_Hp_2` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `Foto_KTP` varchar(255) NOT NULL,
  `Foto_Depan_Rumah` varchar(255) NOT NULL,
  `Status` enum('Aktif','NonAktif','','') NOT NULL,
  `dibuat_pada_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `provinsi`, `kota`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`, `Status`, `dibuat_pada_`) VALUES
(11, '', 0, '', '', '', 0.000000, 0.000000, '', '', '', 1, '', 'fotoktp_11.', 'fotoDepanRumah_11.', '', '2024-12-16 04:54:09'),
(12, '', 0, '', '', '', 0.000000, 0.000000, '', '', '', 2, '50 mbps', 'fotoktp_12.', 'fotoDepanRumah_12.', 'Aktif', '2024-12-16 04:54:09'),
(13, 'yuyu', 343553, 'rr', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 1, '30 MBPS', 'fotoktp_13.png', 'fotoDepanRumah_13.png', 'Aktif', '2024-12-16 04:54:09'),
(14, 'yuyukjkj', 343553, 'rr', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 3, '100 MBPS', 'fotoktp_14.jpg', 'fotoDepanRumah_14.jpg', 'Aktif', '2024-12-16 04:54:09'),
(15, 'hh', 343553, 'rrh', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 3, '100 MBPS', 'fotoktp_15.png', 'fotoDepanRumah_15.png', 'Aktif', '2024-12-16 04:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(10) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `periode` date NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas',
  `dibuat_pada_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nomor_Identitas/KTP` int(50) NOT NULL,
  `Alamat_Sesuai_KTP` varchar(100) NOT NULL,
  `Alamat_Pemasangan` varchar(100) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nomor_Hp_1` varchar(20) NOT NULL,
  `Nomor_Hp_2` varchar(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `Foto_KTP` varchar(255) NOT NULL,
  `Foto_Depan_Rumah` varchar(255) NOT NULL,
  `dibuat_pada_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `Nama_Lengkap`, `Nomor_Identitas/KTP`, `Alamat_Sesuai_KTP`, `Alamat_Pemasangan`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`, `dibuat_pada_`) VALUES
(1, 'joni', 3209, 'cirebon', 'cirebon', 0.000000, 0.000000, 'joni@gmial.com', '83', '82', 30, '0', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0J\0\0G\0\0\0Ƿ?\0\0\0sRGB\0???\0\0\0gAMA\0\0???a\0\0\0	pHYs\0\0?\0\0??o?d\0\0\0!tEXtCreation Time\02021:09:20 08:25:26?*\"?\0\0?6IDATx^???U??ϝ>[_o靐 ?^#M:?AŮ?aGDEEQ????k ?$??????s?sf?!j????^???ewf??ݙ?????r.DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '????\0JFIF\0\0`\0`\0\0???Exif\0\0MM\0*\0\0\0\0;\0\0\0\0sbp\0?i\0\0\0\0\0\0J??\0\0\0\0\0\0??\0\0\0\0\0\0>\0\0\0\0?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '2024-12-16 04:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('Belum Lunas','Lunas','','') NOT NULL,
  `dibuat_pada_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pelanggan`, `id_paket`, `total_harga`, `status`, `dibuat_pada_`) VALUES
(1, 14, 3, 500.00, '', '2024-12-16 04:55:22'),
(2, 15, 3, 500.00, '', '2024-12-16 04:55:22'),
(3, 15, 3, 500.00, '', '2024-12-16 04:55:22'),
(4, 15, 3, 500.00, 'Belum Lunas', '2024-12-16 04:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_app`
--

CREATE TABLE `user_app` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `dibuat_pada_` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_app`
--

INSERT INTO `user_app` (`id_user`, `username`, `email`, `pass`, `dibuat_pada_`) VALUES
(15, 'jhon', 'jhon@mail.com', 'mmm', '2024-12-13 16:45:37'),
(16, 'jhon', 'jhon@mail.com', 'hhh', '2024-12-13 16:45:37'),
(17, 'jhon', 'jhon@mail.com', 'yyy', '2024-12-13 16:45:37'),
(18, 'jhon', 'jhon@mail.com', 'uuu', '2024-12-13 16:45:37'),
(19, 'jhon', 'jhon@mail.com', 'pppppppppppppppppp', '2024-12-13 16:45:37'),
(20, 'jhon', 'jhon@mail.com', 'rrrrrrrrrrrrrrrrrrrr', '2024-12-13 16:45:37'),
(21, 'jh', 'jhon@mail.com', '1111111111', '2024-12-13 16:45:37'),
(22, '', '', '', '2024-12-14 19:06:58'),
(23, 'testuser', 'testuser@email.com', 'test123', '2024-12-14 19:09:25'),
(24, 'joni', 'joni@mail.com', 'passpostman', '2024-12-14 19:18:53'),
(25, 'testuser', 'testuser@email.com', 'test123', '2024-12-14 19:40:26'),
(26, 'testuser', 'testuser@email.com', 'test123', '2024-12-14 19:43:52'),
(27, 'testur', 'testuser@email.com', 'test123', '2024-12-14 19:44:01'),
(28, 'testur', 'testuser@email.com', 'test123', '2024-12-14 20:00:39'),
(29, 'mmm', 'mmm@mail.com', 'mmm', '2024-12-14 20:01:59'),
(30, 'mmm', 'mmm@mail.com', 'mmm', '2024-12-14 20:02:00'),
(31, 'hhu', 'jjjj', 'jj', '2024-12-14 20:17:30'),
(32, 'hhu', 'jjjj', 'jj', '2024-12-14 20:17:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_paket` (`id_paket`,`total_harga`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user_app`
--
ALTER TABLE `user_app`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
