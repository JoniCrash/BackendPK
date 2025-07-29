<?php
include('../../conf/config.php'); // Hubungkan ke database

// Cek apakah data yang diperlukan tersedia
if (!isset($_POST['id_tagihan']) || !isset($_POST['status'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_tagihan = mysqli_real_escape_string($koneksi, $_POST['id_tagihan']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);

// Validasi nilai status agar hanya menerima 'Lunas' atau 'Belum Lunas'
if (!in_array($status, ['Lunas', 'Belum Lunas'])) {
    echo json_encode(["success" => false, "message" => "status tidak valid!"]);
    exit;
}

// Update status di database
$query = "UPDATE tb_tagihan SET status = '$status' WHERE id_tagihan = '$id_tagihan'";
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "status tagihan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui status tagihan: " . mysqli_error($koneksi)]);
}
?>
