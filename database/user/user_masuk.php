<?php
include('../../conf/config.php');
// Get username and password from GET request
$username = $_GET['username'];
$password = $_GET['password'];        
// Prepare and execute SQL query
$stmt = $koneksi->prepare("SELECT id, password FROM user_app WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password (assuming you're using password_hash to store passwords)
    if ($password == $row['password']) //if (password_verify($password, $row['password'])) jika menggunakan hash
    {
        // Successful login
        echo json_encode(['success' => true, 'message' => "Login berhasil"]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'message' => "Password salah"]);
    }
} else {
    // User not found
    echo json_encode(['success' => false, 'message' => "Username tidak ditemukan"]);
}
$stmt->close();
$koneksi->close()
?>