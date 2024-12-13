<?php
include('../../conf/config.php');
// Get username and password from GET request
$id_pelanggan = $_GET['id_pelanggan'];
// $password = $_GET['password'];        
// Prepare and execute SQL query
$stmt = $koneksi->prepare("SELECT * FROM tb_pelanggan WHERE id_pelanggan = ?");
$stmt->bind_param("s", $id_pelanggan);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password (assuming you're using password_hash to store passwords)
    if ($id_pelanggan == $row['id_pelanggan']) //if (password_verify($password, $row['password'])) jika menggunakan hash
    {
        // Successful login
        echo json_encode(['success' => true, 'message' => "Login berhasil"]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'message' => "id salah]);
    }
} else {
    // User not found
    echo json_encode(['success' => false, 'message' => "id tidak ditemukan"]);
}
$stmt->close();
$koneksi->close()
?>