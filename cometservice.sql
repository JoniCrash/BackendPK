-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2024 pada 20.57
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
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adm`
--

INSERT INTO `adm` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'joni', 'joni', 'joni', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `kecepatan` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `kecepatan`, `harga`) VALUES
(1, '30 MBPS', 30, 250.00),
(2, '50 mbps', 50, 320.00),
(3, '100 MBPS', 100, 500.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama _paket` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
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
  `Status` enum('Aktif','NonAktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `provinsi`, `kota`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`, `Status`) VALUES
(11, '', 0, '', '', '', 0.000000, 0.000000, '', '', '', 1, '', 'fotoktp_11.', 'fotoDepanRumah_11.', ''),
(12, '', 0, '', '', '', 0.000000, 0.000000, '', '', '', 2, '50 mbps', 'fotoktp_12.', 'fotoDepanRumah_12.', 'Aktif'),
(13, 'yuyu', 343553, 'rr', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 1, '30 MBPS', 'fotoktp_13.png', 'fotoDepanRumah_13.png', 'Aktif'),
(14, 'yuyukjkj', 343553, 'rr', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 3, '100 MBPS', 'fotoktp_14.jpg', 'fotoDepanRumah_14.jpg', 'Aktif'),
(15, 'hh', 343553, 'rrh', 'Jawa Barat', 'Cirebon', 1.663100, 7.555000, 'uyum', '01767', 'uyuy', 3, '100 MBPS', 'fotoktp_15.png', 'fotoDepanRumah_15.png', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
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
-- Struktur dari tabel `tb_pengajuan`
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
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `id_user`, `Nama_Lengkap`, `Nomor_Identitas/KTP`, `Alamat_Sesuai_KTP`, `Alamat_Pemasangan`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `Foto_KTP`, `Foto_Depan_Rumah`) VALUES
(1, 2, 'joni', 3209, 'cirebon', 'cirebon', 0.000000, 0.000000, 'joni@gmial.com', '83', '82', 30, '0', '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0J\0\0G\0\0\0Ƿ?\0\0\0sRGB\0???\0\0\0gAMA\0\0???a\0\0\0	pHYs\0\0?\0\0??o?d\0\0\0!tEXtCreation Time\02021:09:20 08:25:26?*\"?\0\0?6IDATx^???U??ϝ>[_o靐 ?^#M:?AŮ?aGDEEQ????k ?$??????s?sf?!j????^???ewf??ݙ?????r.DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '????\0JFIF\0\0`\0`\0\0???Exif\0\0MM\0*\0\0\0\0;\0\0\0\0sbp\0?i\0\0\0\0\0\0J??\0\0\0\0\0\0??\0\0\0\0\0\0>\0\0\0\0?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('Belum Lunas','Lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pelanggan`, `id_paket`, `total_harga`, `status`) VALUES
(1, 14, 3, 500.00, ''),
(2, 15, 3, 500.00, ''),
(3, 15, 3, 500.00, ''),
(4, 15, 3, 500.00, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_app`
--

CREATE TABLE `user_app` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_app`
--

INSERT INTO `user_app` (`id_user`, `username`, `email`, `pass`) VALUES
(14, 'joni', 'joni@mail.com', '12345'),
(15, 'jhon', 'jhon@mail.com', 'mmm'),
(16, 'jhon', 'jhon@mail.com', 'hhh'),
(17, 'jhon', 'jhon@mail.com', 'yyy'),
(18, 'jhon', 'jhon@mail.com', 'uuu'),
(19, 'jhon', 'jhon@mail.com', 'pppppppppppppppppp'),
(20, 'jhon', 'jhon@mail.com', 'rrrrrrrrrrrrrrrrrrrr'),
(21, 'jh', 'jhon@mail.com', '1111111111');

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
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD KEY `Paket` (`id_paket`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_paket`);

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
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_paket` (`id_paket`,`total_harga`),
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
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_paket_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
