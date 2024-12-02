<?php
include('../../conf/config.php');
$id_pengajuan = $_GET['id_pengajuan'];
$nama_Lengkap = $_GET['Nama_Lengkap'];
$no_nik = $_GET['Nomor_Identitas_KTP'];
$alamat_pemasangan = $_GET['Alamat Pemasangan'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$email = $_GET['Email'];
$no1 = $_GET['Nomor_Hp_1'];
$no2 = $_GET['Nomor_Hp_2'];
$paket = $_GET['Paket'];
$foto_ktp = $_GET['Foto_KTP'];
$foto_depan_rumah = $_GET['Foto_Depan_Rumah'];

$query = mysqli_query($koneksi,"INSERT INTO tb_pengajuan(
id_pengajuan,
Nama_Lengkap,
Nomor_Identitas_KTP,
Alamat Pemasangan,
latitude,
longitude,
Email,
Nomor_Hp_1,
Nomor_Hp_2,
Paket,
Foto_KTP,
Foto_Depan_Rumah
) VALUES ('','$nama_Lengkap','$no_nik','$alamat_ktp','$alamat_pemasangan','$titik_kordinat','$email','$no1','$no2','$paket','$foto_ktp','$foto_depan_rumah')");
?>