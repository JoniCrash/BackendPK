<!-- <?php

include('../conf/config.php');
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

$currentMonth = date("Y-m");
$startDate = $currentMonth . "-01";
$endDate = $currentMonth . "-10";

$sql = "SELECT t.id_tagihan, t.tanggal_tagihan, p.nama_paket, p.kecepatan, p.harga AS jumlah, t.status 
        FROM tagihan t
        JOIN paket p ON t.id_paket = p.id_paket
        WHERE t.user_id = ? AND t.tanggal_tagihan BETWEEN ? AND ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $startDate, $endDate);
$stmt->execute();
$result = $stmt->get_result();

$tagihanList = array();
while ($row = $result->fetch_assoc()) {
    $tagihanList[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tagihanList);

$stmt->close();
?> -->