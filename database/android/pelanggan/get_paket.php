<?php
include('../../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];

    $query = "SELECT k.nama_paket 
              FROM tb_pelanggan p 
              JOIN tb_paket k ON p.id_paket = k.id_paket 
              WHERE p.id_pelanggan = '$id_pelanggan'";

    $result = mysqli_query($koneksi, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode([
            "status" => "success",
            "paket_saat_ini" => $row['nama_paket']
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Paket tidak ditemukan"]);
    }
}
?>
