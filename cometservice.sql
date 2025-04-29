-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2025 pada 20.09
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
  `nama_paket` varchar(50) NOT NULL,
  `kecepatan` varchar(11) NOT NULL,
  `Foto_KTP` varchar(255) NOT NULL,
  `Foto_Depan_Rumah` varchar(255) NOT NULL,
  `Status` enum('Aktif','NonAktif','','') NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `provinsi`, `kota`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `kecepatan`, `Foto_KTP`, `Foto_Depan_Rumah`, `Status`, `dibuat_pada_`) VALUES
(3014, 'alex', '12345678910111213', 'Jl. Kanci - Sindang Laut No.48, Japura Lor, Kec. Pangenan, Kabupaten Cirebon, Jawa Barat 45182, Indonesia', 'Jawa Barat', 'Cirebon', -6.795972, 108.641063, 'alex@gmail.com', '0812', '0834', 3, 'Max', '100 MBPS', 'fotoktp_3014.jpg', 'fotoDepanRumah_3014.jpg', 'Aktif', '2025-04-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(10) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `Status` enum('Lunas','BelumLunas','') NOT NULL DEFAULT 'BelumLunas',
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_tagihan`, `Nama_Lengkap`, `bukti_pembayaran`, `periode`, `Status`, `dibuat_pada_`) VALUES
(5006, 4006, 'alex', 'bukti_5006_April_2025.jpg', 'April_2025', 'Lunas', '2025-04-26'),
(5007, 4006, 'alex', 'bukti_5007_April_2025.jpg', 'April_2025', 'BelumLunas', '2025-04-29'),
(5008, 4006, 'alex', 'bukti_5008_April_2025.jpg', 'April_2025', 'BelumLunas', '2025-04-29');

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

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `id_user`, `Nama_Lengkap`, `Nomor_Identitas_KTP`, `Alamat_Pemasangan`, `provinsi`, `kota`, `latitude`, `longitude`, `Email`, `Nomor_Hp_1`, `Nomor_Hp_2`, `id_paket`, `nama_paket`, `kecepatan`, `Foto_KTP`, `Foto_Depan_Rumah`, `dibuat_pada_`) VALUES
(2019, 1004, 'alex', '12345678910111213', 'Jl. Kanci - Sindang Laut No.48, Japura Lor, Kec. Pangenan, Kabupaten Cirebon, Jawa Barat 45182, Indonesia', 'Jawa Barat', 'Cirebon', -6.795972, 108.641063, 'alex@gmail.com', '0812', '0834', 3, 'Max', '100 MBPS', 'foto_ktp/fotoktp_2019.jpg', 'foto_depan_rumah/fotoDepanRumah_2019.jpg', '2025-04-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `kecepatan` varchar(11) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('Belum Lunas','Lunas','','') NOT NULL,
  `dibuat_pada_` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_pelanggan`, `id_paket`, `nama_paket`, `kecepatan`, `Nama_Lengkap`, `total_harga`, `status`, `dibuat_pada_`) VALUES
(4006, 3014, 3, 'Max', '100 MBPS', 'alex', 500000.00, 'Lunas', '2025-04-26');

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
(1004, 'alex', 'alex@gmail.com', 'alex123', '2025-04-26');

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
  ADD KEY `id_paket` (`id_paket`,`total_harga`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kecepatan` (`kecepatan`);

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
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5009;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2020;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4007;

--
-- AUTO_INCREMENT untuk tabel `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

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
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `tb_tagihan_ibfk_3` FOREIGN KEY (`kecepatan`) REFERENCES `paket` (`kecepatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
