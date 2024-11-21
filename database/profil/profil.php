
<?php
include('../../conf/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate ID as an integer
    if (!is_numeric($id)) {
        $response = array(
            "success" => false,
            "message" => "Invalid ID provided"
        );
        echo json_encode($response);
        exit;
    }

    // Query to retrieve user profile data
    $sql = "SELECT id, username, email FROM user_app WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Retrieve data as an associative array
        $row = $result->fetch_assoc();

        // Sanitize data before returning
        $sanitizedData = array(
            "id" => htmlspecialchars($row['id']),
            "username" => htmlspecialchars($row['username']),
            "email" => htmlspecialchars($row['email'])
        );

        // Return sanitized data in JSON format
        $response = array(
            "success" => true,
            "data" => $sanitizedData
        );
    } else {
        // User not found
        $response = array(
            "success" => false,
            "message" => "User not found"
        );
    }
} else {
    // ID not provided
    $response = array(
        "success" => false,
        "message" => "ID not provided"
    );
}

// Send JSON response
echo json_encode($response);

// Close database connection
$conn->close();
?>