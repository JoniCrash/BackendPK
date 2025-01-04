<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    // $password = $_POST['password'];

    // Validasi input kosong
    if (empty($id_user)) {
        echo json_encode(["status" => "error", "message" => "ID User harus diisi."]);
        exit();
    }

    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM user_app WHERE id_user = '$id_user'");

    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_user" => $user['id_user']
                // "username" => $user['username'],
                // "email" => $user['email'],
                // "password" => $user['password'],
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "ID User salah."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
