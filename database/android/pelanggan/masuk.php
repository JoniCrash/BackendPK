<?php
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);
ob_start(); // Tangani output buffer untuk mencegah output yang tidak diinginkan

include('../../../conf/config.php');

if (isset($_POST['email'])) {
    $email = trim($_POST['email']); // Hapus spasi ekstra

    // Validasi input kosong
    if (empty($email)) {
        echo json_encode(["status" => "error", "message" => "Email harus diisi."]);
        exit();
    }

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("SELECT id_pelanggan, Email FROM tb_pelanggan WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pelanggan = $result->fetch_assoc();
        ob_clean(); // Bersihkan output sebelum JSON
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_pelanggan" => $pelanggan['id_pelanggan'],
                "email" => $pelanggan['Email']
            ]
        ]);
    } else {
        ob_clean();
        echo json_encode(["status" => "error", "message" => "Email tidak ditemukan."]);
    }

    $stmt->close(); // Tutup statement
} else {
    ob_clean();
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
