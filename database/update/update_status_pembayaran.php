<?php
include('../../conf/config.php'); // Hubungkan ke database

// Cek apakah data yang diperlukan tersedia
if (!isset($_POST['id_pembayaran']) || !isset($_POST['Status'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pembayaran = mysqli_real_escape_string($koneksi, $_POST['id_pembayaran']);
$Status = mysqli_real_escape_string($koneksi, $_POST['Status']);

// Validasi nilai status agar hanya menerima 'Lunas' atau 'Belum Lunas'
if (!in_array($Status, ['Lunas', 'BelumLunas'])) {
    echo json_encode(["success" => false, "message" => "Status tidak valid!"]);
    exit;
}

// Update status di database
$query = "UPDATE tb_pembayaran SET Status = '$Status' WHERE id_pembayaran = '$id_pembayaran'";
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Status pembayaran berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui status pembayaran: " . mysqli_error($koneksi)]);
}
?>
