<?php
header("Content-Type: application/json");
include('../../../conf/config.php');

// Ambil data POST dari Android
$id_pelanggan = isset($_POST['id_pelanggan']) ? $_POST['id_pelanggan'] : null;
$alasan = isset($_POST['alasan_terminate']) ? $_POST['alasan_terminate'] : null;
$tanggal = date('Y-m-d H:i:s');

// Validasi data
if (!$id_pelanggan || !$alasan) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap."]);
    exit();
}

// Simpan ke tabel tb_terminasi
$sql = "INSERT INTO tb_terminasi (id_pelanggan, alasan, dibuat_pada_) VALUES (?, ?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("sss", $id_pelanggan, $alasan, $tanggal);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data terminasi berhasil disimpan."]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menyimpan data."]);
}

// Tutup koneksi
$stmt->close();
$koneksi->close();
?>
