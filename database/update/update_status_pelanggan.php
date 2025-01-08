<?php
include('../../conf/config.php'); // Hubungkan ke database

// Cek apakah data yang diperlukan tersedia
if (!isset($_POST['id_pelanggan']) || !isset($_POST['Status'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
$Status = mysqli_real_escape_string($koneksi, $_POST['Status']);

// Validasi nilai status agar hanya menerima 'aktif' atau 'nonaktif'
if (!in_array($Status, ['Aktif', 'Nonaktif'])) {
    echo json_encode(["success" => false, "message" => "Status tidak valid!"]);
    exit;
}

// Update status di database
$query = "UPDATE tb_pelanggan SET Status = '$Status' WHERE id_pelanggan = '$id_pelanggan'";
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Status pelanggan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui status pelanggan: " . mysqli_error($koneksi)]);
}
?>
