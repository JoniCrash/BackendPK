<?php
include('../../../conf/config.php');

$query = "SELECT id_paket, kecepatan FROM tb_paket";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);
?>
