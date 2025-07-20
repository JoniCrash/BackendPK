<?php
include('../../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// file_put_contents("debug_post.txt", print_r($_POST, true), FILE_APPEND);
$id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
$id_paket = mysqli_real_escape_string($koneksi, $_POST['id_paket']);


    // ✅ Perbaiki di sini: gunakan $id_paket, bukan $paket_diajukan
    $query = "INSERT INTO tb_req_ubah_paket (id_pelanggan, id_paket, status, di_buat_pada)
              VALUES ('$id_pelanggan', '$id_paket', 'Menunggu', NOW())";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Permintaan berhasil disimpan."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menyimpan permintaan.","error" => mysqli_error($koneksi) // Tambahkan ini
        ]);
    }
}
?>
