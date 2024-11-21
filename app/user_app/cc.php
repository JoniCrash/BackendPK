<!-- <?php
include('../../conf/config.php');
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
    if (password_verify($password, $row['password'])) {
        // Successful login
        echo json_encode(['success' => true, 'message' => "Login successful"]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'message' => "Incorrect password"]);
    }
} else {
    // User not found
    echo json_encode(['success' => false, 'message' => "User not found"]);
}

$stmt->close();

?> -->

<!-- <?php
include('../../conf/config.php');
$username = $_GET['username'] ?? ''; // Tambahkan default nilai kosong untuk keamanan
$password = $_GET['password'] ?? ''; // Sama seperti di atas
$sql = mysqli_query($koneksi,"SELECT * FROM user_app WHERE username = '$username' AND password = '$password'");
?> -->