<?php
include('../../../conf/config.php');

// Cek apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang dikirim dari Android (POST)
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode([
            "status" => "error",
            "message" => "Semua input harus diisi."
        ]);
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "Format email tidak valid."
        ]);
        exit;
    }

    // Query untuk menyimpan data pengguna ke dalam database
    $query = "INSERT INTO user_app (id_user,username, email, pass) VALUES ('$username', '$email', '$password')";

    // Menjalankan query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, kirimkan respons sukses
        echo json_encode([
            "status" => "success",
            "message" => "Pendaftaran berhasil."
        ]);
    } else {
        // Jika gagal, kirimkan respons error
        echo json_encode([
            "status" => "error",
            "message" => "Gagal mendaftar, coba lagi."
        ]);
    }
} else {
    // Jika bukan metode POST, kirimkan error
    echo json_encode([
        "status" => "error",
        "message" => "Hanya metode POST yang diizinkan."
    ]);
}
?>
