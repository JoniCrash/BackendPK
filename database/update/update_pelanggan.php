<?php
include('../../conf/config.php');

// Ambil data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$alamat_pemasangan = $_POST['alamat_pemasangan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$email = $_POST['email'];
$nomor_hp_1 = $_POST['nomor_hp_1'];
$nomor_hp_2 = $_POST['nomor_hp_2'];
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];

// Query update
$query = "UPDATE tb_pelanggan SET 
          Nama_Lengkap = '$nama_lengkap', 
          Nomor_Identitas_KTP = '$nik', 
          Alamat_Pemasangan = '$alamat_pemasangan', 
          latitude = '$latitude', 
          longitude = '$longitude', 
          Email = '$email', 
          Nomor_Hp_1 = '$nomor_hp_1', 
          Nomor_Hp_2 = '$nomor_hp_2', 
          id_paket = '$id_paket', 
          nama_paket = '$nama_paket' 
          WHERE id_pelanggan = '$id_pelanggan'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data pelanggan berhasil diperbarui.'); window.location.href = 'index.php?page=data-pelanggan';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "'); history.back();</script>";
}
?>
