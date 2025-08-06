<?php
include('../../conf/config.php');
echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;
$id_pengajuan = $_POST['id_pengajuan'];
$Nama_Lengkap = $_POST['nama_lengkap'];
$Nomor_Identitas_KTP = $_POST['nik'];
$Alamat_Pemasangan = $_POST['alamat_pemasangan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$Email =  $_POST['email'];
$Nomor_Hp_1 = $_POST['nomor_hp_1'];
$Nomor_Hp_2 = $_POST['nomor_hp_2'];
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];

$query = "UPDATE tb_pengajuan SET 
          Nama_Lengkap = '$Nama_Lengkap', 
          Nomor_Identitas_KTP = '$Nomor_Identitas_KTP', 
          Alamat_Pemasangan = '$Alamat_Pemasangan', 
          latitude = '$latitude', 
          longitude = '$longitude', 
          Email = '$Email', 
          Nomor_Hp_1 = '$Nomor_Hp_1', 
          Nomor_Hp_2 = '$Nomor_Hp_2', 
          id_paket = '$id_paket', 
          nama_paket = '$nama_paket' 
          WHERE id_pengajuan = '$id_pengajuan'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data pelanggan berhasil diperbarui.'); window.location.href = 'index.php?page=data-pelanggan';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "'); history.back();</script>";
}
?>
