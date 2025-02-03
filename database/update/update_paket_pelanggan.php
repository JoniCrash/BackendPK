<?php
include('../../conf/config.php'); // Hubungkan ke database

// Cek apakah data yang diperlukan tersedia
if (!isset($_POST['id_pelanggan']) || !isset($_POST['nama_paket'] )) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
$paket = mysqli_real_escape_string($koneksi, $_POST['nama_paket']);
$id_paket = mysqli_real_escape_string($koneksi, $_POST['id_paket']);

// Validasi nilai nama_paket agar hanya menerima 'aktif' atau 'nonaktif'
if (!in_array($paket, ['30 MBPS', '50 MBPS', '100 MBPS'])) {
    echo json_encode(["success" => false, "message" => "paket tidak valid!"]);
    exit;
}
// if (!in_array($id_paket, ['1', '2', '3'])) {
//     echo json_encode(["success" => false, "message" => "paket tidak valid!"]);
//     exit;
// }

// Update paket di database

$query = "UPDATE tb_pelanggan SET nama_paket = '$paket' WHERE id_pelanggan = '$id_pelanggan'";
// $query1 = "UPDATE tb_pelanggan SET id_paket = '$paket' WHERE id_pelanggan = '$id_pelanggan'";
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Paket pelanggan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui Paket pelanggan: " . mysqli_error($koneksi)]);
}
?>
