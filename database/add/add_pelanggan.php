<?php
include('../../conf/config.php');

// $id_pelanggan = $_POST['id'];
$Nama_Lengkap = $_POST['Nama_Lengkap'];
$Nomor_Identitas_KTP = $_POST['Nomor_Identitas_KTP'];
$Alamat_Pemasangan = $_POST['Alamat_Pemasangan'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$Email =  $_POST['Email'];
$Nomor_Hp_1 = $_POST['Nomor_Hp_1'];
$Nomor_Hp_2 = $_POST['Nomor_Hp_2'];
// $id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
// $Foto_KTP = $_POST['Foto_KTP'];
// $Foto_Depan_Rumah = $_POST['Foto_Depan_Rumah'];
// Nama Foto
$file_ktp = $_FILES['fotoktp']['name'];
$file_depanrumah = $_FILES['fotodepanrumah']['name'];
// Lokasi Foto
$file_ktp_tmp = $_FILES['fotoktp']['tmp_name'];
$file_depanrumah_tmp = $_FILES['fotodepanrumah']['tmp_name'];
move_uploaded_file($file_ktp_tmp, '../image/foto_ktp/'. $file_ktp);
move_uploaded_file($file_depanrumah_tmp, '../image/foto_depanrumah/'. $file_depanrumah); 

$statuss = $_POST['status'];

$query = mysqli_query($koneksi,"INSERT INTO tb_pelanggan
(
    Nama_Lengkap,
    Nomor_Identitas_KTP,
    Alamat_Sesuai_KTP,
    Alamat_Pemasangan,
    provinsi,
    kota,
    latitude,
    longitude,
    Email,
    Nomor_Hp_1,
    Nomor_Hp_2,
    nama_paket,
    Foto_KTP,
    Foto_Depan_Rumah,
    statuss

) VALUES(
'$Nama_Lengkap',
'$Nomor_Identitas_KTP',
'$Alamat_Pemasangan',
'$provinsi',
'$kota',
'$latitude',
'$longitude',
'$Email',
'$Nomor_Hp_1',
'$Nomor_Hp_2',
'$nama_paket',
'$file_ktp',
'$file_depanrumah',
'Aktif'
)");

header('Location: ../../index.php?page=data-pelanggan');
?>