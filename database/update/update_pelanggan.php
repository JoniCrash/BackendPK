<?php
include('../../conf/config.php');

// Ambil data dari form
$Nama_Lengkap = $_POST['lama_lengkap'];
$Nomor_Identitas_KTP = $_POST['nik'];
$Alamat_Pemasangan = $_POST['alamat_pemasangan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$Email =  $_POST['email'];
$Nomor_Hp_1 = $_POST['nomor_hp_1'];
$Nomor_Hp_2 = $_POST['nomor_hp_2'];
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$id_pelanggan = $_POST['id_pelanggan']; // Pastikan variabel ini didefinisikan

// Query untuk update data
$query = "UPDATE tb_pelanggan SET 
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
          WHERE id_pelanggan='$id_pelanggan'";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Data pelanggan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui pelanggan: " . mysqli_error($koneksi)]);
}

// Redirect setelah menampilkan pesan
echo "<script>window.location.href = 'index.php?page=data-pelanggan';</script>";
?>