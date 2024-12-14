<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Username dan password harus diisi."]);
        exit();
    }

    // Proses verifikasi ke database
    $sql = mysqli_query($koneksi, "SELECT * FROM user_app WHERE username = '$username' AND pass = '$password'");

    if (mysqli_num_rows($sql) > 0) {
        $user = mysqli_fetch_assoc($sql);
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "id_user" => $user['id_user'],
                "username" => $user['username'],
                "email" => $user['email']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Username atau password salah."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
