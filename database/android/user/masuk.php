<?php
// ob_start();
header("Content-Type: application/json");
include('../../../conf/config.php'); // Pastikan path ini benar

// Pastikan input tersedia
if (!isset($_POST['username'])) {
    echo json_encode(["status" => "error", "message" => "Username harus diisi."]);
    exit();
}

$username = trim($_POST['username']); // Trim untuk menghapus spasi kosong

// Cek apakah username kosong
if (empty($username)) {
    echo json_encode(["status" => "error", "message" => "Username tidak boleh kosong."]);
    exit();
}

// Gunakan prepared statement untuk menghindari SQL Injection
$query = "SELECT id_user FROM user_app WHERE username = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode([
        "status" => "success",
        "message" => "Login berhasil",
        "data" => [
            "id_user" => $user['id_user']
            // "username" => $user['username'],
        ]
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Username salah atau tidak terdaftar."]);
}

$stmt->close();
$koneksi->close();
// ob_end_clean();
?>