<?php
include('../../../conf/config.php');

// Pastikan semua input tersedia
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Semua input harus diisi."]);
        exit();
    }

    // Proses penyimpanan ke database
    $sql = mysqli_query($koneksi, "INSERT INTO user_app(id_user, username, email, pass) VALUES('', '$username', '$email', '$password')");

    if ($sql) {
        echo json_encode(["status" => "success", "message" => "Pendaftaran berhasil"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal mendaftarkan pengguna."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
?>
