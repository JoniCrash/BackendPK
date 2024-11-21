<?php

include('../conf/config.php');
// Tanggal saat ini
$currentDate = date("Y-m-d");
$startDate = date("Y-m-01");
$endDate = date("Y-m-10");

// Ambil semua user yang belum memiliki tagihan di bulan ini
$sql = "SELECT u.user_id, p.id_paket, p.harga
        FROM users u
        JOIN paket p ON u.id_paket = p.id_paket
        WHERE u.user_id NOT IN (
            SELECT user_id FROM tagihan WHERE MONTH(tanggal_tagihan) = MONTH(?) AND YEAR(tanggal_tagihan) = YEAR(?)
        )";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $currentDate, $currentDate);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Buat tagihan untuk user yang belum ada tagihan di bulan ini
    $insert_sql = "INSERT INTO tagihan (user_id, tanggal_tagihan, id_paket, status) VALUES (?, ?, ?, 'belum lunas')";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("isi", $row['user_id'], $startDate, $row['id_paket']);
    $insert_stmt->execute();
    $insert_stmt->close();
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>