<?php
include('../../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $paket_diajukan = $_POST['paket_diajukan'];

    // Simpan request ke database, misalnya tabel: tb_request_ubah_paket
    $query = "INSERT INTO tb_req_ubah_paket (id_pelanggan, id_paket, status, dibuat_pada)
              VALUES ('$id_pelanggan', '$paket_diajukan', 'menunggu', NOW())";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Permintaan berhasil disimpan."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menyimpan permintaan."]);
    }
}
?>
