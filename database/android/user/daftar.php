
<?php
include('../../../conf/config.php');
header("Content-Type: application/json");

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validasi input kosong
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Semua input harus diisi."]);
        exit();
    }

    // Cek apakah username sudah ada
    $cek_query = "SELECT id_user FROM user_app WHERE username = ?";
    $stmt = $koneksi->prepare($cek_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $cek_result = $stmt->get_result();

    if ($cek_result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Username sudah digunakan."]);
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Jika belum ada, insert ke database
    $insert_query = "INSERT INTO user_app (username, email, pass) VALUES (?, ?, ?)";
    $insert_stmt = $koneksi->prepare($insert_query);
    $insert_stmt->bind_param("sss", $username, $email, $password);

    if ($insert_stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pendaftaran berhasil"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal mendaftarkan pengguna."]);
    }

    $insert_stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Input tidak lengkap."]);
}
