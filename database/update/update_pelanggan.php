<?php
include('../../conf/config.php');
$id_pelanggan = $_POST['id'];
$Nama_Lengkap = $_POST['nama_lengkap'];
$Nomor_Identitas_KTP = $_POST['nomor_identitas_ktp'];
$Alamat_Sesuai_KTP = $_POST['alamat_sesuai_ktp'];
$Alamat_Pemasangan = $_POST['alamat_pemasangan'];
$Titik_kordinat = $_POST['titik_kordinat'];
$Email =  $_POST['email'];
$Nomor_Hp_1 = $_POST['nomor_hp_1'];
$Nomor_Hp_2 = $_POST['nomor_hp_2'];
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$Foto_KTP = $_POST['Foto_KTP'];
$Foto_Depan_Rumah = $_POST['Foto_Depan_Rumah'];
//nama foto
// $nama_file = $_FILES['foto']['name'];
// echo $namafile;
//lokasi foto
// $file_tmp = $_FILES['foto']['tmp_name'];
// move_uploaded_file($file_tmp,'../foto/'.$nama_file);
// $query = mysqli_query($koneksi, "UPDATE tb_pelanggan SET username='$username', email='$email',password ='$pass', foto='$nama_file' WHERE id_user='$id_user'");


$query = mysqli_query($koneksi, "UPDATE tb_pelanggan SET id = '$id_pelanggan', nama_lengkap = '$Nama_lengkap', nomor_identitas_ktp = '$Nomor_Identitas_KTP', alamat_sesuai_ktp = '$Alamat_Sesuai_KTP', alamat_pemasangan = '$Alamat_Pemasangan', titik_kordinat = '$Titik_Kordinat', email = '$Email', nomor_hp_1 = '$Nomor_hp_1', nomor_hp_2 = '$Nomor_hp_2', id_paket = '$id_paket', nama_paket = '$nama_paket', foto_ktp = '$Foto_KTP', Foto_Depan_Rumah = '$Foto_Depan_Rumah'");

 header('Location: ../index.php?page=data-pelanggan');
?>