<?php
// include('../../conf/config.php');
$host		= "localhost"; // sesuaikan alamat server anda
$usernam	= "root"; // sesuaikan user web server anda
$passwor	= ""; // sesuaikan password web server anda
$database	= "cometservice"; // sesuaikan database web server anda
$koneksi = mysqli_connect($host,$usernam,$passwor,$database);
// Get username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];        

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
