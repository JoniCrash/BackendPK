-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 10:36 AM
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
  `level` enum('admin','operator') NOT NULL
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
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama _paket` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Nomor_Identitas_KTP` int(50) NOT NULL,
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
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`, `status`) VALUES
(3, 'joni', 84349, '\0c\0i\0r\0e\0b\0o\0n\0n', 0.000000, 0.000000, 'joni@gmial.com', '09444', '0833944', 33, '50mb', '????\0JFIF\0\0`\0`\0\0???Exif\0\0MM\0*\0\0\0\0;\0\0\0\0sbp\0?i\0\0\0\0\0\0J??\0\0\0\0\0\0??\0\0\0\0\0\0>\0\0\0\0?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0J\0\0G\0\0\0Ƿ?\0\0\0sRGB\0???\0\0\0gAMA\0\0???a\0\0\0	pHYs\0\0?\0\0??o?d\0\0\0!tEXtCreation Time\02021:09:20 08:25:26?*\"?\0\0?6IDATx^???U??ϝ>[_o靐 ?^#M:?AŮ?aGDEEQ????k ?$??????s?sf?!j????^???ewf??ݙ?????r.DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', 1),
(4, 'fdfdf', 84349, '\0e\0r\0e\0r', 0.000000, 0.000000, 'joni@yy.com', '094445454', '083394445222', 32, '50mb', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0J\0\0G\0\0\0Ƿ?\0\0\0sRGB\0???\0\0\0gAMA\0\0???a\0\0\0	pHYs\0\0?\0\0??o?d\0\0\0!tEXtCreation Time\02021:09:20 08:25:26?*\"?\0\0?6IDATx^???U??ϝ>[_o靐 ?^#M:?AŮ?aGDEEQ????k ?$??????s?sf?!j????^???ewf??ݙ?????r.DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '????\0JFIF\0\0`\0`\0\0???Exif\0\0MM\0*\0\0\0\0;\0\0\0\0sbp\0?i\0\0\0\0\0\0J??\0\0\0\0\0\0??\0\0\0\0\0\0>\0\0\0\0?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `periode` date NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
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
  `Foto_Depan_Rumah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `id_user`, `Nama_Lengkap`, `Nomor_Identitas/KTP`, `Alamat_Sesuai_KTP`, `Alamat_Pemasangan`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`) VALUES
(1, 2, 'joni', 3209, 'cirebon', 'cirebon', 0.000000, 0.000000, 'joni@gmial.com', '83', '82', 30, '0', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0J\0\0G\0\0\0Ƿ?\0\0\0sRGB\0???\0\0\0gAMA\0\0???a\0\0\0	pHYs\0\0?\0\0??o?d\0\0\0!tEXtCreation Time\02021:09:20 08:25:26?*\"?\0\0?6IDATx^???U??ϝ>[_o靐 ?^#M:?AŮ?aGDEEQ????k ?$??????s?sf?!j????^???ewf??ݙ?????r.DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '????\0JFIF\0\0`\0`\0\0???Exif\0\0MM\0*\0\0\0\0;\0\0\0\0sbp\0?i\0\0\0\0\0\0J??\0\0\0\0\0\0??\0\0\0\0\0\0>\0\0\0\0?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `tagihan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_app`
--

CREATE TABLE `user_app` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_app`
--

INSERT INTO `user_app` (`id_user`, `username`, `email`, `pass`) VALUES
(14, 'joni', 'joni@mail.com', '12345');

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
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD KEY `Paket` (`id_paket`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_paket`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`,`nama_paket`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD KEY `id_paket` (`id_paket`,`periode`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_paket_2` (`id_paket`);

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
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_paket_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
