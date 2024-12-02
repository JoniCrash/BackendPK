<?php
include('../../conf/config.php');

$id_pelanggan = $_GET['id'];
$Nama_Lengkap = $_GET['nama_lengkap'];
$Nomor_Identitas_KTP = $_GET['nomor_identitas_ktp'];
$Alamat_Sesuai_KTP = $_GET['alamat_sesuai_ktp'];
$Alamat_Pemasangan = $_GET['alamat_pemasangan'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$Email =  $_GET['email'];
$Nomor_Hp_1 = $_GET['nomor_hp_1'];
$Nomor_Hp_2 = $_GET['nomor_hp_2'];
$id_paket = $_GET['id_paket'];
$nama_paket = $_GET['nama_paket'];
$Foto_KTP = $_GET['Foto_KTP'];
$Foto_Depan_Rumah = $_GET['Foto_Depan_Rumah'];

$query = mysqli_query($koneksi,"INSERT INTO tb_pelanggan
(
    id_pelanggan,
    nama_lengkap,
    nomor_identitas_ktp,
    alamat_sesuai_ktp,
    alamat_pemasangan,
    latitude,
    longitude,
    email,
    nomor_hp_1,
    nomor_hp_2,
    id_paket,
    nama_paket,
    foto_ktp,
    foto_depan_rumah

) VALUES(
'$id_pelanggan',
'$Nama_Lengkap',
'$Nomor_Identitas_KTP',
'$Alamat_Sesuai_KTP',
'$Alamat_Pemasangan',
'$Titik_kordinat',
'$Email',
'$Nomor_Hp_1',
'$Nomor_Hp_2',
'$id_paket',
'$nama_paket',
'$Foto_KTP',
'$Foto_Depan_Rumah')");

header('Location: ../index.php?page=data-pelanggan');
?>