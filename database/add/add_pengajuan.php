<?php
include('../../conf/config.php');
$id_pengajuan = $_GET['id_pengajuan'];
$nama_Lengkap = $_GET['Nama Lengkap'];
$no_nik = $_GET['Nomor Identitas / KTP'];
$alamat_ktp = $_GET['Nomor Identitas / KTP'];
$alamat_pemasangan = $_GET['Alamat Pemasangan'];
$titik_kordinat = $_GET['Titik Kordinat'];
$email = $_GET['Email'];
$no1 = $_GET['Nomor HP 1'];
$no2 = $_GET['Nomor HP 2'];
$paket = $_GET['Paket'];
$foto_ktp = $_GET['Foto KTP'];
$foto_depan_rumah = $_GET['Foto Depan Rumah'];

$query = mysqli_query($koneksi,"INSERT INTO tb_pengajuan(id_pengajuan,Nama Lengkap,Nomor Identitas / KTP,Alamat Pemasangan,Titik Kordinat,Email,Nomor HP 1,Nomor HP 2,Paket,Foto KTP,Foto Depan Rumah) VALUES ('','$nama_Lengkap','$no_nik','$alamat_ktp','$alamat_pemasangan','$titik_kordinat','$email','$no1','$no','$paket','$foto_ktp','$foto_depan_rumah')");
?>