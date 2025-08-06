<?php
include('../../conf/config.php'); // Hubungkan ke database

// Cek apakah data yang diperlukan tersedia
if (!isset($_POST['id_pengajuan']) || !isset($_POST['status'])) {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap!"]);
    exit;
}

$id_pengajuan = mysqli_real_escape_string($koneksi, $_POST['id_pengajuan']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);

// Validasi nilai status agar hanya menerima 'aktif' atau 'nonaktif'
if (!in_array($status, ['Menunggu', 'Di Tolak', 'Di Terima'])) {
    echo json_encode(["success" => false, "message" => "status tidak valid!"]);
    exit;
}

// Update status di database
$query = "UPDATE tb_pengajuan SET status = '$status' WHERE id_pengajuan = '$id_pengajuan'";
if (mysqli_query($koneksi, $query)) {
    echo json_encode(["success" => true, "message" => "Status pengajuan berhasil diperbarui."]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal memperbarui status pengajuan: " . mysqli_error($koneksi)]);
}
?>
