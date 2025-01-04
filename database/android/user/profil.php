<?php
include('../../../conf/config.php');
// header('Content-Type: application/json');
// Pastikan semua input tersedia
if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];


    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM user_app WHERE id_user = '$id_user'");

    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_user" => $user['id_user'],
                "username" => $user['username'],
                "email" => $user['email'],
                "password" => $user['pass'],
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID user tidak ditemukan."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>